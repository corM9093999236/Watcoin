<?php

$mysqli = new mysqli("localhost", "root", "password", "watcoin");

$count = +$_POST["count"] || 0;

$stmt = $mysqli->prepare("INSERT INTO results (count) VALUES (?)");
$stmt->bind_param("i", $count);
$stmt->execute();

$stmt->close();
$mysqli->close();

?>
