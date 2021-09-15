<?php
    ob_start();
    session_start();

    include("../db_kassa.php");

    if (isset($_POST["sign_in"])){

        $_SESSION['user_login'] = mysqli_real_escape_string($con, $_POST['login']);
        $_SESSION['user_pass']  = mysqli_real_escape_string($con, $_POST['pass']);
        $log  = $_SESSION['user_login'];
        $pass = $_SESSION['user_pass'];

        $res = $con->query("SELECT * FROM `user` WHERE login='{$log}' and pass=md5('{$pass}')") or die($con->error);

        if ($res->num_rows > 0){
            header('location:../index.php');
        }else{
            header('location:logout.php');
        }
    }

    ob_end_flush();