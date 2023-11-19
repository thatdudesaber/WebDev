<?php
require "lib/data.php";

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$filter = isset($_GET['filter']) ? $_GET['filter'] :'';
$data = getDataByID($id);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benutzerdetails</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body onload="initialize()">



<div class="container">

    <h1 class="pt-5">Benutzerdetails</h1>
    <a href="index.php?filter=<?=$filter?>">zurück</a>

    <?php
    if ($data == null){
        echo "<p class='alert alert-danger'>Benutzer nicht gefunden</p>";
    } else {
        ?>
        <table class="table table-striped users table-borderless mt-3">
            <tbody>
            <tr>
                <td>Vorname</td>
                <td><?= $data['firstname'] ?></td>
            </tr>
            <tr>
                <td>Nachname</td>
                <td><?= $data['lastname'] ?></td>
            </tr>
            <tr>
                <td>Geburtsdatum</td>
                <td><?= dateFormat($data['birthdate'] )?></td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td><?= $data['email'] ?></td>
            </tr>
            <tr>
                <td>Telefon</td>
                <td><?= $data['phone'] ?></td>
            </tr>
            <tr>
                <td>Straße</td>
                <td><?= $data['street'] ?></td>
            </tr>
            </tbody>
        </table>
        <?php
    }
     ?>


</div>

    
</body>
</html>