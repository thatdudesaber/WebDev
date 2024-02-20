<?php
    $offeneFenster = array();
    //Falls das Cookie gesetzt ist, lies den Inhalt ein...

    //Falls auf ein Fenster geklickt wurde, setze das Cookie...
    if (isset($_GET['fenster']))
    {
        $fensternr = filter_input(INPUT_GET, 'fenster', FILTER_VALIDATE_INT);
        if ($fensternr > 0 && $fensternr <=24)
        {
            array_push($offeneFenster, $fensternr);
            //Speichere Zustand in ein Cookie...
        }

    }
?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stil1.css">
    <title>Adventkalender</title>
</head>
<body>
    <header class="topheader">
        <h1>Adventkalender 2023</h1>
    </header>
    <main id="winter" class="fenstercontainer">

        <?php
            //Erzeuge HTML für die Ausgabe
            $html = '';
            //Der HTML-Code für ein Fenster als Vorlage mit Platzhaltern
            $fensterTemplate = '
            <article class="fenster">
                <h2 class="fensterhead">+++NR+++</h2>
                <span class="fenstertext">+++BESCHREIBUNG+++</span>
                <a href="index.php?fenster=+++NR+++#+++NR+++">
                    <img id="+++NR+++" src="+++PFAD+++" alt="+++BESCHREIBUNG+++">
                </a>   
            </article>
            ';

            require_once('php/data.php');
            //Hole die Daten...
            $fenster = getAllFensterlen();
            foreach ($fenster as $key => $value) {
                $url = $value['pfad'];
                $beschriftung = $value['beschreibung'];
                $fensternr = $value['fensternr'];
                //Erzeuge ein Fenster-Element
                $fensterHTML = $fensterTemplate;

                //Suche im Array der offenen Fenster nach der aktuellen Fensternummer.
                //Wenn vorhanden: Fenster aufdecken
                if (array_search($fensternr, $offeneFenster, false)!==false)
                {
                    //Ersetze die Platzhalter im Template durch konkrete Werte
                    $fensterHTML = str_replace('+++PFAD+++',$url, $fensterHTML);
                    $fensterHTML = str_replace('+++NUMMER+++',$fensternr.'<br>'.$beschriftung, $fensterHTML);
                    $fensterHTML = str_replace('+++NR+++',$fensternr, $fensterHTML);
                    $fensterHTML = str_replace('+++BESCHREIBUNG+++',$beschriftung, $fensterHTML);
                }
                 //Wenn nicht gefunden: Fenster geschlossen halten (Default-Bild)
                else{
                    $fensterHTML = str_replace('+++PFAD+++','bilder/fenster_default.jpg', $fensterHTML);
                    $fensterHTML = str_replace('+++NUMMER+++',$fensternr, $fensterHTML);
                    $fensterHTML = str_replace('+++NR+++',$fensternr, $fensterHTML);
                    $fensterHTML = str_replace('+++BESCHREIBUNG+++','', $fensterHTML);
                }
               
                //Füge das Fenster-Element hinzu
                $html .= $fensterHTML;
                
            }
            echo $html;

        ?>

    </main>
    <footer>&copy; Stefan Pohl 2023</footer>
    <script src="js/schnee.js"></script>
</body>
</html>