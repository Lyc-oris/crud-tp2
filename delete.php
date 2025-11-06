<?php

require 'db.php';


if (isset($_POST['delete'])) {
    $sql = $conn->prepare("DELETE FROM stagiaires WHERE :id = id");
    $sql->bindParam(':id', $_POST['id']);
    $sql->execute();
    header('location: index.php');
}