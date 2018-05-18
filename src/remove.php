<?php
    if(isset($_REQUEST['remove'])) {
      $id = $_REQUEST['remove'];
      $q = "DELETE FROM album WHERE id = $id";
      $db = new Mysqli('localhost', 'root', '', 'musiclibrary');
      $db->query($q);
      echo "<script>alert('Successfully removed');</script>";
    }
  ?>
