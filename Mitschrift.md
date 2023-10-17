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



#### **Termin 03.10.2023**

## Lernaufgabe 1.1 - Mitschrift zu Expertenvideo

### Teil 1 Problemstellung
Ziel der Aufgabe:
Eine Webapplikation zum Erfassen und Prüfen von Schulnoten entwickeln.

Mindestanforderungen der Prototyps:
 - HTML-Formular mit Eingabefeldern und Beschriftung
 - Löschfunktion zum leeren aller Felder
 - Validierungsknopf
 - Nachricht an den User, ob die Daten passen, oder nicht.
 - Bei Validierungsfehlern soll die entsprechende Fehlermeldung ausgegeben werden.
 - Responsiveness über das Framework Bootstrap bereitstellen

 WICHTIG! Jede Webapplikation muss eine eine Art der Datenvalidierung besitzen. In diesem Beispiel wird eine Client- und Serverseitige Validierung zum Einsatz gebracht.
 Clientseitig werden die Daten **vor** dem Absenden überprüft. Validieren z.B. über Input-HTML-Typen und den passenden Zusatzangaben wie *min*, *max*, oder *length*.
 Serverseitig werden die Daten **nach** dem Senden auf den Server mittels PHP überprüft und validiert. Da eine Clientseitige Validierung leicht geändert oder deaktiviert werden kann, ist die Serverseitige Validierung ein ***muss***!

### Teil 2 Lösungsansatz

1. Formular erstellen
- HTML-Formular in index.html
- Datenübertragung soll per HTTP-Post im selben Script erfolgen
2. Eingabefelder definieren
- Jedes Eingabefeld benötigt ein eigenes HTML-Input-Element
- Datenverwaltung - jedes Element benötigt einen eindeutigen Parameter
3. Clientseitige Validierung
- Lösung durch HTML und JS
- Vorteil: Benutzer sieht nach der Eingabe sofort, ob und was falsch eingegeben wurde. Außerdem werden im Falle eine falschen Eingabe keine Daten an den Server geschickt, somit kann Traffic vermieden werden.
- Nachteil: Kann von einem User bearbeitet bzw. deaktiviert werden, daher ist eine Serverseitige Validierung ein ***muss***!
4. Serverseitige Validierung
- **Muss immer ausgeführt werden!**
5. Datenverarbeitung
6. Ausgabe der Ergebnisse


### Teil 3 Implementierung

#### Start des Projektes

1. Projekt anlegen und Bootstrap herunterladen
2. Ordner anlegen (je nach Dateityp strukturieren)
3. index.html anlegen und Bootstrap CSS integrieren

#### Mockup umsetzen

Tipps im Vorherein:
- div Container für die einzelnen HTML Elemente benutzen, da sich dies für die Mobile-First-Methode Webseiten zu gestalten sehr gut anwendbar macht.
- Bootstrap Documentation durchlesen, da man mit den prädistenierten Klassen die Webseite formatiert.

Coding:
1. Formular erstellen
- Wichtige Parameter:
    - ```<form>``` - Tag erstellt ein Formular-Element
    - ```action``` - Inline-Tag beschreibt das Ziel der Eingabe des Formulars
    - ```method``` - Inline-Tag dass die Datenverarbeitungsart beschreibt
- Alle Felder wie beim Mockup implementieren
    - Jedes Feld hat einen eigenen Container
    - Jeder Input kann einfach kopiert werden, jediglich die felder type und name müssen geändert werden
- Da wir im Mockup zwei Spalten haben, einmal mit zwei Input-Feldern und einmal mit drei, können wir diese mit zwei weiteren div-Containern trennen.
2. Buttons erstellen
- Button muss mit dem ```<input>``` - Tag bestimmte Parameter mitgegeben bekommen, damit HTML weiß, was beim drücken des Buttons ausgeführt werden soll.
    - z.B. ```type="submit"```
3. Clientseitige Validierung
- Neue Tags wie z.B.
    - maxlength
    - required (notnull)
    - min & max
    - etc.
- JS-File (wird im Header oder am Ende des Body der HTML verlinkt)
- In der JS File mit der Hilfe einer Funktion die Validierung des Datums ausführen.
4. Serverseitige Validierung
- Validierung per PHP-Script
    - Funktion schreiben, in der alle Daten der Eingabefelder als Parameter übergeben werden und anschließend über eine IF-Verzweigung validiert werden.
- PHP-Bereich in der HTML-Datei im Body inkludieren
- PHP-Funktionen jedoch auslagern und im PHP-Bereich verlinken
- Damit globale Variablen in Funktionen in PHP sichtbar sind muss man innerhalb der Funktion das Schlüsselwort ```global $variable;``` angeben.

### Teil 4 Test und Erweiterung

- Damit man die Funktionen der serverseitigen Validierung testen kann, muss man im Browser über die Developer-Konsole den Webseitencode manuell modifizieren.
    - Typenfelder ändern um clientseitige Validierung zu deaktivieren.
    - Prüfungen und Code-Referenzierungen entfernen und überprüfen, ob die Webseite das Formular annimmt, oder ablehnt
- Im Ansichtsmodus der Developer-Konsole auf "variabel" wechseln, um die "Responsiveness" der Webseite zu gewähren.

Mehr wurde im Video nicht mehr besprochen.

#### **Termin 17.10.2023**

### HTTP
Das Hypertext Transfer Protocol ist für die Kommunikation in Webanwendungen (Request and Response) zwischen dem Client und dem Server zuständig. Dabei wird jede seperate Datei (Bilddateien, JS-Files, etc.) als einzelne Anfragen vom Browser an den Server übermittelt und dort verarbeitet werden.

#### Request and Response
Ein **Request** startet, in dem der Client eine Anfrage an den Server stellt (z.B. das Senden eines Formulares, Link klicken, am Server gespeicherte Musikdatei abspielen, etc.)
Eine **Response** ist die Antwort des Servers auf die Anfrage. Je nachdem, was der Client verlangt, kann die Anfrage Daten aus einer oder mehreren Datensätzen zurückschicken. Das hängt von der serverseitigen Logik und dem Use-Case ab.

**Der standartisierte Aufbau einer HTTP-Anfrage od. -Antwort:**

- Meta Informationen
    - Start Line - Beschreibt den Auftrag genau
    - Header (Optional) - Noch genauere Beschreibung
    - Zum Trennen der Infos folgt eine leere Zeile
- Body (aka. Payload) - Daten, die zu übertragen sind.

#### Methoden

- GET: Hiermit werden Daten vom Server abgerufen
- POST: Hiermit werden vom Client eigegebene Daten auf den Server übertragen
- PUT: Hiermit kann man Daten auf dem Server aktualisieren, falls nicht unterstützt -> POST
- DELETE: Hiermit werden Daten auf dem Server gelöscht
- PATCH: Hiermit können kleine Änderungen an Ressourcen vorgenommen werden
- HEAD: Selten verwendet, wie GET-Methode, liefert aber nur die Header-Daten zurück
- OPTIONS: Hiermit lässt sich testen, mit welchen HTTP-Methode eine URL aufgerufen werden kann.
- TRACE: Hiermit kann ermittelt werden, welchen Weg die Anfrage nimmt. Sehr praktisch für Security-Tests.
- CONNECT: Hiermit stellt man einen HTTP-Tunnel zwischen Browser und Server her.

#### Cookies
Cookies ermöglichen es kleinere Mengen von Informationen auf der Clientseite zu speichern und im Falle eines weiteren Besuchs serverseitig auszulesen. 
