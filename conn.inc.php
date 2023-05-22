<?php
$conn = new MySQli (DB["host"], DB["user"], DB["pwd"], DB["name"]);

if($conn->connect_errno>0) {
	die("Fehler im Verbindungsaufbau: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

?>