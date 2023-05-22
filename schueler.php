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
  <title>Schüler</title>
</head>
<body>
  <h1>Schüler</h1>
  <nav>
    <ul>
      <li><a href="index.html">zurück zur Übersicht</a></li>
      <li><a href="klassen.php">zurück zu der Klassenübersicht</a></li>
      <li><a href="raeume.php">zurück zur Raumübersicht</a></li>
    </ul>
  </nav>
  <ul>
   <?php 
  $sql = "
				SELECT
				tbl_schueler.Vorname,
        tbl_schueler.Nachname
				FROM tbl_schueler
        ORDER BY Nachname ASC, Vorname ASC
			";

      $schuelern = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			while($schueler = $schuelern->fetch_object()) {
				echo('
        <ul>
					<li>' . $schueler->Vorname . ' ' . $schueler->Nachname . '</li>
					');
          echo('
          </ul>
        </li>
      ');
       }  
      ?>
      <form method="GET" action="">
        <input type="text" name="suche" placeholder="Suche nach Schüler">
        <input type="submit" value="Suchen">
      </form>
</ul>
<?php
if (isset($_GET['suche'])) {
    $suchbegriff = $_GET['suche'];

    $query = "SELECT * FROM tbl_schueler WHERE Nachname LIKE '%$suchbegriff%' OR Vorname LIKE '%$suchbegriff%'";
    $result = mysqli_query($conn, $query);

    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['Nachname'] . ", " . $row['Vorname'] . "</li>";
    }
    echo "</ul>";
}
?>
</body>
</html>