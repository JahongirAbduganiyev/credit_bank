<?php
include("../db_kassa.php");

if (isset($_POST["client_id"])) {
    $res = $con->query("select * from client where client_kodi=".$_POST["client_id"]);
    $row = $res->fetch_object();
    if ($row){
        $info = array(
            'status' => 1,
            'client_kodi' => $row->client_kodi,
            'credit_kodi' => $row->credit_kodi,
            'credit_status' => $row->status,
        );
        echo json_encode($info);
    }else{
        $info = array(
            'status' => 2,
        );
        echo json_encode($info);
    }
}