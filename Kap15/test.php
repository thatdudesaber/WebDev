<html>
<head>
      <title>PHP-Test</title>
</head>
<body>
    <?php
    //Testausgabe
    echo '<p>Hallo Welt</p>'; 
    
    //Variablen
    $firstName = 'Max';             //Variablendeklaration und Initialisierung
    $firstName = (string) 'Max';    //Typen-Casting

    //Type-Juggling
    $var = '1';             //$var ist ein String.
    $var = $var * 1;        //$var ist jetzt ein Integer.
    $var = (string) $var;   //$var ist wieder ein String.
    ?>
</body>
</html>