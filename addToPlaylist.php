<?php
session_start();
include 'db.php';

$name = $_SESSION['user']['id'];
$query = "SELECT * FROM subscriptions WHERE user_id = $name";
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) <1){
  $_SESSION['invalid_licenc'] = 'Nemate kupljenu licencu !';
  header('location:home.php');
  exit;
}


$userId = $_SESSION['user']['id'];
$values = [];

// $_POST['chb']=['12','18','23'.....];

foreach ($_POST['chb'] as $id){
  $values[] = "($userId, $id)";
// $values[] = "($userId, $id)";   ['(1,12)', '(1,18)', '(1,23)'.....];
}

$values = implode(',', $values);  // '(1,12),(1,18),(1,23)...';

$query = "INSERT INTO playlist(user_id, song_id) VALUES $values";
$result = mysqli_query($db, $query);
header('location: user_playlist.php');
 ?>
