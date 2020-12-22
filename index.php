<?php
require_once ("login.php");
//require_once ("classes/Database.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evidencija zaposlenih</title>
</head>
<body>
    <form method="POST" class="login-form" action="login.php">
        <h1>Prijavi se</h1>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="checkbox" name="savepass"> Sacuvaj lozinku </input>
        <button type="submit">Prijavi se</button>
    </form>


</body>
</html>