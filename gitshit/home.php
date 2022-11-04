<?php session_start(); 
if(empty($_SESSION)){
    header("location: login.php");
}?>
<h1>Je bent thuis...</h1>
<a href="profiel.php">profielpagina</a><br>
<a href="scoreboord.php">Scoreboord</a><br>
<a href="logout.php">Uitloggen</a>