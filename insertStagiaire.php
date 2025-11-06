<?php

require 'db.php';

$stmt = $conn->prepare("INSERT INTO stagiaires (lname , fname , email , sector , picture) VALUES(:a , :b , :c , :d ,:e)");

$stmt->bindParam(':a', $_POST['lname']);
$stmt->bindParam(':b', $_POST['fname']);
$stmt->bindParam(':c', $_POST['email']);
$stmt->bindParam(':d', $_POST['sector']);
$stmt->bindParam(':e', $_POST['picture']);
$stmt->execute();


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


header('location: index.php');
