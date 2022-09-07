<?php 
session_start();
function getUsers() {
    include "pdo.php";
    $query = $pdo->prepare("SELECT * FROM user");
    $query->execute();
    $amount = $query->rowCount();
    echo $amount;
}

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
    function getDogname() {
        include "pdo.php";
        $query = $pdo->prepare("SELECT * FROM dogs WHERE ID = :id");
        $query->bindParam(":id", $_POST["id"]);
        $query->execute();
        $result = $query->fetch();
        if (empty($_SESSION)) {
            echo "gebruiker";
        }else{
    
            echo $result['name'];
            }
        }
        function getBreed() {
            include "pdo.php";
            $query = $pdo->prepare("SELECT * FROM dogs WHERE ID = :id");
            $query->bindParam(":id", $_POST["id"]);
            $query->execute();
            $result = $query->fetch();
            if (empty($_SESSION)) {
                echo "gebruiker";
            }else{
        
                echo $result['breed'];
                }
            }

    function getAge() {
        include "pdo.php";
        $query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
        $query->bindParam(":email", $_SESSION["email"]);
        $query->execute();
        $result = $query->fetch();
        if (empty($_SESSION)) {
            echo "gebruiker";
        }else{
    
            echo $result['age'];
            }
        }
    
        function getDogAge() {
            include "pdo.php";
            $query = $pdo->prepare("SELECT * FROM dogs WHERE ID = :id");
            $query->bindParam(":id", $_POST["id"]);
            $query->execute();
            $result = $query->fetch();
            if (empty($_SESSION)) {
                echo "gebruiker";
            }else{
        
                echo $result['age'];
                }
            }

function profilepic() {
    include "pdo.php";
    $query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $query->bindParam(":email", $_SESSION["email"]);
    $query->execute();

    $result = $query->fetch();
    $image = base64_encode($result["image"]);
    echo "<img width='200' height='250' src='data:image;base64," . $image. "'>";
}

function profileDogPic() {
    include "pdo.php";
    $query = $pdo->prepare("SELECT * FROM dogs WHERE ID = :id");
    $query->bindParam(":id", $_POST["id"]);
    $query->execute();

    $result = $query->fetch();
    $image = base64_encode($result["image"]);
    echo "<img width='400' height='250' src='data:image;base64," . $image. "'>";
}

function slider() {
    include "pdo.php";
    $query = $pdo->prepare("SELECT * FROM dogs WHERE owner = :owner");

    $query->bindParam(":owner", $_SESSION["email"]);
    $query->execute();



$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $dog){
    $image = base64_encode($dog["image"]);
    echo <<<HEREDOC
    <div class="carousel-item">
<img width=100 height=300 src="data:image;base64,$image" class="d-block w-100" alt="...">
<div class="carousel-caption">
<h4>{$dog["name"]}</h4>
<form action="editdog.php" method="POST">
<button type="sumbit" class="btn btn-lg btn-warning" name="id" value="{$dog["ID"]}">edit</button></from></div>
</div>
HEREDOC;
}}
