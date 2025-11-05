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
    <form action="index.php" method="get">
        <input style="margin-left: 40%;margin-top: 4%;" type="text" id="search" name="search" placeholder="search for your intern">
        <div class="container mt-5 shadow-lg p-3 mb-5 rounded">
    </form>

    <a href="added.php" class=" ">Added New Person</a>
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
            $nameserver = "localhost";
            $username = "root";
            $userpass = "root";
            $number = 1;


            $conn = new PDO("mysql:host=$nameserver;dbname=db_stagiaires", $username, $userpass);


            if (isset($_POST['search']) == '') {
                $sql = $conn->prepare("SELECT * FROM stagiaires");
                $sql->execute();
                $stagiaires = $sql->fetchAll();
            } else {
                $sql = "SELECT * FROM stagiaires WHERE fname LIKE :search OR lname LIKE :search";
                $sql = $conn->prepare($sql);
                $sql->bindParam(':search' , $_POST['search']);
                $sql->execute();
                $stagiaires = $sql->fetch();
            }






            foreach ($stagiaires as $s) {

            ?>
                <form action="update.php" method="post">
                    <tr style="border: solid;">
                        <input type="hidden" name="id" value="<?php echo $s['id'] ?>">
                        <th scope="row"><?php echo $number ?></th>
                        <td class="border border-secondary-subtle"><?php echo $s['fname'] ?></td>
                        <td class="border border-secondary-subtle"><?php echo $s['lname'] ?></td>
                        <td class="border border-secondary-subtle"><?php echo $s['email'] ?></td>
                        <td class="border border-secondary-subtle"><?php echo $s['sector'] ?></td>
                        <td class="border border-secondary-subtle"><img style="width: 25%;" src="<?php echo $s['picture'] ?>" alt="profile picture"></td>
                        <td class="border border-secondary-subtle"><button style="width: 100%;" class="btn btn-outline-primary">Modify</button></td>
                    </tr>
                </form>
            <?php
                $number += 1;
            }
            ?>
        </tbody>
    </table>
    </div>

</body>

</html>