<?php
//require_once ("classes/Database.php");
//$db = new Database();

if($_SESSION['sef'] == 0) {
    header("Location: zaposleni.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sef</title>
</head>
<body>
    <div class="main-menu">
        <h1> Sef </h1>
        <a href="sef.php"> Lista ucenika </a>
        <a href="noviRadnik.php">Dodaj zaposlenog</a>
        <a href="logout.php">Odjavi se</a>
    </div>
</body>
</html>