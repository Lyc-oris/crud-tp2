<?php


require 'db.php';

$stm = $conn->prepare('SELECT * FROM users WHERE email = :e AND password = :p');
$p =md5($_POST['password']);
$stm->bindParam(':e', $_POST['email']);
$stm->bindParam(':p' ,$p);
$stm ->execute();

$result= $stm ->fetch();

if (is_array($result) == true) {
    session_start();
    $_SESSION['user'] = $result;
    header('location: index.php');
}
else{
    header('location: login.php?error=true');
}

?>