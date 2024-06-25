<?php
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
    <title>EKOF-PLAY | HOME</title>
    <link rel="icon" href="icon2.png">
    <link rel="stylesheet" href="stil.css">
    <link rel="stylesheet" href="stil1.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;800&display=swap" rel="stylesheet">
  </head>
  <body>

   <?php
   if(isset($_SESSION['invalid_licenc'])){
   echo '<script>alert(\''.$_SESSION['invalid_licenc'].'\')</script>';
   unset($_SESSION['invalid_licenc']);

   }


    ?>


    <nav id="main-nav">
      <a id="logo" href="index.php"><h1>Ekof-<span class="play">Play</span></h1></a>
      <ul>
        <li><a class="current" href="home.php">Home</a></li>
        <li><a href="user_playlist.php">MyPlaylist</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>

    <div id="welcome">
      <?php
      if(isset($_SESSION['user'])){
      echo "Dobrodosli ". "  " .$_SESSION['user']['first_name'];
      }
      ?>
    </div>


<div id="licenc">
    <div id="date">
      <div id="name">
        <?php
        if(isset($_SESSION['user'])){
        echo $_SESSION['user']['first_name'] ." Vasa licenca traje do:  ";
        }
        ?>
      </div>

      <div id="expiry">
        <span>&nbsp&nbsp</span>
        <?php

        include 'db.php';
        if(isset($_SESSION['user'])){
          $name = $_SESSION['user']['id'];

          $query = "SELECT expiry_date FROM subscriptions
          WHERE user_id = '$name'";
          $result = mysqli_query($db, $query);
          $fetch = mysqli_fetch_row($result); // mysqli_fetch_array vraca 2 vrednosti( [0] [1] ) iz niza i stvara duplikat
          if($fetch) {
            echo date("d/m/Y", strtotime($fetch[0])); // fetch[0] jer je jedina vrednost koju dobijamo, a samo nam treba ona
          }
          else{
            echo '"Nema vazecu licencu"';
          }
        }
         ?>
     </div>
    </div>


    <div id="acquire">
      <div id="text_acquire">
        Vasu licencu mozete kupiti po promo ceni od 1.000 RSD
      </div>

      <form id="acquire_button" method="post" action="licenc.php">
        <button id="acquireButton" type="submit" name="acquire" placeholder="KUPI">Kupi</button>
      </form>
    </div>
</div>

<!--
<form id="search" action="" method="">
 <button placeholder="Pronadji">Pronadjite zeljenu pesmu</button>
</form>
-->



<form action="addToPlaylist.php" method="post">
  <table>
    <thead>
      <th>Izvodjac</th>
      <th>Pesma</th>
      <th>Select</th>
    </thead>

    <tbody>
      <?php
        $query = "SELECT * FROM songs";
        $result = mysqli_query($db, $query);

        while ($fetch /*row*/ = mysqli_fetch_array($result)){
          $autor = $fetch['artist'];
          $song = $fetch['song'];

        /*  $_SESSION['cb_value'] = [
            'id' => $fetch['id'];
          ]
       */
          echo "
           <tr>
             <td>$autor</td>
             <td>$song</td>
             <td><center><input type='checkbox' name='chb[]' value=".$fetch['id']."></center></td>
           </tr>
          ";
        }
       ?>
    </tbody>
  </table>
    <div id="button_pl">
      <button id="plbutton" type="submit">Dodaj u tvoju listu</button>
    </div>
  </form>




    <footer>
      &copy; EKOF-PLAY 2020
    </footer>

  </body>
</html>
