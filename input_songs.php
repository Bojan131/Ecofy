<?php
session_start();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="input_stil.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;800&display=swap" rel="stylesheet">

    <title>INPUT | ADMIN</title>
  </head>
  <body>

    <?php
    if(isset($_SESSION['entered'])){
     echo '<script>alert(\''.$_SESSION['entered'].'\')</script>';
     unset($_SESSION['entered']);
   }


    if(isset($_SESSION['invalid_message'])){
      echo '<script>alert(\''.$_SESSION['invalid_message'].'\')</script>';
      unset($_SESSION['invalid_message']);
    }
     ?>

    <br><br><br><br><br><br><br><br>
    <form  action="input.php" method="post">
      <label id="inputArtist">Artist</label>
      <input type="text" name="artist" placeholder="Unesi autora">

      <label id="inputSongs">Song</label>
      <input type="text"  name="song" placeholder="Unesi pesmu">

      <button type="submit" name="submit">DODAJ</button>
    </form>

  </body>
</html>
