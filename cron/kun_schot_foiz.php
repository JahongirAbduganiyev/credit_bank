<?php
    include("../db_kassa.php");

    $sql = $con->query("SELECT * FROM `credit_foiz` WHERE status=0");

    foreach ($sql as $value):
        $update = $con->query("UPDATE credit_foiz SET kun=kun+1 where id='{$value['id']}'");
    endforeach;