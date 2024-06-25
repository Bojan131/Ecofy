<?php
session_start();
if (isset($_SESSION['user'])) {
  header('location:home.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>EKOF-PLAY</title>
    <link rel="stylesheet" href="stil.css" type="text/css">
    <link rel="icon" href="icon2.png">
    <!--  <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;800&display=swap" rel="stylesheet">
  </head>
  <body>

    <?php
    if(isset($_SESSION['noUser'])){
      echo '<script>alert(\''.$_SESSION['noUser'].'\')</script>';
      unset($_SESSION['noUser']);
    }

     ?>


    <nav id="main-nav">
      <a id="logo" href="index.php"><h1>Ekof-<span class="play">Play</span></h1></a>
      <ul>
        <li><a class="current" href="index.php">Home</a></li>
        <li><a href="">Information</a></li>
        <li><a href="#login">Login</a></li>
        <li><a href="#regist">Register</a></li>
      </ul>
    </nav>


    <div id="showcase">
      <div id="showcase_text">
          <h1>Ekof-Play</h1>
          <p>Vasa omiljena muzicka platforma, od sada besplatna za sve studente</p>
      </div>
    </div>

    <?php
      // Ako session NIJE startovan, startuj ga
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
      if (isset($_SESSION['invalid_message'])) {
        // "\" sluzi da ispise navodnik u stringu
        // ako je aktiviran session invalidmsg, ispisi njegovu poruku u allertu i redirektuj gde je navedeno, zatim ugasi taj session
        echo '<script>alert(\''.$_SESSION['invalid_message'].'\')</script>';
        unset($_SESSION['invalid_message']);
      }
    ?>

    <div id="form-wrapper">
      <form  id="login-form" action="login.php" method="post">

        <div class="form-group">
          <label id="login">Email</label>
          <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="form-group">
          <center><button type="submit" name="submit">Submit</button></center>
        </div>

      </form>



      <form id="register-form" action="register.php" method="post">

        <div class="form-group">
          <labeli id="regist">First name</label>
          <input type="text" name="first_name" placeholder="First name">
        </div>

        <div class="form-group">
          <label>Last name</label>
          <input type="text" name="last_name" placeholder="Last name" required>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="form-group">
          <label>Repeat password</label>
          <input type="password" name="r_password" placeholder="Repeat password" required>
        </div>

        <div class="form-group">
          <center><button type="submit" name="submit">Submit</button></center>
        </div>

      </form>
    </div>

    <footer>
      &copy; EKOF-PLAY 2020
    </footer>

  </body>
</html>
