<?php

echo "Hallo WebDev-Unterricht!";

// Variablen
$first_name = "Stefan";
$last_name = "Pohl";
$age = 23;
$isMarried = false;

// Datentypen
string: $s = "Hello World";
integer: $i = 42;
double: $d = 3.14;
$n = null;

// Arithmetische Operatoren
$x = 10;
$y = 20;
$sum = $x + $y;
$dif = $x - $y;
$product = $x * $y;
$qoutient = $x / $y;
$mod = $x % $y;

//Konstanten
const PI = 3.141592;
define("E", 2.71828);

//Vergleichsoperatoren
$x = 10;
$y = 20;
echo "Ergebnis: " . ($x == $y); //false, .-Operator für Konkatenation
var_dump($x != $y);     // true
var_dump($x < $y);      // true
var_dump($x > $y);      // false
var_dump($x <= $y);     // true
var_dump($x >= $y);     // false
var_dump($x === $y);    // Vergleicht auch den Datentyp!

//If-Anweisungen
$temperatur = 5;
if ($temperatur < 10) {
    echo "Es ist kalt.";
} else {
    echo "Es ist warm.";
}

// ternärer Operator: wenn Bedingung ? dann TRUE : sonst FALSE
// Verknüpfung mit &&, || (und !)
// auch switch

// Schleifen
for ($i = 0; $i < 5; $i++){
    echo $i . "<br>"; // Konkatenation mit .-Operator
}

// auch while , do-while mit break, continue

// Arrays
$array = array (1, 2, 3, 4, 5);
$array1 = [6, 7, 8, 9];

// assoziative Arrays
$age = array("Peter" => 35, "Berni" => 37, "Josef" => 43);

// Zugriff über [index]!
// unset() fürs Zurücksetzen

// foreach-Schleife für Arrays
foreach ($array as $wert) {
    echo $wert . ", ";
}

foreach ($age as $key => $value) {
    echo $key . " ist " . $value . " Jahre alt.<br>";
}

// Funktionen
function greet($name){
    return "Hallo, " . $name;
}

echo greet("Max Mustermann");

// call-by-value vs call-by-reference! -> &



?>