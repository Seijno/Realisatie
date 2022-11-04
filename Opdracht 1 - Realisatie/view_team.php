<?php
include "function.php";
include "pdo.php";
if(empty($_SESSION) || $_SESSION["admin"] == 1){
    header("location: login.php");
}
$id = $_GET["id"];
$query = $pdo->prepare("SELECT * FROM teams WHERE ID = $id");
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>team weergaven</title>
</head>
<body>
    <table>
        <tr>
            <th>Naam</th>
            <th>Leden</th>
            <th>Totale goals</th>
        </tr>
        <tr>
            <td><?php echo $result["name"]; ?></td>
            <td><?php echo $result["members"] ?></td>
            <td><?php echo $result["total_score"]; ?></td>
        </tr>
    </table>
</body>
</html>