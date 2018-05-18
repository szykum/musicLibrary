<?php
if(isset($_REQUEST['artist']) && isset($_REQUEST['album']) && isset($_REQUEST['release-year']) && isset($_REQUEST['description']) && isset($_SESSION['login']))
{

  $artist = $_REQUEST['artist'];
  $album = $_REQUEST['album'];
  $releaseY =   $_REQUEST['release-year'];
  $description= $_REQUEST['description'];
  $login = $_SESSION['login'];
  $db = new Mysqli('localhost', 'root', '', 'musiclibrary');

  $checkExist = "SELECT COUNT(1) FROM `album` WHERE artist='$artist' AND name='$album'";
  $exist = $db->query($checkExist);
  $exist = $exist->fetch_row();
  if($exist[0]==0){
    $selectID = "SELECT id FROM `user` WHERE login='$login'";
    $getID = $db->query($selectID);
    $getID = $getID->fetch_assoc();
    $login = $getID["id"];
    $q = "INSERT INTO `album` (`id`, `artist`, `name`, `release-year`, `description`, `ownerID`) VALUES (NULL, '$artist', '$album', '$releaseY', '$description', '$login') ";
    $result = $db->query($q);
    if($result) echo "<script>alert('Successfully added');</script>";
    else  echo "<script>alert('Something went wrong');</script>";
  }
  else  echo "<script>alert('Already exist in library');</script>";

}
 ?>
