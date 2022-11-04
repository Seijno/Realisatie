<?php
include "function.php";
include "pdo.php";
if(empty($_SESSION) || $_SESSION["admin"] == 0){
    header("location: login.php");
}

if(isset($_POST["submit"])){

    $goals = $_POST["goal"];
    $assist = $_POST["assist"];
    $id = $_GET["id"];

    $userArray = array(":goal" => $goals, ":assist" => $assist, "ID" => $id);

    $sql = "UPDATE `user` SET goals = :goal, assist = :assist WHERE ID = :ID";
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
    <label>aantal goals<label><br>
    <input type="number" id="goal" name="goal"></input><br>
    <label>aantal assist</label><br>
    <input type="number" name="assist" id="assist"></input><br>
    <input type="submit" name="submit" id="submit" action="submit"></input>
 </form>
</body>
</html>