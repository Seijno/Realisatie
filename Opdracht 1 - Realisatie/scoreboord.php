<?php 
include "function.php";
include "pdo.php";

if(isset($_GET["searchPlayer"])) {

    $query = $pdo->prepare("SELECT * FROM user WHERE username = :usr");
    $query->bindParam(":usr", $_GET["zoek"]);
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $player){
        $id = $player["ID"];
        echo $player["username"];
        echo "<br><a href='view_player.php?id=$id'>view</a><br><br>";
    }
    
}
if(isset($_GET["searchTeam"])) {

    $query = $pdo->prepare("SELECT * FROM teams WHERE name = :usr");
    $query->bindParam(":usr", $_GET["zoek"]);
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $team){
        $id = $team["ID"];
        echo $team["name"];
        echo "<br><a href='view_team.php?id=$id'>view</a><br><br>";
    }
    
}
?>
 <h2>Zoek spelers:</h2>
    <form method="GET">
        <input type="search" name="zoek" id="zoek"></input>
        <input type="submit" name="searchPlayer" id="searchPlayer" value="Search"></input>
    </form>
 <h2>Teams gegevens zoeken</h2>
    <form method="GET">
        <input type="search" name="zoek" id="zoek"></input>
        <input type="submit" name="searchTeam" id="searchTeam" value="Search"></input>
    </form>