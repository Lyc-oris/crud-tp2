<?php

$nameserver = "localhost";
$username = "root";
$userpass = "root";

try{ 
    $conn = new PDO("mysql:host=$nameserver;dbname=db_stagiaires",$username ,$userpass);

    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "Connection faild: ". $e->getMessage();
    
}

?>
