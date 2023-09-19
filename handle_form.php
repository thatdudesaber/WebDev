<?php



if (isset($_POST)) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    echo "Anmeldung für " . $name . " mit der Email '" . $email . "' war erfolgreich!";
}


?>