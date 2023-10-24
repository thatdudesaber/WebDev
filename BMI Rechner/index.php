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

//einbinden der Validierungsfunktionen
require "lib/func.inc.php";

//Formularvariablen definieren
$name = "";
$date = "";
$size = "";
$weight = "";

if (isset($_POST['submit'])) {

    // double-check: zuerst pruefen ob die Daten im Request enthalten sein, dann auslesen
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $date = isset($_POST['date']) ? $_POST['date'] : "";
    $size = isset($_POST['size']) ? $_POST['size'] : "";
    $weight = isset($_POST['weight']) ? $_POST['weight'] : "";

    // Validierung der Daten und Ausgabe des Ergebnisses (an der aktuellen Stelle in der HTML-Seite)
    if (validate($name, $date, $size, $weight)) {
        echo "<p class='alert alert-success'>Die eingegebenen Daten sind in Ordnung!</p>";
    } else {
        echo "<div class='alert alert-danger'><p>Die eingegebenen Daten sind fehlerhaft!</p><ul>";
        foreach ($errors as $key => $value) {
            echo "<li>" . $value . "</li>";
        }
        echo "</ul></div>";
    }
}


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

        <!-- Buttons -->
        <div class="row mt-3">
            <div class="col-sm-3 mb-3">
                <input type="submit"
                       name="submit"
                       class="btn btn-primary btn-block"
                       value="Speichern"
                >
            </div>

            <div class="col-sm-3">
                <a href="index.php" class="btn btn-secondary btn-block">Löschen</a>
            </div>

        </div>
    </form>





<!-- Textausgabe (mal schauen, ob und wo ich das benötige) -->


</div>


    
</body>
</html>