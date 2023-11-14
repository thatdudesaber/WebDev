<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benutzerdaten</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body onload="initialize()">

<div class="container">

    <h1 class="pt-5">Benutzerdaten anzeigen</h1>

    <form action="index.php" method="post" class="form-inline mt-4">
        
            <div class="form-group">
                <label for="search">Suche: </label>
                <input type="text" class="form-control ml-2" name="search" id="search" required />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block ml-2" value="Suchen" />
            </div>
            <div class="form-group">
                <a href="index.php" class="btn btn-secondary btn-block ml-2">Leeren</a>
            </div>
    </form>
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

            require "lib/data.php";

            $data = getAllData();

                if(sizeof($data) == 0) {
                    echo "<tr class='alert alert-dark'><td colspan='3'>Keine Einträge gefunden</td></tr>";
                }
                foreach ($data as $row) {
            ?>
                <tr>
                    <td><a href="details.php?id=<?=$row['id']?>"><?=$row["firstname"] . " " . $row["lastname"] ?></td>
                    <td><?=$row["email"] ?></td>
                    <td><?=$row["birthdate"] ?></td>
                </tr>
            <?php
                }

            ?>
        </tbody>


    </table>

</div>
    
</body>
</html>