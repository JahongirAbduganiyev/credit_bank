<?php

$con1 = mysqli_connect("localhost","root","","sotuv_baza");
mysqli_set_charset($con1, "utf8mb4");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
