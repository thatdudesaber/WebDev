<?php
$datum = $_POST['datum'];

if(validateDatum($datum)){

} else {
    $errors['datum'] = 'Bitte geben Sie ein gültiges Datum ein!';
}


function validateDatum($datum){

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JS-Demo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <form action="index.php" method="post">
        <label for="datum">Ausleihdatum:</label>
        <input type="date" name="datum" id="datum" value="" required />
        <button type="submit">Ausleihen</button>
    </form>
    <script src="js/index.js"></script>
    
</body>
</html>