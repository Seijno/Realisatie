<?php
include "function.php";
include "pdo.php";
if(empty($_SESSION) || $_SESSION["admin"] == 0){
    header("location: login.php");
}

if(isset($_POST["submit"])){

    $goals = $_POST["goals"];
    $members = $_POST["members"];
    $id = $_GET["id"];

    $userArray = array(":total_scores" => $goals, ":members" => $members, "ID" => $id);

    $sql = "UPDATE `teams` SET total_score = :total_scores, members = :members WHERE ID = :ID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($userArray); 
    header("location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>punten bewerking</title>
</head>
<body>
    <form method="POST" action="">
    <label>Totaal aantal goals<label><br>
    <input type="number" id="goal" name="goals"></input><br>
    <label>Aantal leden</label><br>
    <input type="number" name="members" id="members"></input><br>
    <input type="submit" name="submit" id="submit" action="submit"></input>
 </form>
</body>
</html>