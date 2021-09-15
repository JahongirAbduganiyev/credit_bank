<?php
    include("../db_kassa.php");

    $sql = $con->query("SELECT * FROM `credit_foiz` WHERE status=0");
    $bugun = date("Y-m-d");
    foreach ($sql as $value):
        $query = $con->query("SELECT * FROM `credit_tani` WHERE client_id='{$value['client_id']}' ORDER BY id DESC LIMIT 1");
        $res = $query->fetch_array();

        $farq = strtotime($res['tolov_sana']) - strtotime($bugun);

        if ($farq > 0){
            $update = $con->query("UPDATE credit_foiz SET kun=kun+1 where id='{$value['id']}'");
        }

    endforeach;