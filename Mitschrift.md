## Mitschrift


#### **Termin 19.09.2023**

### Basiswissen
Variablen werden in PHP mit dem "$"-Zeichen gekennzeichnet.
PHP hat Syntax-Technisch einige Ähnlichkeiten mit Java. Beispiele dazu:
if-Verzweigungen, Schleifen und Arithmetische sowie Boole'sche Operatoren sind ident.

### Wie funktioniert PHP überhaupt?
PHP ist eine Programmiersprache, die für Webapplikationen benutzt werden kann.
Das Handling funktioniert über einen Server, der die Anfrage von PHP interpretieren lässt und das Ergebnis zurückschickt.


#### **Termin 26.09.2023**

### Geschichte von PHP
PHP wurde im Jahre 1995 von Herrn Rasmus Lerdorf entwickelt und ist auch heute noch eine der wichtigsten Programmiersprachen in der Entwicklung dynamischer Webapplikationen. Man konnte die ersten 20 Jahre in PHP keinen objektorientieren Code schreiben und wurde dadurch erst mit dem Update auf Version 7.0 wieder richtig interessant. Seit 8.1 unterstützt PHP sogar die Nebenläufigkeit: Multithreading.

### Sprachverständnis
#### Variablen deklarieren
Variablen werden in PHP mit einem Dollar-Zeichen "$" voran angeschrieben und dürfen Groß- und Kleinbuchstaben sowie Unterstriche beinhalten. Eine statische Typendeklaration, wie es in den meisten Programmiersprachen bekannt ist, gibt es jedoch nicht, da PHP den Typ je nach gegebenen Wert eigenständig definiert.
Damit man einem Variablenwert einen festen Typ zuweisen kann, muss man dieses jediglich "casten". Das sieht dann ungefähr so aus:
```php
$var = (string) 12;
```
Was auch möglich ist, ist die Funktion settype() zu benutzen:
```php
$var = '44';        // $var wird hier als String definiert
$var.settype(int);  // $var wird zu einem Integer
```

#### Type Juggling
Eine weitere Möglichkeit in PHP ist es, Variablentypen dynamisch in der Laufzeit zu ändern, da die Programmiersprache je nach Aufgabe, der Variable den passenden Wert zuteilt.
```php
$var = '1';             // $var ist ein String.
$var = $var * 1;        // $var ist jetzt ein Integer.
$var = (string) $var;   // $var ist wieder ein String. Wurde gecastet.
```

#### Referenzen
Anstatt einer Variable immer direkt einen Wert zuzuweisen, kann man auch den Wert einer anderen Variable referenzieren. Dafür benötigt man jediglich den &-Operator. Aber **ACHTUNG**, da es sich dann bei dem Wert der Variablen nur um einen einzigen Speicherort handelt. Wird eine Variable überschrieben, werden **ALLE** überschriebenSieht in der Praxis so aus:
```php
$lastName = 'Smith';
$birthName = &$lastName;    // enthält nun auch den Wert "Smith"
$birthName = 'Connor';      // Veränderung von $birthName ändert auch $lastName
echo $lastName;             // Ausgabe von: 'Connor'
```

#### Vordefinierte Variablen und Namensraum
Wie in jeder Programmiersprache gibt es in PHP vordefinierte Variablen und Funktionen. Diese sind über die [Dokumentation](https://www.php.net/manual/de/reserved.variables.php) nachschlagbar.

Der Namensraum von Variablen beschreibt den Bereich, in dem definierte Variablen sichtbar sind. Wenn Sie eine Variable einer Datei in einer anderen Datei benutzen wollen, kann man dafür das Schlüsselwort include, oder sicherer include_once, benutzen. Das sieht im Code dann so aus:
```php
<?php
include "zuInkludierendeDatei.php";
echo $variableDerAnderenDatei;
```

Außerdem kann man auch eigens definierte Namensräume über das Schlüsselwort namespace erzeugen.
Das würde auch die Syntax der Ausgabe verändern.
```php
<?php
include "zuInkludierendeDatei.php";
echo \zuInkludierendeDatei\$variableDerAnderenDatei;
```

#### Kontrollstrukturen

```php
if (!isset($_GET['firstName'])){                // mit der Funktion isset() wird überprüft, ob das Feld firstName einen Wert übergeben bekommen hat. Die Funktion gibt einen Boole'schen Wert zurück.
    echo 'Bitte geben Sie einen Vornamen ein!'; // Textausgabe, wenn Variable firstName NULL ist.
} else {
    $firstName = $_GET['firstName']; // Programmablauf, wenn Variable firstName einen Wert besaß.
}
```

Mehrfachverzweigungen kann man mit dem Schlüsselwort elseif aneinander verketten, jedoch ist dies bei mehreren Outcomes unübersichtlich und aufwendig.
Diese sollte man besser mit einem switch-case lösen:

```php
switch ($_GET['formDerAnrede']){
    case 'm':
        echo "Guten Tag Herr {$lastName}";
        break;
    case 'f':
        echo "Guten Tag Frau {$lastName}";
        break;
    default:
        echo "Guten Tag, {$firstName} {$lastName}";
}
```

#### Schleifen

Schleifen funktionieren im Grunde komplett gleich wie in den anderen, bekannten Programmiersprachen:
```php
<?php
$i = 1;             // Initialisierung
while ($i <= 10) {  // Bedingung
    echo $i++;      // Anweisung und Inkrementierung
}
```

Die foreach-Schleife hat jedoch eine leicht andere Syntax, aber grundgenommen ändert sich das ":" wie von Java bekannt zu einem "as":
```php
<?php
$translations = [
    'Mr' => 'Herr',
    'Mrs' => 'Frau',
];

foreach ($translations as $eng => $ger){
    echo "Die Übersetzung von $eng ist $ger.";
}
```

#### Funktionen und Exceptionhandling

Funktionen werden mit dem Schlüsselwort function gekennzeichnet und funktionieren ident wie in anderen bekannten Programmiersprachen.

Funktionsparameter, die für die Ausführung der Funktion benötigt werden, werden innerhalb der runden Klammern mitgegeben:

Falls die Funktion einen Wert zurückliefern soll, wird dies mit dem Schlüsselwort return definiert.
```php
<?php
$a = 3;
$b = 12;

function add($a, $b){
    $sum = $a + $b;
    return $sum;
}
```

#### TODO
- Anonyme Funktionen
- Pfeilfunktionen
- Exceptionhandling
- OOP
- Sichtbarkeit
- Vererbung
- Abstrakte Klassen
- Formulare


