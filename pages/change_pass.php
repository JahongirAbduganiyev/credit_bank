<?php
include("../db_kassa.php");
include("session.php");
$user_name = $_POST['user_name'];
$eski_pass = $_POST['eski_pass'];
$yangi_pass = $_POST['yangi_pass'];
if (isset($_POST['change_pass'])){
    $sql = $con->query("SELECT * FROM `user` WHERE user_name='{$user_name}' and pass=md5('{$eski_pass}')") or die($con->error);
    if ($sql->num_rows > 0){
        $res = $sql->fetch_array();
        $update = $con->query("UPDATE `user` SET pass=md5('{$yangi_pass}') WHERE id = '{$res['id']}'");
        ?>
        <script>
            alert("Parol o'zgartirildi!");
            window.location.href = "logout.php";
        </script>
        <?php
    }else{
        ?>
            <script>
                alert("Eski parol xato kiritilgan!");
            </script>
        <?php
    }
}
