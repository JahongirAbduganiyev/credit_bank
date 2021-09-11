<?php
//  Database Connection
$con = mysqli_connect("localhost", "root", "", "credit");
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
    $res = $con->query("SELECT sum(summa) as jami From kassa Where tolov_turi='naqd' and kir_chiq_status=0 and tasdiq_status=1 and filial_kodi='100' ");
    if($res->num_rows > 0)
    {
        $r1 = $res->fetch_array();
        $kjami = $r1['jami'];
    }
    else{
        $kjami = 0;
    }

    $res_1 = $con->query("SELECT sum(summa) as jami From kassa Where tolov_turi='naqd' and kir_chiq_status=1 and tasdiq_status in (0,1) and filial_kodi='100' ");
    if($res_1->num_rows > 0)
    {
        $r2 = $res_1->fetch_array();
        $chjami = $r2['jami'];
    }
    else{
        $chjami = 0;
    }
    return $kjami-$chjami;
}
function KutishSumma()
{
    global $con;
    $kres=$con->query("SELECT sum(summa) as kjami FROM kassa where  tolov_turi='naqd' and kir_chiq_status=1 and tasdiq_status=0 and filial_kodi='100' ");
    if($kres->num_rows > 0)
    {
        $kj =   $kres->fetch_array();
        $kjam   =   $kj["kjami"];

    }
    else
    {
        $kjam = 0;
    }
    return $kjam;
}
function InkassaInsert()
{
    global $con;
    $con->autocommit(false);
    
	try {
            if(isset($_POST['tasdiq']))
            {
                //$jsum   = str_replace(" ","",$_POST['jami_summa']);
                $chsum  =   str_replace(" ","",$_POST['kirim_summa']);
               // $qol    =   $jsum-$chsum;
                $fcode  =   "100";
                $izox   =   $_POST['izox'];
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
                    'naqd',
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
         

        $con->commit();   
        mysqli_close($con);
    }   

    catch(Exception $e) 
    {
        echo "Xatolik Sodir Bo'ldi";          
        
    }
  
}



?>