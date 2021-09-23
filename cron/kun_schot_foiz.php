<?php
    include("../db_kassa.php");

    $con->autocommit(false);
    try {
        $sql = $con->query("SELECT * FROM `credit_foiz` WHERE status=0");
        $bugun = date("Y-m-d");
        foreach ($sql as $value):
            $query = $con->query("SELECT * FROM `credit_tani` WHERE client_id='{$value['client_id']}' ORDER BY id DESC LIMIT 1");
            if (!$query) throw new Exception("Error Processing Request", 1);
            $res = $query->fetch_array();

            $farq = strtotime($res['tolov_sana']) - strtotime($bugun);

            if ($farq > 0) {
                $update = $con->query("UPDATE credit_foiz SET kun=kun+1 where id='{$value['id']}'");
                if (!$update) throw new Exception("Error Processing Request", 1);
            }
        endforeach;

        $con->commit();
        $fp1 = fopen('test.txt', 'a');
        fwrite($fp1, 'Kun schot foiz cron file ishladi! => '.date("l jS \of F Y h:i:s A")."\n");
        fclose($fp1);
    }catch (Exception $e){
        $fp2 = fopen('test.txt', 'a');
        fwrite($fp2, 'Kun schot foiz cron file ishlamadi! => '.date("l jS \of F Y h:i:s A")."\n");
        fclose($fp2);
    }