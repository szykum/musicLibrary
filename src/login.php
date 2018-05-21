<?php
include 'remove.php';
$db = new Mysqli('localhost', 'root', '', 'musiclibrary');
if(isset($_SESSION['login']))
{
  $login = $_SESSION['login'];
  echo "<form action='index.php' method='post' class='logoutForm'>
          <input type='hidden' name='logout'>
          <input class='btn btn-default' type='submit' value='LOGOUT'>
        </form>";
  $selectID = "SELECT id FROM `user` WHERE login='$login'";
  $getID = $db->query($selectID);
  $getID = $getID->fetch_assoc();
  $getID = $getID["id"];
  $selectAlbums = "SELECT * FROM album WHERE ownerID = $getID ORDER BY artist, `release-year`";
  $getAlbums = $db->query($selectAlbums);
  echo "
      <table class='table table-bordered'>
        <thead>
          <tr>
            <th>Cover</th>
            <th>Artist</th>
            <th>Album</th>
            <th>Release Year</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>";
  while($row = $getAlbums->fetch_row()){
    echo "<tr>";
    echo "<td> <img src='". $row[4] . "'height=100 width=100 alt='Album Cover'> </td>";
    for($i = 1; $i<4;$i++)
      echo "<td>". $row[$i] . "</td>";
    $id = $row[0];
    echo "<td>
            <form action='index.php' method='post'>
              <input type='hidden' name='remove' value='$id'>
              <input class='btn btn-default' type='submit' value='Remove'>
            </form>
          </td>";
    echo "</tr>";
        }
  echo " </tbody>
      </table>";
}
else if(isset($_REQUEST['login']) && isset($_REQUEST['password'])){
  $login = $_REQUEST['login'];
  $pswd = md5($_REQUEST['password']);
  $q = "SELECT * FROM user WHERE login = '$login' AND password = '$pswd'";
  $result = $db->query($q);
  if($result->num_rows === 1){
    $_SESSION['login'] = $login;
    echo "<script>alert('Successfully logged in');</script>";
    echo "<meta http-equiv='refresh' content='0'>";
  }
  else{
    echo "<script>alert('Incorrect login or password');</script>";
    echo "<meta http-equiv='refresh' content='0'>";
  }
}
else {
  echo "<h2>Log In</h2>
  <form  method='post' class='loginForm'>
    <input class='form-control' type='text' name='login' placeholder='user'>
    <input class='form-control' type='password' name='password' placeholder='password'>
    <input type='submit' class='btn btn-default' name='' value='Login'>
  </form>";
}
?>
