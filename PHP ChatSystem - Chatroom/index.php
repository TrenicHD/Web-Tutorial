<!DOCTYPE html>
<html>

<?php
$servername = "localhost";
$username = "test";
$password = "****";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat System!</title>
</head>

<body>

<?php

if(isset($_POST["submit"])){

    $user = $_POST["name"];
    $text = $_POST["message"];
    $sql = "INSERT INTO Chat (User, Tex)
    VALUES ('$user', '$text')";
    if ($conn->query($sql) === TRUE) {
        echo "Deine Naricht wurde gesendet!";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    require("mysql.php");
    $stmt = $mysql->prepare("SELECT * FROM Chat");
    $stmt->execute();
    while($row = $stmt->fetch()){

        ?>
        <h1><?php echo $row["User"] ?></h1>
        <h1><?php echo $row["Tex"] ?></h1>
        <?php
    }


?>




<form action="index.php" method="POST">
    <input type="text" placeholder="Naricht" name="message" require="">
    <input type="text" placeholder="Username" name="name" require="">
    <button type="submit" name="submit">Absenden</button>
</form>
</body>


</html>