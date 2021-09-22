<?php
    include("../db_kassa.php");

    $arr = array();
    $i = 0;
    $sana = date("Y-m-d");
    $sql = $con->query("SELECT * FROM `client` WHERE status=0");
    foreach ($sql as $value) {
        //id, client_id, tolov_sana, oylik_tani, status
        $sql1 = $con->query("SELECT * FROM `credit_tani` WHERE status=0 and client_id='{$value["id"]}' ORDER BY id ASC LIMIT 1");
        $res = $sql1->fetch_array();
        $arr[$i] = $res;

        $sqlf = $con->query("SELECT * FROM `credit_foiz` WHERE client_id='{$value["id"]}'");
        $resf = $sqlf->fetch_array();
        //$arr[$i] = $resf;
        //$i++;

        if ($res['tolov_sana'] == $sana){
            $con->autocommit(false);
            try {
                $insert = $con->query("INSERT INTO `muddati_o_tani`(`client_id`, `sana`, `qarzdorlik`, `status`) 
                    VALUES (
                        '{$res["client_id"]}',    
                        '{$sana}',    
                        '{$res["oylik_tani"]}',    
                        '0'    
                    )");

                $foiz_jami = $resf["kunlik_foiz"] * $resf["kun"];
                $insert1 = $con->query("INSERT INTO `muddati_o_foiz`(`client_id`, `sana`, `qarzdorlik`, `status`) 
                    VALUES (
                        '{$resf["client_id"]}',    
                        '{$sana}',    
                        '{$foiz_jami}',    
                        '0'    
                    )");
                if($insert && $insert1){
                    $update  = $con->query("UPDATE `credit_tani` SET status=1 where id='{$res["id"]}'");
                    $update1 = $con->query("UPDATE `credit_foiz` SET kun=0 where id='{$resf["id"]}'");
                }else{
                    throw new Exception("Error Processing Request", 1);
                }
                $con->commit();
                $fp1 = fopen('test.txt', 'a');
                fwrite($fp1, 'Next Prasrochka cron file ishladi! => '.date("l jS \of F Y h:i:s A")."\n");
                fclose($fp1);
            }catch (Exception $e){
                $fp2 = fopen('test.txt', 'a');
                fwrite($fp2, 'Next Prasrochka cron file ishlamadi! => '.date("l jS \of F Y h:i:s A")."\n");
                fclose($fp2);
            }
        }
    }

    echo "<pre>";
    print_r($arr);
    echo "</pre>";