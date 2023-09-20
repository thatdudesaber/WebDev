<?php

/**
 * enthält alle Validierungsfehler (assoziatives Array)
 */
$errors = [];

function validate($name, $email)
{
    return validateName($name) & validateEmail($email);
}

/**
 * validierung des Namens
 * 
 * @param $name
 * @return bool
 */
function validateName($name)
{
    global $errors; // Zugriff auf die globale Fehlervariable

    if (strlen($name) == 0) {
        $errors['name'] = "Name darf nicht leer sein";
        return false;
    } else if (strlen($name) > 20) {
        $errors['name'] = "Name zu lang";
        return false;
    } else {
        return true;
    }
}

/**
 * validierung der E-Mail-Adresse
 *
 * @param $email
 * @return bool
 */
function validateEmail($email)
{
    global $errors; // Zugriff auf die globale Fehlervariable

    if ($email != "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "E-Mail ungültig";
        return false;
    } else {
        return true;
    }
}