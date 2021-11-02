<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Random</title>
  </head>
  <body>

<?php

if (isset($_POST["submit"])) {
  // code...

  $r = generateRandomString(10);
  echo $r;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


 ?>


    <form action="index.php" method="post">
      <button name="submit" type="submit">Geneieren</button>
    </form>

  </body>
</html>
