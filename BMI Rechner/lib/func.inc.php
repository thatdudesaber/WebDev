<?php
$errors = [];

function validateName($name)
{
    global $errors; // Zugriff auf die globale Fehlervariable

    if (strlen($name) == 0) {
        $errors['name'] = "Name darf nicht leer sein";
        return false;
    } else if (strlen($name) > 30) {
        $errors['name'] = "Name zu lang";
        return false;
    } else {
        return true;
    }
}

function validateDate($date)
{
    global $errors; // Zugriff auf die globale Fehlervariable

    // ungültig wenn: leeres Datum, falsches Format oder in der Zukunft
    try {
        if ($date == "") {
            $errors['date'] = "Messungsdatum darf nicht leer sein";
            return false;
        } else if (new DateTime($date) > new DateTime()) {
            $errors['date'] = "Messungsdatum darf nicht in der Zukunft liegen";
            return false;
        } else {
            return true;
        }
    } catch (Exception $e) {
        $errors['examDate'] = "Prüfungsdatum ungültig";
        return false;
    }
}

function validateSize($size)
{
    global $errors; // Zugriff auf die globale Fehlervariable

    // Zahl, 1 bis 5
    if (!is_numeric($size) || $size < 1 || $size > 250) {
        $errors['size'] = "Größe ungültig!";
        return false;
    } else {
        return true;
    }
}

function validateWeight($weight)
{
    global $errors; // Zugriff auf die globale Fehlervariable


    return true;
}




function validate($name, $date, $size, $weight)
{
    return validateName($name) & validateDate($date) &
        validateSize($size) & validateWeight($weight);
}
