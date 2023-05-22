<?php
require("includes/config.inc.php");
require("includes/conn.inc.php");
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Räume</title>
</head>
<body>
    <h1>Räume</h1>
    <nav>
        <ul>
            <li><a href="index.html">zurück zur Übersicht</a></li>
            <li><a href="schueler.php">zurück zur Schülerübersicht</a></li>
            <li><a href="klassen.php">zurück zur Klassenübersicht</a></li>
        </ul>
    </nav>
    <ul>
        <?php
        $sql= "select tbl_Raeume.Bezeichnung as Raumname, tbl_klassen.Bezeichnung as Klassenname from tbl_Raeume 
            LEFT JOIN tbl_klassen on tbl_klassen.FIDRaum=tbl_Raeume.IDRaum
            ORDER BY tbl_Raeume.IDRaum";
        
        $raeume = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);

        while($raum = $raeume->fetch_object()) {
            if (is_null($raum->Klassenname)) {
                echo('<li>Raumname: ' . $raum->Raumname . '</li>');
            } else {
                echo('<li>Raumname: ' . $raum->Raumname . ' hat die Klasse: ' . $raum->Klassenname . '</li>');
            }
        }
        ?>
    </ul>
    
</body>
</html>