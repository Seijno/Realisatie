<?php
session_start();
if(empty($_SESSION) || $_SESSION["admin"] == 0){
    header("location: login.php");
}
include "pdo.php";

if(isset($_GET["searchPlayer"])) {

    $query = $pdo->prepare("SELECT * FROM user WHERE username = :usr");
    $query->bindParam(":usr", $_GET["zoek"]);
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $player){
        $id = $player["ID"];
        echo $player["username"];
        echo "<br><a href='edit_player.php?id=$id'>edit</a><br><br>";
    }
    
}
if(isset($_GET["searchTeams"])) {

    $query = $pdo->prepare("SELECT * FROM teams WHERE name = :nam");
    $query->bindParam(":nam", $_GET["zoek"]);
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $team){
        $id = $team["ID"];
        echo $team["name"];
        echo "<br><a href='edit_team.php?id=$id'>edit</a><br><br>";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gitshit admin</title>
</head>
<body>
    <h2>Zoek players:</h2>
    <form method="GET">
        <input type="search" name="zoek" id="zoek"></input>
        <input type="submit" name="searchPlayer" id="searchPlayer" value="Search"></input>
    </form>
    <h2>Zoek Teams:</h2>
    <form method="GET">
        <input type="search" name="zoek" id="zoek"></input>
        <input type="submit" name="searchTeams" id="searchTeams" value="Search"></input>
    </form>
    <!-- <a href="puntbewerk.php">score bewerking</a><br> -->
    <a href="profiel.php">profielpagina</a><br>
    <a href="logout.php">Uitloggen</a>
</body>
</html>