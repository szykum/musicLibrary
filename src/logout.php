<?php

if(isset($_REQUEST["logout"])){
  session_destroy();
  echo "<meta http-equiv='refresh' content='0'>";
}
?>
