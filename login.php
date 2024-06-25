<?php
include 'db.php';
session_start();

// Ne moze isset(), mora empty()
if (empty($_POST['email']) || empty($_POST['password'])) {
  echo 'Invalid input.';
  exit;
}

$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);

$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) <1 ){
  $_SESSION['noUser'] = 'Nepoznat korisnik';
  header('location: index.php');
}


$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($db, $query);

// $row = mysqli_fetch_array($result);
//
// $_SESSION['user'] = [
//   'first_name' => $row['first_name'],
//   'last_name' => $row['last_name'],
//   'email' => $row['email']
// ];
//
// header('location:home.php');
// exit;

while($row = mysqli_fetch_array($result)) {
  $_SESSION['user'] = [
    'first_name' => $row['first_name'],
    'last_name' => $row['last_name'],
    'email' => $row['email'],
    'id' => $row['id']
  ];

  header('location:home.php');
  exit;
}
