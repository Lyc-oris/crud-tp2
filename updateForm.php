<?php

require 'db.php';

if (isset($_POST['update'])) {
    $sql = $conn->prepare("SELECT * FROM stagiaires WHERE :id = id");
    $sql->bindParam(':id', $_POST['id']);
    $sql->execute();
    $stagiaires = $sql->fetch();

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Added</title>
            <link rel="stylesheet" href="css/styles.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

        </head>

        <body>
            <form action="update.php" method="post">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12 col-sm-12">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <h3 class="card-title text-center mb-4">Update Form</h3>
                                        <div class="mb-3">
                                            <input type="hidden" name="id" value="<?php echo $stagiaires['id'] ?>">
                                            <label for="lname" class="form-label">Last Name</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="lname"
                                                placeholder="Enter your last name"
                                                required
                                                name="lname"
                                                value="<?php echo $stagiaires['lname'] ?>" />
                                            <div class="form-text">Please enter your last name.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="fname" class="form-label">First Name</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="fname"
                                                placeholder="Enter your first name"
                                                required
                                                name="fname"
                                                value="<?php echo $stagiaires['fname'] ?>" />
                                            <div class="form-text">Please enter your first name.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input
                                                type="email"
                                                class="form-control"
                                                id="email"
                                                placeholder="Enter your email"
                                                required
                                                name="email"
                                                value="<?php echo $stagiaires['email'] ?>" />
                                            <div class="form-text">Please enter your email.</div>
                                        </div>
                                        <div class="mb-3">
                                            <?php
                                            if ($stagiaires['sector'] == 'Dev FullStack')
                                                echo ' <label for="bio" class="form-label">Sector</label>
                                            <select name="sector" class="form-select" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option name="sector" value="Dev FullStack" selected>Dev FullStack</option>
                                                <option name="sector" value="Dev web FullStack">Dev web FullStack</option>
                                                <option name="sector" value="Dev mobile">Dev mobile</option>
                                            </select>';
                                            elseif ($stagiaires['sector'] == 'Dev web FullStack') {
                                                echo ' <label for="bio" class="form-label">Sector</label>
                                                <select name="sector" class="form-select" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option name="sector" value="Dev FullStack" >Dev FullStack</option>
                                                <option name="sector" value="Dev web FullStack" selected>Dev web FullStack</option>
                                                <option name="sector" value="Dev mobile">Dev mobile</option>
                                            </select>';
                                            } elseif ($stagiaires['sector'] == 'Dev mobile') {
                                                echo '<label for="bio" class="form-label">Sector</label>
                                                <select name="sector" class="form-select" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option name="sector" value="Dev FullStack" >Dev FullStack</option>
                                                <option name="sector" value="Dev web FullStack" >Dev web FullStack</option>
                                                <option name="sector" value="Dev mobile" selected>Dev mobile</option>
                                            </select>';
                                            }
                                            ?>


                                            <div class="form-text">Please choose one sector.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="profileImage" class="form-label">Profile Image</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="profileImage"
                                                required
                                                name="picture"
                                                placeholder="Put your profile pictre url"
                                                value="<?php echo $stagiaires['picture'] ?>"/>
                                            <div class="form-text">Please put your url image.</div>
                                        </div>
                                        <div class="position-relative py-2 px-4 pb-5">
                                            <button class="btn btn-outline-primary position-absolute top-50 start-50 translate-middle mt-1 " name="update" id="update" type="submit">Update</button>
                                            <a href="index.php" class=" btn btn-outline-primary position-absolute top-50 start-0 translate-middle-y">List</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </body>

        </html>
    </body>

    </html>





<?php


}
