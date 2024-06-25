<?php
include 'db.php';
session_start();


$start = date('Y-m-d');
$expiry = date('Y-m-d', strtotime('+30 days'));
$user = $_SESSION['user']['id'];

$query = "SELECT id FROM subscriptions
          WHERE user_id = '$user'";
$result =  mysqli_query($db, $query);


if(mysqli_num_rows($result) > 0){
  $query = "UPDATE subscriptions
            SET  expiry_date = DATE_ADD(expiry_date, INTERVAL 30 DAY)
            WHERE user_id = '$user'";
  $result = mysqli_query($db, $query);
  header('location:home.php');
  exit;
}
else{
  $query = "INSERT INTO subscriptions(start_date, expiry_date, user_id) VALUES('$start', '$expiry', '$user')";
  $result = mysqli_query($db, $query);
  header('location:home.php');
  exit;
}

/*   brake ovo ne gledaj  bio sam ocajan
if(mysqli_num_rows($result) == 0){
  $query = "INSERT INTO subscriptions(start_date, expiry_date, user_id) VALUES('$start', '$expiry', '$user')";
  $result = mysqli_query($db, $query);
  header('location:home.php');
  exit;
}
else{
  $query = "UPDATE subscriptions
            SET  expiry_date = DATE_ADD(expiry_date, INTERVAL 30 DAY)";
  $result = mysqli_query($db, $query);
  header('location:home.php');
  exit;
}
*/





 ?>
