<?php

  include_once "funcao.php";

  if (!checkAdmin())  {
    $erro = "Sem permissão para acessar a página, informe o login";
    include_once "login.php";
    exit(0);
  }
  $questoes = obterQuestoes();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1>Cadastro de Perguntas</h1>
      <a class="btn btn-primary" href="formulario.php">Nova Pergunta</a>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Categoria</th>
            <th scope="col">Pergunta</th>
            <th scope="col">Primeira Opção</th>
            <th scope="col">Segunda Opção</th>
            <th scope="col">Terceira Opção</th>
            <th scope="col">Opção Certa</th>
            <th scope="col">Operação</th>
          </tr>
        </thead>
        <tbody>
          <?php
              foreach ($questoes as $questao) {
                echo "<tr>";
                echo "<td scope='col'>".$questao['id']."</td>";
                echo "<td scope='col'>".$questao['descricao_categoria']."</td>";
                echo "<td scope='col'>".$questao['pergunta']."</td>";
                echo "<td scope='col'>".$questao['opcao_a']."</td>";
                echo "<td scope='col'>".$questao['opcao_b']."</td>";
                echo "<td scope='col'>".$questao['opcao_c']."</td>";
                echo "<td scope='col'>".$questao['resposta']."</td>";
                echo "<td scope='col'><a href='deletar.php?id=".$questao['id']."'>Excluir</a> <a href='editar.php?id=".$questao['id']."'>Editar</a></td>";
                echo "</tr>";
              }
           ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
