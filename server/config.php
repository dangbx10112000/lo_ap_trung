<?php
$server = "localhost";
$username = "id16723080_root";
$password = "D@nggD@ngg1234";
$database = "id16723080_users";
$connect = new mysqli($server, $username, $password, $database);
        if ($connect ->connect_error) {
            die("Connection failded! :".$connect->connect_error);
        }
 ?>