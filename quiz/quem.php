<?php
  session_start();
  //$email = $_COOKIE["email"];
  $email = $_SESSION["email"];
  echo "usuario logado: ".$email;

 ?>
