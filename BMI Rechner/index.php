<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap Verlinkung -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>BMI-Rechner</title>
</head>
<body>

<?php

//Formularvariablen definieren
$name = "";
$date = "";
$size = "";
$weight = "";


?>

<!-- Hauptblock mit Überschrift -->

<div class="container">

    <h2>BMI Rechner</h2>


    <!-- Formular -->
    <form id="bmi" action="index.php" method="post">

        <div class="row">
            <div class="col-sm-6 form-group">
                 <label for="name">Name*</label>
                 <input type="text"
                        name="name"
                        class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                        value="<?= htmlspecialchars($name) ?>"
                        maxlength="35"
                        required="required">

            </div>
            <div class="col-sm-6 form-group">
            <label for="date">Messdatum*</label>
                 <input type="date"
                        name="date"
                        class="form-control <?= isset($errors['date']) ? 'is-invalid' : '' ?>"
                        value="<?= htmlspecialchars($date) ?>"
                        onchange="validateDate(this)"
                        required="required">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 form-group">
                        <label for="size">Größe (cm)*</label>
                        <input type="number"
                            name="size"
                            class="form-control <?= isset($errors['size']) ? 'is-invalid' : '' ?>"
                            value="<?= htmlspecialchars($size) ?>"
                            required="required">
            </div>
            <div class="col-sm-6 form-group">
                        <label for="name">Gewicht (kg)*</label>
                        <input type="number"
                            name="weight"
                            class="form-control <?= isset($errors['weight']) ? 'is-invalid' : '' ?>"
                            value="<?= htmlspecialchars($weight) ?>"
                            required="required">
            </div>
        </div>
    </form>





<!-- Textausgabe (mal schauen, ob und wo ich das benötige) -->

<!-- Buttons -->

</div>


    
</body>
</html>