<?php
include("../db_kassa.php");
    $con->autocommit(false);
    try {
        $cl = $con->query("select * from client");
        foreach ($cl as $value) {
            $res = $con->query("select * from muddati_o_tani WHERE client_id='{$value["id"]}' and status=0 ORDER BY id ASC LIMIT 1");
            $row = $res->fetch_object();
            $sana = $row->sana;
            $client_id = $row->client_id;
            $bugun = date("Y-m-d");

            $farq_kun = (strtotime($bugun) - strtotime($sana)) / (60 * 60 * 24);
            $koifsent = ($farq_kun * 0.1) / 3;
            $status = round_up($koifsent, 1);

            if ($client_id == "") continue;

            $res1 = $con->query("UPDATE `prasrochka` SET `kun`='{$farq_kun}', `status`='{$status}' WHERE id=" . $client_id);
            if ($res1) {
                true;
            } else {
                throw new Exception("Error Processing Request", 1);
            }
        }
        $con->commit();
    }catch (Exception $e){
        ?>
        <script !src="">
            alert("Xatolik yuz berdi qaytadan urunib ko'ring!");
        </script>
        <?php
    }

    function round_up($value, $places)
    {
        $r = ($value*10);
        if(filter_var($r, FILTER_VALIDATE_INT) === false){
            $mult = pow(10, abs($places));
            return ceil($value * $mult) / $mult;
        }else{
            return $value;
        }
    }