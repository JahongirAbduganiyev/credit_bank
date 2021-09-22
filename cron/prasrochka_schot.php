<?php
include("../db_kassa.php");
    $con->autocommit(false);
    try {
        $cl = $con->query("select * from client where status=0");
        foreach ($cl as $value) {
            $query = $con->query("SELECT * FROM `credit_tani` WHERE client_id='{$value['id']}' ORDER BY id DESC LIMIT 1");
            $res1 = $query->fetch_array();
            $bugun = date("Y-m-d");
            $farq = strtotime($res1['tolov_sana']) - strtotime($bugun);
            if ($farq > 0){
                $res = $con->query("select * from muddati_o_tani WHERE client_id='{$value["id"]}' and status=0 ORDER BY id ASC LIMIT 1");
                $row = $res->fetch_object();
                $sana = $row->sana;
                $client_id = $row->client_id;

                $farq_kun = (strtotime($bugun) - strtotime($sana)) / (60 * 60 * 24);
                $koifsent = ($farq_kun * 0.1) / 3;
                $status = round_up($koifsent, 1);

                if ($client_id == "") continue;

                $res1 = $con->query("UPDATE `prasrochka` SET `kun`='{$farq_kun}', `status`='{$status}' WHERE id=" . $client_id);
                if (!$res1) throw new Exception("Error Processing Request", 1);
            }
        }
        $con->commit();
        $fp1 = fopen('test.txt', 'a');
        fwrite($fp1, 'Prasrochka schot cron file ishladi! => '.date("l jS \of F Y h:i:s A")."\n");
        fclose($fp1);
    }catch (Exception $e){
        $fp2 = fopen('test.txt', 'a');
        fwrite($fp2, 'Prasrochka schot cron file ishlamadi! => '.date("l jS \of F Y h:i:s A")."\n");
        fclose($fp2);
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