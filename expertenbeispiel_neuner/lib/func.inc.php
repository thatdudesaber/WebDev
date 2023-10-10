<?php

/**
 * enthält alle Validierungsfehler (assoziatives Array)
 */
$errors = [];

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

function validateExamDate($examDate)
{
    global $errors; // Zugriff auf die globale Fehlervariable

    // ungültig wenn: leeres Datum, falsches Format oder in der Zukunft
    try {
        if ($examDate == "") {
            $errors['examDate'] = "Prüfungsdatum darf nicht leer sein";
            return false;
        } else if (new DateTime($examDate) > new DateTime()) {
            $errors['examDate'] = "Prüfungsdatum darf nicht in der Zukunft liegen";
            return false;
        } else {
            return true;
        }
    } catch (Exception $e) {
        $errors['examDate'] = "Prüfungsdatum ungültig";
        return false;
    }
}

function validateSubject($subject)
{
    global $errors; // Zugriff auf die globale Fehlervariable

    // nur "m", "d" oder "e" erlaubt
    if ($subject != 'm' && $subject != 'd' && $subject != 'e') {
        $errors['subject'] = "Fach ungültig";
        return false;
    } else {
        return true;
    }
}

function validateGrade($grade)
{
    global $errors; // Zugriff auf die globale Fehlervariable

    // Zahl, 1 bis 5
    if (!is_numeric($grade) || $grade < 1 || $grade > 5) {
        $errors['grade'] = "Note ungültig";
        return false;
    } else {
        return true;
    }
}

/**
 * validierung der optionalen E-Mail-Adresse
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

function validate($name, $email, $examDate, $subject, $grade)
{
    return validateName($name) & validateEmail($email) & validateExamDate($examDate) &
        validateSubject($subject) & validateGrade($grade);
}
