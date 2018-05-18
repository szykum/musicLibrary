<?php
if(isset($_REQUEST['newUser']) && isset($_REQUEST['newPassword']) && isset($_REQUEST['adminPassword'])){
  $db = new Mysqli('localhost', 'root', '', 'musiclibrary');
  $newUser = $_REQUEST['newUser'];
  $pswdUser = md5($_REQUEST['newPassword']);
  $pswdAdmin = md5($_REQUEST['adminPassword']);

  $checkExist = "SELECT COUNT(1) FROM `user` WHERE login='$newUser'";
  $exist = $db->query($checkExist);
  $exist = $exist->fetch_row();

  if($exist[0]==0){
    $selectPSWD = "SELECT * FROM `user` WHERE login='admin' AND password = '$pswdAdmin'";
    $result = $db->query($selectPSWD);
    if($result->num_rows === 1){
      $insertUser ="INSERT INTO `user` (`id`, `login`, `password`) VALUES (NULL, '$newUser', '$pswdUser') ";
      $result = $db->query($insertUser);
      echo "<script>alert('Successfully created account for $newUser');</script>";
    }
    else
      echo "<script>alert('Failure admin authorization');</script>";
  }
  else {
    echo "<script>alert('Login $newUser already exist');</script>";
  }


}


?>
