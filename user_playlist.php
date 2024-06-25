<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
  header('location:index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>EKOF-PLAY | MyPlayList</title>
    <link rel="icon" href="icon2.png">
    <link rel="stylesheet" href="stil.css">
    <link rel="stylesheet" href="stil1.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;800&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php

    $name = $_SESSION['user']['id'];
    $query = "SELECT * FROM subscriptions WHERE user_id = $name";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) <1){
      $_SESSION['invalid_licenc'] = 'Nemate kupljenu licencu !';
      header('location:home.php');
      exit;
    }


     ?>

    <nav id="main-nav">
      <a id="logo" href="index.php"><h1>Ekof-<span class="play">Play</span></h1></a>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a class="current" href="user_playlist.php">MyPlaylist</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>

    <div id="section1">
      <h2>Vase omiljene pesme</h2>
    </div>


<form id="formpl" action="removeFromPlaylist.php" method="post">
    <table>
      <thead>
        <th>Pesma</th>
        <th>Select</th>
      </thead>

      <tbody>
        <?php

          $name = $_SESSION['user']['id'];

          $query = "SELECT s.song, pl.id FROM ((songs as s
            INNER JOIN playlist as pl ON s.id = pl.song_id)
            INNER JOIN users as u ON pl.user_id = u.id)
            WHERE u.id = $name";
          $result = mysqli_query($db, $query);

          while($fetch = mysqli_fetch_array($result)){
            $song = $fetch['song'];

            echo "
             <tr>
               <td>$song</td>
               <td><center><input type='checkbox' name='chb[]' value=".$fetch['id']."></center></td>
             </tr>
            ";
          }
         ?>
      </tbody>
    </table>
    <div id="ukloni">
      <p>Ukloni iz plej liste</p>
      <button type="submit">Ukloni</button>
    </div>
</form>



<!--
    <footer>
      &copy; EKOF-PLAY 2020
    </footer>
-->

  </body>
</html>
