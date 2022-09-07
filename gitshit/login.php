<?php
include "pdo.php";
if(isset($_POST['submit'])) {
$query = $pdo->prepare("SELECT * FROM user WHERE email = :email");

$query->bindParam(":email", $_POST["email"]);

$query->execute();

$result = $query->fetch(PDO::FETCH_ASSOC);



if ($result) {
    $hash = $result["password"];
    if (password_verify($_POST["password"], $hash)) {
        session_start();
        $_SESSION["ID"] = session_id();
        $_SESSION["username"] = $result["username"];
        $_SESSION["email"] = $result["email"];
        $_SESSION["STATUS"] = "ACTIEF";
        echo "<script>alert('Succesfully signed in'); location.href='home.php';</script>";
    } else {

        echo "<script>alert('Email or password is invalid');</script>";

    }

} else {

    echo "<script>alert('Email or password is invalid');</script>";

}}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="./img/favicon-16x16.png"/>
    <link rel="stylesheet" href="./css/aanmeld.css">
    <title>Gitshit</title>
  </head>


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body class="text-center" cz-shortcut-listen="true">
    
<main class="form-signin">
  <form method="POST" action="">
    <img class="mb-4 img-fluid" src="./img/favicon.png" alt="">
    <h1 class="h3 mb-3 fw-normal">Please log in</h1>

    <div class="form-floating">
      <input type="email" name="email" action="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" action="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit" action="submit">Sign in</button>
    <p class="mt-5 mb-3">nog geen account? meld <a href="register.php">hier</a> aan</p>
    <p class="mt-5 mb-3 text-muted">© 2020–2021</p>
  </form>
</main>