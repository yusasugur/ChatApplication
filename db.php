<?php

$dsn = "mysql:host=localhost;dbname=final;charset=utf8mb4" ;
$user = "phpmyadmin" ;
$pass = "password" ;

try {
    $db = new PDO($dsn, $user, $pass) ;
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;

} catch( PDOException $ex) {
    echo $ex->getMessage() ;
    echo "<p>Error occured try later.</p>";
    exit ;
}

 ?>
