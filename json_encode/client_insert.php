<?php
include("../db_sotuv.php");
include("../db_kassa.php");

if (isset($_POST["client_id"])) {

    $res1 = $con1->query("SELECT * FROM `haridor_malumoti` left JOIN shartnoma_savdo ON haridor_malumoti.h_id=shartnoma_savdo.har_id left JOIN shartnoma_jami ON haridor_malumoti.h_id=shartnoma_jami.H_ID where haridor_malumoti.anketa_nomer=".$_POST["client_id"]);
    $r    = $res1->fetch_object();

    $sana = $r->sanasi;
    $fish = htmlspecialchars(addslashes($r->fish));
    $p_nomer = $r->p_ser_nom;
    $manzil1 = htmlspecialchars(addslashes($r->yash_manzil));
    $manzil2 = htmlspecialchars(addslashes($r->oluvchi_manzil));
    $manzil = $manzil1.", ".$manzil2;
    $moljal = htmlspecialchars(addslashes($r->moljal));
    $tel = $r->telefon_raqami;
    $client_kodi = $r->anketa_nomer;
    $credit_kodi = '01';
    $sh_summa = $r->jami_savdo;
    $sh_muddat = $r->muddati;
    $oldindan_tolov = $r->oylik_maoshi;


    $fil_nom = "buvayda";
    $status = 0;

    $con->autocommit(false);
    try {
        $res = $con->query("INSERT INTO 
            client (
                sana,
                fish,
                p_nomer,
                manzil,
                moljal,
                tel_nomer,
                client_kodi,
                credit_kodi,
                filial_nomi,
                status
            )
            VALUES (
                '{$sana}',
                '{$fish}',
                '{$p_nomer}',
                '{$manzil}',
                '{$moljal}',
                '{$tel}',
                '{$client_kodi}',
                '{$credit_kodi}',
                '{$fil_nom}',
                '{$status}'
            )");
        if($res){true;} else {throw new Exception("Error Processing Request", 1);}
        if ($res){
            $last_id = $con->insert_id;

            $ress = $con->query("INSERT INTO 
                shartnoma_info (
                    client_id,
                    summa,
                    muddat,
                    oldindan_tolov,
                    filial_nomi
                )
                VALUES (
                    '{$last_id}',
                    '{$sh_summa}',
                    '{$sh_muddat}',
                    '{$oldindan_tolov}',
                    '{$fil_nom}'
                )");
            if($ress){true;} else {throw new Exception("Error Processing Request", 1);}

            for ($i = 1; $i <= $sh_muddat; $i++){

                $t_sana = date('Y-m-d', strtotime($sana.' + '.$i.' month'));

                $tani_oy = ($sh_summa-$oldindan_tolov)/$sh_muddat;

                $ress1 = $con->query("INSERT INTO 
                credit_tani (
                    client_id,
                    tolov_sana,
                    oylik_tani,
                    sondirilgan_tani,
                    izox,
                    filial_nomi,
                    status
                )
                VALUES (
                    '{$last_id}',
                    '{$t_sana}',
                    '{$tani_oy}',
                    '0',
                    '',
                    '{$fil_nom}',
                    '{$status}'
                )");
                if($ress1){true;} else {throw new Exception("Error Processing Request", 1);}
            }

            $foiz = 0.36;
            $kunlik_foiz = ($sh_summa*$foiz)/365;
            $ress2 = $con->query("INSERT INTO 
                credit_foiz (
                    client_id,
                    kunlik_foiz,
                    kun,
                    status,
                    filial_nomi
                )
                VALUES (
                    '{$last_id}',
                    '{$kunlik_foiz}',
                    '0',
                    '0',
                    '{$fil_nom}'
                )");
            if($ress2){true;} else {throw new Exception("Error Processing Request", 1);}

            $ress3 = $con->query("INSERT INTO 
                prasrochka (
                    client_id,
                    status
                )
                VALUES (
                    '{$last_id}',
                    '0.0'
                )");
            if($ress3){true;} else {throw new Exception("Error Processing Request", 1);}
        }

        $con->commit();
        $st = true;
    }catch(Exception $e) {
        $st = false;
    }


    $arr = array(
        'a' => $st,
    );
    echo json_encode($arr);
}