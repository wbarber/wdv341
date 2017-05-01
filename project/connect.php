<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2/27/2017
 * Time: 8:33 PM
 */

$servername = "localhost";
$username = "wbarber81_wdv341";
$password = "password";
$database= "wbarber81_wdv341";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}
catch (PDOException $e) {
    echo "Connection failed: ".$e->getMessage();
}