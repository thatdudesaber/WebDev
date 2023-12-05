<?php

$errors = [];

if(validateDatum($datum)){
    $datum = htmlspecialchars($_POST['datum']);
} else {
    $errors['datum'] = 'Bitte geben Sie ein gültiges Datum ein!';
}


    function validateDatum($datum){
        $currentDate = new DateTime('now');
        if($datum != null && $datum != '' && $datum < $currentDate) {
            echo "Datum passt!";
            return true;
        } else {
            echo "Datum passt nit!";
            return false;
        }
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
    
    <div class="container">
        <form action="index.php" method="post">
            <label for="datum">Ausleihdatum:</label>
            <input type="date" name="datum" id="datum" value="<?=htmlspecialchars($datum)?>" required />
            <button type="submit">Ausleihen</button>
        </form>
    </div>
    
<script src="js/index.js"></script>

</body>
</html>