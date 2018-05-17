<?php

if(isset($_REQUEST['login']) && isset($_REQUEST['password']))
{
  $login = $_REQUEST['login'];
  $haslo = md5($_REQUEST['password']);
  $db = new Mysqli('localhost', 'root', '', 'musiclibrary');
  $q = "SELECT * FROM user WHERE login = '$login' AND password = '$haslo'";
  $result = $db->query($q);
  if($result->num_rows === 1){
     echo "<script>alert('Successfully logged in');</script>";
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
  }
  else echo "<script>alert('Incorrect login or password');</script>";

}
 ?>
