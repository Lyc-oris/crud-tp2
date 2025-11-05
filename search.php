<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$nameserver = "localhost";
$username = "root";
$userpass = "root";



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
</body>
</html>





