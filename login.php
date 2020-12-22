<?php
require_once ("connection.php");
//require_once ("classes/Database.php");

//TODO napravi bazu i podesi
$user="";
$paswd="";

if(isset($_POST["username"])) {
    $user = $_POST["username"];
} else if(isset($_COOKIE["username"])) {
    $user = $_COOKIE["username"];    
}

if(isset($_POST["password"])) {
    $paswd = $_POST["password"];
} else if(isset($_COOKIE["password"])) {
    $paswd = $_COOKIE["password"];    
}

$username = $mysqli->real_escape_string(strip_tags($user));
$password = $mysqli->real_escape_string(strip_tags($paswd));

$sql = "SELECT * FROM radnik WHERE username = '$username'";
$result = $mysqli->query($sql);

if($result && $result->num_rows == 1) {
    $row = $result->fetch_assoc();

    if($password == $row['password']) {
        if(isset($_POST["savepass"])) {
            setcookie("password", $row["password"], time()+30*60*24*60);

        }

        $_SESSION['loggedIn'] = TRUE;
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['sef'] = 0;
        //ako se sef ulogovao salje nas na njegovu stranu, inace na stranicu radnika
        if($row['sef'] == 1) {
            $_SESSION['sef'] = 1;
            header("Location: sef.php");
        } else {
            header("Location: zaposleni.php");
        }
    } else {
        //header("Location: login.php");
        echo "Netacan username ili password  1";
    }
} else {
    //header("Location: login.php");
    echo "Netacan username ili password  2";
}
?>