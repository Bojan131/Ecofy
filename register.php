<?php
include 'db.php';
session_start();

// Ne moze isset(), mora empty()
if (
  empty($_POST['first_name']) ||
  empty($_POST['last_name']) ||
  empty($_POST['email']) ||
  empty($_POST['password'])
) {
  echo 'Invalid input.';
  exit;
}

$firstName = mysqli_real_escape_string($db, $_POST['first_name']);
$lastName = mysqli_real_escape_string($db, $_POST['last_name']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$rPassword = mysqli_real_escape_string($db, $_POST['r_password']);

if ($password != $rPassword) {
  $_SESSION['invalid_message'] = 'Lozinka se ne podudara.';
  header('location:index.php');
  exit;
}

$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {
  $_SESSION['invalid_message'] = 'Korisnik vec postoji u bazi.';
  header('location:index.php');
  exit;
}

$query = "INSERT INTO users (first_name, last_name, email, password) VALUES('$firstName', '$lastName', '$email', '$password')";
$result = mysqli_query($db, $query);

// moram da ubacim i ID u session

$id="SELECT * FROM users where email = '$email'";
$id_result = mysqli_query($db, $id);
$row = mysqli_fetch_array($id_result);

if ($result) {
  $_SESSION['user'] = [
    'first_name' => $firstName,
    'last_name' => $lastName,
    'email' => $email,
    'id' => $row['id']
  ];
  header('location:home.php');
  exit;
}
