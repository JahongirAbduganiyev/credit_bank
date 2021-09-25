<?php
    $con = mysqli_connect("localhost", "root", "", "credit");
    mysqli_set_charset($con, "utf8");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $log  = $_SESSION['user_login'];
    $pass = $_SESSION['user_pass'];


    $res = $con->query("SELECT * FROM `user` WHERE login='{$log}' and pass=md5('{$pass}')") or die($con->error);

    if($res->num_rows > 0)
    {
        $r = $res->fetch_array();
        $filial_kodi = $r['filial_kodi'];
        $user_name = $r['user_name'];
        $user_id = $r['id'];
    }