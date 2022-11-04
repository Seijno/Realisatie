<?php 
session_start();

function getUsername() {
    include "pdo.php";
    $query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $query->bindParam(":email", $_SESSION["email"]);
    $query->execute();
    $result = $query->fetch();
    if (empty($_SESSION)) {
        echo "gebruiker";
    }else{

        echo $result['username'];
        }
    }

function getAllTeams() {
    include "pdo.php";
    $query = $pdo->prepare("SELECT * FROM teams");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    if(empty($result)){
        echo "nog geen teams";
    }
    foreach($result as $teamSelect){
        $name = $teamSelect["name"];
        $id = $teamSelect["id"];
        echo "<option value='$name'>$name</option>";
    }
}

function addMember($team){
    include "pdo.php";
    echo $team;
    $query = $pdo->prepare("SELECT * FROM teams WHERE id = :name");
    $query->bindParam(":name", $team);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    // var_dump($result);
    $members = $result["members"];
    $members = $members + 1;
    $query = $pdo->prepare("INSERT INTO teams VALUES (members = '$members') WHERE id = :name");
    $query->bindParam(":name", $team);
    $query->bindParam(":members", $members);
    $query->execute();
}