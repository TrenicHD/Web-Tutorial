<?php
$host = "localhost:3306";
$name = "test";
$user = "test";
$passwort = "****";
try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
} catch (PDOException $e){
    echo "SQL Error: ".$e->getMessage();
}
 ?>