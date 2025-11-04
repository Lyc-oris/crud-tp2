<?php
$nameserver = "localhost";
$username = "root";
$userpass = "root";


$conn = new PDO("mysql:host=$nameserver;dbname=db_stagiaires", $username, $userpass);
$stmt = $conn->prepare("SELECT * FROM stagiaires WHERE fname LIKE "%'search'%" OR lname like ");
$stmt->execute();
$stagiaires = $stmt->fetchAll();
