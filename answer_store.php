<?php
  session_start();
  $_SESSION['option'][$_POST['id']]= $_POST['option'];
?>
