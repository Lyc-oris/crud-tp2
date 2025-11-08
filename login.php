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
    <form class="d-flex justify-content-center  border border-5 shadow-lg" style="padding: 0;margin:4%" action="logindb.php" method="post">
        <div class="" style="width:50%;">
            <h3>Sign in</h3>
            <?php
            session_start();
            if (isset($_SESSION['user']) == true) {
                header('location: index.php');
            }
            ?>
            <div class="input-group mb-3 ">
                <span class="input-group-text" id="email">@</span>
                <input type="email" class="form-control" name="email" id="email" placeholder="Tapez votre e-mail" required>
            </div>
            <div class="input-group mb-3 ">
                <span class="input-group-text" id="password">*</span>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <?php
            if (isset($_GET['error']) == true && $_GET['error'] == "true")
                echo "<span>Les infosrmations sont érronées</span>"

            ?>
        </div>
        <button class="btn btn-outline-primary" name="login" type="submit">Sign in</button>
        </div>
    </form>
</body>

</html>