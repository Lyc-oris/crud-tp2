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

    <div class="container mt-5 shadow-lg pb-3 mb-5 rounded">
        <a style="margin-top: 5%;" href="added.php" class="btn btn-outline-primary">Added New Person</a>
        <form action="index.php" method="post">
            <?php if (empty($_POST['search']))
                $_POST['search'] = '' ?>
            <input class="bg-white text-dark shadow-lg p-3 rounded" style="margin-bottom :5%; margin-left: 20%;" type="text" id="search" name="search" placeholder="search for your intern" value="<?php echo $_POST['search'] ?>">
        </form>
        <form action="filter.php" method="post">
            <?php  ?>
            <select style="margin-bottom :5%;width:50% " class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="byfname">first name</option>
                <option value="bylname">last name</option>
                <option value="byemail">email</option>
                <option value="bysector">sector</option>
            </select>
            <button class="btn btn-outline-primary" type="submit">Filter</button>
        </form>
        <table class="table table-striped " style="border: solid ; ">
            <thead style="background-color:red">
                <tr>
                    <th class="border-end border-black" scope="col">number</th>
                    <th class="border-end border-black" scope="col">First Name</th>
                    <th class="border-end border-black" scope="col">Last Name</th>
                    <th class="border-end border-black" scope="col">Email</th>
                    <th class="border-end border-black" scope="col">Sector</th>
                    <th class="border-end border-black" scope="col">Profile Picture</th>
                    <th class="border-end border-black" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                require 'db.php';



                if (empty($_POST['search'])) {
                    $sql = $conn->prepare("SELECT * FROM stagiaires");
                    $sql->execute();
                    $stagiaires = $sql->fetchAll();
                } else {
                    $sql = "SELECT * FROM stagiaires WHERE fname LIKE :search OR lname LIKE :search or email LIKE :search OR sector LIKE :search ";
                    $sql = $conn->prepare($sql);
                    $searchpater = "%" . $_POST['search'] . "%";
                    $sql->bindParam(':search', $searchpater);
                    $sql->execute();
                    $stagiaires = $sql->fetchAll();
                }




                foreach ($stagiaires as $s) {

                ?>

                    <tr style="border: solid;">
                        <input type="hidden" name="id" value="<?php echo $s['id'] ?>">
                        <th scope="row"><?php echo $s['id'] ?></th>
                        <td class="border border-secondary-subtle"><?php echo $s['fname'] ?></td>
                        <td class="border border-secondary-subtle"><?php echo $s['lname'] ?></td>
                        <td class="border border-secondary-subtle"><?php echo $s['email'] ?></td>
                        <td class="border border-secondary-subtle"><?php echo $s['sector'] ?></td>
                        <td class="border border-secondary-subtle"><img style="width: 50px;" src="<?php echo $s['picture'] ?>" alt="profile picture"></td>
                        <td class="border border-secondary-subtle">
                            <form class="mb-2" action="updateForm.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $s['id'] ?>">
                                <button name="update" style="width: 90%;" class="btn btn-outline-primary">Modify</button>
                            </form>
                            <form class="mt-2" action="delete.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $s['id'] ?>">
                                <button name="delete" style="width: 90%;" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    </form>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>