<?php
include 'db.php';
session_start();

if(
  empty($_POST['artist']) ||
  empty($_POST['song'])
){
  echo 'invalid input';
  exit;
 }

 $artist = mysqli_real_escape_string($db, $_POST['artist']);
 $song = mysqli_real_escape_string($db, $_POST['song']);

 $query = "SELECT * FROM songs WHERE artist='$artist' AND song='$song'";
 $result = mysqli_query($db, $query);
 if(mysqli_num_rows($result) > 0){
   $_SESSION['invalid_message'] = 'Podaci vec postoje u bazi !';
   header('location:input_songs.php');
   exit;
 }

 $query = "INSERT INTO songs(artist, song) VALUES ('$artist', '$song')";
 $result = mysqli_query($db, $query);

 if($result){
   $_SESSION['entered'] = 'Uspesno je uneto u bazu';
 }

$query = "SELECT * FROM songs";
$result = mysqli_query($db, $query);
$fetch = mysqli_fetch_array($result);

if($fetch){
  $_SESSION['songs'] = [
    'id' => $fetch['id'],
    'artist' => $fetch['artist'],
    'song' => $fetch['song']
  ];
  header('location: input_songs.php');
  exit;
}


/*
while($fetch = mysqli_fetch_array($result)){
   $_SESSION['songs'] = [
    'id' => $fetch['id'],
    'artist' => $fetch['artist'],
    'song' => $fetch['song']
  ]
}

*/


 ?>
