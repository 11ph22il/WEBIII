<?php
  include_once "funcao.php";
  $produtos = obterProdutos();
  echo json_encode($produtos);
 ?>
