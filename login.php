<?php

require 'db.php';
session_start();

$smt = $conn->prepare("SELECT * FROM Users");
$smt->execute();
$smt->fetch() ;
var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex">
        <form action="index.php" method="post"></form>
        <div class="justify-content-center container" style="width: 50%;">
            <h3>Sign in</h3>
            <div class="input-group mb-3 ">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3 ">
                <span class="input-group-text" id="basic-addon2">*</span>
                <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
            </div>
            <button class="btn btn-outline-primary" name="login" type="submit">Sign in</button>
        </div>
    </div>
</body>

</html>