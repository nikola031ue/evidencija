<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="evidencija_radnika";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if($mysqli->connect_error) {
    die("Konekcija nije uspela: " . $mysqli->connect_error);
}

?>