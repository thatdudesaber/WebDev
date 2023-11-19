<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benutzerdaten</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<?php

/**
 * Verzweigung wie folgt:
 * Falls bereits ein Filter vorhanden ist / nicht null ist, wird die Funktion "getFilteredData()" aufgerufen.
 * Wenn dem nicht so ist wird geprüft, ob ein Filter bereits gesetzt wurde. Hier wird einfach überprüft, ob der Submit-Button gedrückt wurde.
 * Falls dies auch nicht zutrifft, wird davon ausgegangen, dass die Webseite zum ersten Mal geöffnet wurde oder der Leeren-Button
 * gedrückt wurde. Daher wird dort auch die getAllData()-Funktion aufgerufen.
 * 
 * @param $filter - Speichert "filter" von der vorheringen Link-Injection in die lokale Variable.
 * @author Stefan Pohl 
 **/

require "lib/data.php";

$filter = isset($_GET["filter"]) ? $_GET["filter"] :"";

if($filter != null && $filter != ""){
    $data = getFilteredData($filter);
} elseif (isset($_POST["submit"])){
    $filter = isset($_POST["filter"]) ? $_POST["filter"] :"";
    $data = getFilteredData($filter);
} else {
    $data = getAllData();
}

            
?>


<div class="container">

    <h1 class="pt-5">Benutzerdaten anzeigen</h1>

    <div class="input-group">
        <form action="index.php" method="post" class="form-inline m-2">
            <label for="filter" class="mr-2">Suche:</label>
            <input  type="text"
                    id="filter"
                    name="filter"
                    class="form-control pl-2 pr-2"
                    maxlength="30"
                    value="<?= htmlspecialchars($filter)?>"
                    required
            />
            <input type="submit" name="submit" class="btn btn-primary ml-2" value="Suchen"/>
        </form>
        <form action="index.php" method="get" class="mt-2">
            <input type="submit" class="btn btn-secondary" value="Leeren"/>
        </form>
    </div>
</div>    


<div class="container">
    <table class="table table-striped users mt-2">
        <tbody>
            <tr>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Geburtsdatum</th>
            </tr>

            <?php

            /**
             * Falls das $data-Array leer ist, wird die Meldung "Keine Einträge gefunden" ausgegeben.
             * Andernfalls wird pro Durchlauf der foreach-Schleife eine Zeile in der Tabelle erweitert,
             * bis das gegebene $data-Array keine Einträge mehr besitzt. Mithilfe der dateFormat()-Funktion,
             * wird das Datenfeld 'birthdate' zum europäischen Standart formatiert.
             * Damit die ID und der Suchfilter in details.php verwendet werden können,
             * werden per Link-Injection diese Variablen automatisch mit in den Hyperlink gegeben.
             * Linkformat (ohne php-code): "details.php?id=(int)&filter=(string)"
             * 
             * @author Stefan Pohl
             **/

            if($data == null) {
                echo "<tr class='alert alert-dark'><td colspan='3'>Keine Einträge gefunden</td></tr>";
            } else {
                foreach ($data as $row) {
                ?>
                <tr>
                    <td><a href="details.php?id=<?=$row['id']?>&filter=<?=$filter?>"><?=$row["firstname"] . " " . $row["lastname"] ?></td>
                    <td><?=$row["email"] ?></td>
                    <td><?=dateFormat($row["birthdate"]) ?></td>
                </tr>
                <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
    
</body>
</html>