<?php

$theme="light";

if(isset($_GET["theme"])){

    //Validierung nicht vergessen
    $theme = $_GET["theme"];
    setcookie("themecookie", $theme, time()+60*60*24*365);
}
elseif(isset($_COOKIE["themecookie"])){
    $_COOKIE["themecookie"];
}else{
    $theme="light";
}

    var_dump($_COOKIE);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Lesson</title>

    <?php
    if($theme == 'dark')
    {
        echo "<link href='css/darktheme.css' rel='stylesheet'>";
    }
    else{
        echo "<link href='css/lighttheme.css' rel='stylesheet'>";
    }
    ?>
</head>
<body>
    <a href="?theme=dark" class="href">Dark Theme</a>
    <a href="?theme=light" class="href">Light Theme</a>
</body>
</html>