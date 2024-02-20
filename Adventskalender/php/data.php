<?php

// Ein Array mit Links zu 24 Bildern
// Bilder und Beschreibungen werden im Kalender erst nach dem Anklicken aufgedeckt.
// Einfach nach Bedarf die Bildlinks und Beschreibungstexte austauschen.
$bilder = array(
    array("pfad" => "bilder/bild4.jpg", "beschreibung" => "A Plätzchen a day, keeps the Weihnachtsstress away.", "fensternr" => 4),
    array("pfad" => "bilder/bild7.jpg", "beschreibung" => "Es heißt im Advent nicht, ich habe zugenommen, sondern: Ich habe gewichtelt.", "fensternr" => 7),
    array("pfad" => "bilder/bild12.jpg", "beschreibung" => "Langsam könntest Du mal über Glühwein nachdenken", "fensternr" => 12),
    array("pfad" => "bilder/bild1.jpg", "beschreibung" => "Warum feiern wir ausgerechnet immer dann Weihnachten, wenn die Geschäfte voll sind?", "fensternr" => 1),
    array("pfad" => "bilder/bild3.jpg", "beschreibung" => "Warum summen die Bienen? Weil sie den Text nicht auswendig können", "fensternr" => 3),
    array("pfad" => "bilder/bild8.jpg", "beschreibung" => "Mami, Mami, ich habe immer noch Kopfschmerzen. Dann geh doch bitte endlich von der Dartscheibe weg!", "fensternr" => 8),
    array("pfad" => "bilder/bild11.jpg", "beschreibung" => "Warum steht der Burgernländer mit einen Kerze vor dem Spiegel? Er feiert den zweiten Advent.", "fensternr" => 11),
    array("pfad" => "bilder/bild10.jpg", "beschreibung" => "Für diesen Winter habe ich mir gleich zwei Schneeschippen gekauft: Ich paarschippe jetzt!", "fensternr" => 10),
    array("pfad" => "bilder/bild9.jpg", "beschreibung" => "Wie zieht sich ein Eskimo im Winter an? So schnell wie möglich!", "fensternr" => 9),
    array("pfad" => "bilder/bild2.jpg", "beschreibung" => "Wieso freuen sich Verbrecher auf den Winter? Wintereinbruch ist nicht strafbar!", "fensternr" => 2),
    array("pfad" => "bilder/bild19.jpg", "beschreibung" => "Hier könnte dein Spruch stehen.", "fensternr" => 19),
    array("pfad" => "bilder/bild13.jpg", "beschreibung" => "Hier könnte dein Spruch stehen.", "fensternr" => 13),
    array("pfad" => "bilder/bild15.jpg", "beschreibung" => "Hier könnte dein Spruch stehen.", "fensternr" => 15),
    array("pfad" => "bilder/bild18.jpg", "beschreibung" => "Was ist besser als ein POS-Test? Ein POS-Test vor Weihnachten", "fensternr" => 18),
    array("pfad" => "bilder/bild14.jpg", "beschreibung" => "Hier könnte dein Spruch stehen.r", "fensternr" => 14),
    array("pfad" => "bilder/bild6.jpg", "beschreibung" => "Hier könnte dein Spruch stehen.r", "fensternr" => 6),
    array("pfad" => "bilder/bild17.jpg", "beschreibung" => "Hier könnte dein Spruch stehen.", "fensternr" => 17),
    array("pfad" => "bilder/bild24.jpg", "beschreibung" => "Hier könnte dein Spruch stehen.", "fensternr" => 24),
    array("pfad" => "bilder/bild5.jpg", "beschreibung" => "Hier könnte dein Spruch stehen.", "fensternr" => 5),
    array("pfad" => "bilder/bild20.jpg", "beschreibung" => "Hier könnte dein Spruch stehen.", "fensternr" => 20),
    array("pfad" => "bilder/bild21.jpg", "beschreibung" => "Hier könnte dein Spruch stehen.r", "fensternr" => 21),
    array("pfad" => "bilder/bild16.jpg", "beschreibung" => "Hier könnte dein Spruch stehen.", "fensternr" => 16),
    array("pfad" => "bilder/bild22.jpg", "beschreibung" => "Hier könnte dein Spruch stehen.", "fensternr" => 22),
    array("pfad" => "bilder/bild23.jpg", "beschreibung" => "Hier könnte dein Spruch stehen.r", "fensternr" => 23)
  );
  


/**
 * Liefert alle fenster als array zurück
 */
function getAllFensterlen()
{
    global $bilder;
    return $bilder;
}

/**
 * Liefert alle fenster als array zurück, wobei die Reihenfolge der Elemente zufällig gewählt wird.
 */
function getAllFensterlenInRandomOrder()
{
    global $bilder;
    shuffle($bilder);
    return $bilder;
}


/**
 * Funktion erstellt ein Array mit Beschreibung und Bildpfaden
 */
// function generateArray()
// {
//     // Erstelle ein leeres Array
//     $bilder = array();

//     // Füge 24 Bilder hinzu
//     for ($i = 1; $i <= 24; $i++) {
//     // Erstelle den relativen Pfad zum Bild
//     $pfad = "bilder/bild$i.jpg";
//     // Erstelle die Bildbeschreibung
//     $beschreibung = "Fenster $i";
//     // Füge das Bild zum Array hinzu
//     $bilder[] = array("pfad" => $pfad, "beschreibung" => $beschreibung);
//     }

//     // gib das Array zurück
//     return $bilder;
// }


?>