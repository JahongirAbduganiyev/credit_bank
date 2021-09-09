<?php
    include("../db_kassa.php");

    //$pras = $con->query("select client_id from muddati_o_tani WHERE status=0 group by client_id");

    $pras = $con->query("SELECT * FROM `depozit` WHERE qoldiq!=0 GROUP BY client_id");
    $clients_id = array();
    $i = 0;
    while ($r = $pras->fetch_array()){
        $clients_id[$i] = $r['client_id'];
        $i++;
    }

    $clients_info = array();
    for ($k = 0; $k < count($clients_id); $k++){

        $foiz_sum = 0; $tani_sum = 0;
        $info = $con->query("select id from depozit WHERE id=".$clients_id[$k]);
        while ($row = $info->fetch_array()){
            array_push($clients_info, $row);
        }

        $info1 = $con->query("select * from muddati_o_tani WHERE status=0 and client_id=".$clients_id[$k]);
        while ($row = $info1->fetch_array()){
            $tani_sum += $row['qarzdorlik'];
        }
        array_push($clients_info[$k], $tani_sum);

        $info2 = $con->query("select * from muddati_o_foiz WHERE status=0 and client_id=".$clients_id[$k]);
        while ($row = $info2->fetch_array()){
            $foiz_sum += $row['qarzdorlik'];
        }
        array_push($clients_info[$k], $foiz_sum);

        $res = $con->query("SELECT qoldiq FROM `depozit` WHERE client_id='{$clients_id[$k]}' and qoldiq!=0 ORDER BY id DESC LIMIT 1");
        while ($row = $res->fetch_array()){
            $qoldiq = $row['qoldiq'];
            array_push($clients_info[$k], $qoldiq);
        }
    }

    echo '<pre>';
    print_r($clients_info);
    echo '</pre>';

        for ($i = 0; $i < count($clients_info); $i++) {
            $foiz = $clients_info[$i][3] - $clients_info[$i][2];
            if ($foiz >= 0) {
                $sql = $con->query("INSERT INTO `depozit`(`client_id`, `kirim`, `chiqim`, `qoldiq`, `izox`, `filial_nomi`) 
                            VALUES ('{$clients_info[$i][0]}', 0, '{$clients_info[$i][2]}', '{$foiz}', 'Muddati otgan foizidan sondirilgan', 'buvayda')");
                $clients_info[$i][2] = 0;
                $clients_info[$i][3] = $foiz;
            } else {
                if ($foiz < 0) {
                    $sql = $con->query("INSERT INTO `depozit`(`client_id`, `kirim`, `chiqim`, `qoldiq`, `izox`, `filial_nomi`) 
                            VALUES ('{$clients_info[$i][0]}', 0, '{$clients_info[$i][3]}', 0, 'Muddati otgan foizidan sondirilgan', 'buvayda')");
                    $clients_info[$i][3] = 0;
                    $clients_info[$i][2] = abs($foiz);
                }
            }

            $tani = $clients_info[$i][3] - $clients_info[$i][1];
            if ($tani >= 0) {
                $sql = $con->query("INSERT INTO `depozit`(`client_id`, `kirim`, `chiqim`, `qoldiq`, `izox`, `filial_nomi`) 
                            VALUES ('{$clients_info[$i][0]}', 0, '{$clients_info[$i][1]}', '{$tani}', 'Muddati otgan tanidan sondirilgan', 'buvayda')");
                $clients_info[$i][1] = 0;
                $clients_info[$i][3] = $tani;
            } else {
                if ($tani < 0) {
                    $sql = $con->query("INSERT INTO `depozit`(`client_id`, `kirim`, `chiqim`, `qoldiq`, `izox`, `filial_nomi`) 
                            VALUES ('{$clients_info[$i][0]}', 0, '{$clients_info[$i][3]}', 0, 'Muddati otgan tanidan sondirilgan', 'buvayda')");
                    $clients_info[$i][1] = 0;
                    $clients_info[$i][3] = $tani;
                    $clients_info[$i][3] = 0;
                    $clients_info[$i][1] = abs($tani);
                }
            }
        }


        for ($i = 0; $i < count($clients_info); $i++) {
            $update = $con->query("UPDATE `muddati_o_tani` SET status=1 WHERE client_id=" . $clients_info[$i][0]);
            $update1 = $con->query("UPDATE `muddati_o_foiz` SET status=1 WHERE client_id=" . $clients_info[$i][0]);

            if ($clients_info[$i][1] > 0) {
                $insert = $con->query("INSERT INTO `muddati_o_tani`(`client_id`, `qarzdorlik`, `status`, `filial_nomi`)
                                             VALUES (
                                                '{$clients_info[$i][0]}',
                                                '{$clients_info[$i][1]}',
                                                '0',
                                                'buvayda'
                                             )");
            }
            if ($clients_info[$i][2] > 0) {
                $insert1 = $con->query("INSERT INTO `muddati_o_foiz`(`client_id`, `qarzdorlik`, `status`, `filial_nomi`)
                                             VALUES (
                                                '{$clients_info[$i][0]}',
                                                '{$clients_info[$i][2]}',
                                                '0',
                                                'buvayda'
                                             )");
            }
        }


    echo '<pre>';
    print_r($clients_info);
    echo '</pre>';

