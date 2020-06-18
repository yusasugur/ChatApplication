<?php
require "db.php" ;

$msg = $_GET["msg"];
$user = $_GET["user"];

 $sql = "insert into messages (nick, content) values (?,?)" ;
 try{
   $stmt = $db->prepare($sql) ;
   $stmt->execute([$user, $msg]) ;
 }catch(PDOException $ex) {

 }

 ?>
