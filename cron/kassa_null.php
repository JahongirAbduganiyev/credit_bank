<?php
    include("../db_kassa.php");

    function kassa_sum($con,$status,$filial,$sana){
        $sql = $con->query("SELECT sum(summa) as jami FROM `kassa` WHERE DATE(sana)='{$sana}' AND kir_chiq_status='{$status}' AND tasdiq_status=1 AND filial_kodi='{$filial}'");
        $res = $sql->fetch_array();
        return $res['jami'];
    }

    $con->autocommit(false);
    try {
        $sana = Date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +1 Day")); // 2013-03-31
        $bugun = date("Y-m-d");
        //echo $sana;
        $sql = $con->query("select * from filiallar");
        foreach ($sql as $value) {
            $farq = kassa_sum($con, '0', $value['kodi'], $bugun) - kassa_sum($con, '1', $value['kodi'], $bugun);
            if ($farq) {
                $sql1 = $con->query("
                INSERT INTO `kassa`(
                    `sana`,
                    `client_id`, 
                    `summa`, 
                    `tolov_turi`, 
                    `kir_chiq_status`, 
                    `tasdiq_status`, 
                    `filial_kodi`, 
                    `insert_user_id`, 
                    `update_user_id`, 
                    `izox`) 
                VALUES (
                    '{$sana}',
                    'avto',
                    '{$farq}',
                    'naqt',
                    '0',
                    '1',
                    '{$value['kodi']}',
                    'avto',
                    'avto',
                    'kassa qoldiq yangi kunga otqazildi'
                )
            ") or die($con->error);
                if(!$sql1) throw new Exception("Error Processing Request", 1);
            }

            //echo kassa_sum($con,'0', $value['kodi'])."<br>";
            //echo kassa_sum($con,'1', $value['kodi'])."<br>";
        }
        $con->commit();
        $fp1 = fopen('test.txt', 'a');
        fwrite($fp1, 'Kassa null cron file ishladi! => '.date("l jS \of F Y h:i:s A")."\n");
        fclose($fp1);
    }catch (Exception $e){
        $fp2 = fopen('test.txt', 'a');
        fwrite($fp2, 'Kassa null cron file ishlamadi! => '.date("l jS \of F Y h:i:s A")."\n");
        fclose($fp2);
    }
