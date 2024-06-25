<?php
session_start();
include 'db.php';


$userID = $_SESSION['user']['id'];
$values = [];

$playID = $_POST['chb']; // ID iz plejliste
$values = implode("','", $playID);

$query = "DELETE FROM playlist WHERE id IN ('".$values."')";
$result = mysqli_query($db, $query);

header('location: user_playlist.php');











 ?>
