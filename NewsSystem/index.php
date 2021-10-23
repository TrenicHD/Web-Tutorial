<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>News</h2>
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
    if (isset($_POST["submit"])) {
      // code...
      $T = $_POST["NewsT"];
      $B = $_POST["NewsB"];

      $sql = "INSERT INTO News (NewsT, NewsB)
      VALUES ('$T', '$B')";
      if ($conn->query($sql) === TRUE) {
          echo "Deine Naricht wurde gesendet!";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Trennung....
    require("mysql.php");
    $stmt = $mysql->prepare("SELECT * FROM News");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
      // code...
      ?>
      <div class="card">
        <div class="container">
          <h4><b><?php echo $row["NewsT"] ?></b></h4>
          <p><?php echo $row["NewsB"] ?></p>
        </div>
      </div>
      <?php
    }


     ?>



     <form action="index.php" method="post">
       <input type="text" name="NewsT" placeholder="Überschrift" required="">
       <input type="text" name="NewsB" placeholder="Beschreibung" required="">
       <button type="submit" name="submit">Absenden</button>
     </form>







  </body>


  <style>
    .card {
  box-shadow: 0 4px 8px 0 rgba(138,43,226, 2);
  transition: 0.3s;
  width: 40%;
  border-radius: 5px;
  left: 50%
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(138,43,226, 2);
}

img {
  border-radius: 5px 5px 0 0;
}

.container {
  padding: 2px 16px;
}
  </style>
</html>
