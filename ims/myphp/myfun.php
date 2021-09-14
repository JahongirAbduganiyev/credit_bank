<?php
//  Database Connection
$con = mysqli_connect("localhost", "root", "root", "credit");
mysqli_set_charset($con, "utf8");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function KassaSelect()
{
       global $con;
       
       $res =   $con->query("SELECT * FROM kassa where filial_kodi=100 and kir_chiq_status=0");
       $Arr1=[]; $i=0;
       if($res->num_rows > 0)
       {
           while($row = $res->fetch_array())
           {
               $Arr1[$i]=$row;
               $i++;
           }

           return $Arr1;
           
       }
       else
       {
            return $Arr1;
       }
}
function BoshqarmaSelect()
{
       global $con;
       
       $res =   $con->query("SELECT * FROM kassa where filial_kodi=100 and kir_chiq_status=1");
       $Arr1=[]; $i=0;
       if($res->num_rows > 0)
       {
           while($row = $res->fetch_array())
           {
               $Arr1[$i]=$row;
               $i++;
           }

           return $Arr1;
           
       }
       else
       {
            return $Arr1;
       }
}
function JamiSumma()
{

    //Sana Qo'shilmadi
    global $con;
    $res = $con->query("SELECT sum(summa) as jami From kassa Where tolov_turi='naqt' and kir_chiq_status=0 and tasdiq_status=1 and filial_kodi='100' ");
    $kjami = 0;
    if($res->num_rows > 0)
    {
        $r1 = $res->fetch_array();
        // $kjami = $r1['jami'];
        $kjami= $r1['jami'] ?? 0;
    }
    
    $res_1 = $con->query("SELECT sum(summa) as chjami From kassa where kir_chiq_status=1 and tasdiq_status in (0,1)  and filial_kodi='100' ");
    //$chjami=0;
    if($res_1->num_rows > 0)
    {
        $r2 = $res_1->fetch_array();
        $chjami = $r2['chjami']??0;
    }   
    return $kjami-$chjami;
}
function KutishSumma()
{
    global $con;
    $kres=$con->query("SELECT sum(summa) as kjami  FROM kassa where  tolov_turi='naqt' and kir_chiq_status=1 and tasdiq_status=0 and filial_kodi='100' ");
//    $kjam = $kres;
    $kjam=0;
    if($kres->num_rows >0)
    {
        $kj =   $kres->fetch_array();      
        $kjam = $kj['kjami'] ?? 0;

    }

    return $kjam;
}
function InkassaInsert()
{
    global $con;   
        try 
        {
                if(isset($_POST['tasdiq']))
                {   

                    $ret    =      $con->query("SELECT count(*) as soni FROM kassa Where kir_chiq_status=0 and tasdiq_status=0 and filial_kodi='100' ");
                    $ksoni  = 0;
                    if($ret->num_rows > 0)
                    {
                        $ks = $ret->fetch_array();
                        $ksoni  = $ks['soni'] ?? 0;
                    }
                    if($ksoni==0)
                    {
                                $jsum        =       str_replace(" ","",$_POST['jami_summa']);
                                $chsum      =       str_replace(" ","",$_POST['kirim_summa']);                   
                                $fcode      =          "100";
                                $izox         =          $_POST['izox'];

                                    if($jsum >= $chsum  && $jsum!=0 && $chsum!=0)
                                    {
                                        $re =   $con->query("INSERT INTO kassa(
                                            `client_id`,
                                            `summa`,
                                            `tolov_turi`,
                                            `kir_chiq_status`,
                                            `tasdiq_status`,
                                            `filial_kodi`,
                                            `insert_user_id`,
                                            `update_user_id`,
                                            `izox`
                                                ) 
                                            VALUES(
                                            '0',
                                            '{$chsum}',
                                            'naqt',
                                            '1',
                                            '0',
                                            '{$fcode}',
                                            '1',
                                            '1',
                                            '{$izox}'            
                                            ) ") or die($con->error);


                                            if($re)
                                            {
                                                true;           
                                                ?>
                                                    <script>
                                                        alert("Malumotlar Bazaga Kiritildi");
                                                    </script>
                                                <?php
                                            } 
                                            else 
                                            {
                                                throw new Exception("Error Processing Request", 1);
                                            }  
                                            ?>
                                                <script>                                                   
                                                    window.location="?a=boshqarma_inkassa";
                                                </script>
                                            <?php
                                                                
                                     }
                                else
                                {
                                    ?>
                                        <script>
                                            alert("Mablag'ingiz Yetarli Emas!");
                                            window.location="?a=boshqarma_inkassa";
                                        </script>
                                    <?php
                                }
                 }
                else
                    {
                            ?>
                                <script>                                        
                                        alert("Tasdiqlanmagan To'lov Bor!");
                                </script>
                        <?php
                    }
                }    
            $con->commit();   
            mysqli_close($con);
         }    
        catch(Exception $e) 
        {
            echo "Xatolik Sodir Bo'ldi";          
            
        }
  
}



?>