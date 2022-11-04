<?php
include "function.php";
include "pdo.php";
if(empty($_SESSION) || $_SESSION["admin"] == 0){
    header("location: login.php");
}

if(isset($_POST["submit"])){

    $totalScore = $_POST["score"]; 

    $userArray = array(":scr" => $totalScore, ":name" => $_POST['teams']);

    $sql = "UPDATE `teams` SET total_score = :scr WHERE name = :name";
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
    <select id="teams" name="teams">
        <?php getAllTeams();?>
      </select>
    <label>new score</label>
    <input type="number" name="score" id="score"></input><br>
    <input type="submit" name="submit" id="submit" action="submit"></input>
 </form>
</body>
</html>