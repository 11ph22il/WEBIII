<?php
  include "funcao.php";
  session_start();
  $email = $_SESSION["email"];
  $jogador = obterJogadorByEmail($email);
  resetarResposta($jogador["id"]);
  header("location: index.php");
 ?>
