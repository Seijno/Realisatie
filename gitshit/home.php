<?php session_start(); 
if(empty($_SESSION)){
    header("location: login.php");
}?>
<h1>Je bent thuis...</h1>
<a href="profiel.php">profielpagina</a>