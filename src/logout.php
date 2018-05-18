<?php

if(isset($_REQUEST["logout"])){
  unset($_SESSION);
  session_destroy();
  echo "<meta http-equiv='refresh' content='0'>";

}
?>
