<?php
require 'db.php';


if (isset($_POST['update'])) {
    $sql = $conn->prepare("UPDATE stagiaires SET lname = :lname , fname = :fname , email = :email , sector = :sector , picture = :picture WHERE id = :id");
    $sql->bindParam('id' , $_POST['id']);
    $sql->bindParam(':lname', $_POST['lname']);
    $sql->bindParam(':fname', $_POST['fname']);
    $sql->bindParam(':email', $_POST['email']);
    $sql->bindParam(':sector', $_POST['sector']);
    $sql->bindParam(':picture', $_POST['picture']);
    $sql->execute([':id' => $_POST['id'],
                    ':lname'=> $_POST['lname'],
                    ':fname'=> $_POST['fname'],
                    ':email'=> $_POST['email'],
                    ':sector'=> $_POST['sector'],
                    ':picture'=> $_POST['picture'],
                ]);
    header('location: index.php');
}