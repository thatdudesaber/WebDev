<?php

    $email = "";

    //1. Schritt - Daten entgegennehmen
    if(isset($_POST["email"]) && checkEmail($_POST["email"]))
    {
        // 2. Schritt - Validieren der Form-Daten
        $email = $_POST["email"];

        //3. Schritt - Mit den Daten arbeiten
        echo "Validierung der Email hat funktioniert:" . $email;
        echo htmlspecialchars($email);
        
    }
    else
    {
        // Todo: Fehlermeldungen
        echo "Validierung der Email hat nicht funktioniert!";
        $email = "";
    }

    function checkEmail($email){
        if($email != "" && !filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "Email ungültig!";
            return false;
        } else {
            return true;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrierung</title>
</head>
<body>

<h1>Registrierung</h1>

<form action="formular.php" method="post" class="form-example">
  <div class="form-example">
    <label for="firstname">Vorname: </label>
    <input type="text" name="firstname" id="firstname" placeholder="Max" required />
  </div>
  <div class="form-example">
    <label for="lastname">Nachname: </label>
    <input type="text" name="lastname" id="lastname" placeholder="Mustermann" required />
  </div>
  <div class="form-example">
    <label for="email">Enter your email: </label>
    <input type="email" name="email" id="email" placeholder="max.mustermann@gmx.at" required />
  </div>
  <div class="form-example">
    <label for="date">Geburtsdatum: </label>
    <input type="date" name="date" id="date" required />
  </div>
  <div class="form-example">
    <input type="submit" value="Subscribe!" />
  </div>

</form>
</body>
</html>