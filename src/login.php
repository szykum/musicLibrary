<?php
$db = new Mysqli('localhost', 'root', '', 'musiclibrary');
if(isset($_SESSION['login']))
{
     $selectID = "SELECT id FROM `user` WHERE login='admin'";
     $getID = $db->query($selectID);
     $getID = $getID->fetch_assoc();
     $getID = $getID["id"];
     //echo $getID;
     $selectAlbums = "SELECT * FROM album WHERE ownerID = $getID";
     $getAlbums = $db->query($selectAlbums);
     //$getAlbums = $getAlbums->fetch_assoc();
     echo "
       <table class='table table-bordered'>
         <thead>
           <tr>
             <th>Artist</th>
             <th>Album</th>
             <th>Release Year</th>
             <th>Annotation</th>
           </tr>
         </thead>
         <tbody>";
        while($row = $getAlbums->fetch_row()){
          echo "<tr>";
          for($i = 1; $i<5;$i++)
            echo "<td>". $row[$i] . "</td>";
          echo "</tr>";
        }
        echo " </tbody>
              </table>";

        echo "<form action='index.php' method='post'>
          <input type='hidden' name='logout'>
          <input class='btn btn-default' type='submit' value='LOGOUT'>
        </form>";
}
else if(isset($_REQUEST['login']) && isset($_REQUEST['password'])){
  $login = $_REQUEST['login'];
  $haslo = md5($_REQUEST['password']);
  $q = "SELECT * FROM user WHERE login = '$login' AND password = '$haslo'";
  $result = $db->query($q);
  if($result->num_rows === 1){
    $_SESSION['login'] = $login;
    echo "<script>alert('Successfully logged in');</script>";
      echo "<meta http-equiv='refresh' content='0'>";
  }
  else echo "<script>alert('Incorrect login or password');</script>";
}
else {
  echo "<h2>Log In</h2>
  <form  method='post'>
    <input class='form-control' type='text' name='login' placeholder='user'>
    <input class='form-control' type='password' name='password' placeholder='password'>
    <input type='submit' class='btn btn-default' name='' value='Login'>
  </form>";
}

 ?>
