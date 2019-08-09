<?php
  include_once "funcao.php";
  $questao = obterQuestao();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="questao.css">
  </head>
  <body>
      <form action="salvaResposta.php" method="post">
          <h1><?php echo $questao['pergunta']; ?></h1>
          <input type="radio" name="resposta" value="a"><?php echo $questao['opcao_a']; ?><br>
          <input type="radio" name="resposta" value="b"><?php echo $questao['opcao_b']; ?><br>
          <input type="radio" name="resposta" value="c"><?php echo $questao['opcao_c']; ?><br>
          <input type="hidden" name="id" value= <?php echo $questao['id']; ?>>
          <div>
            <button type="submit" name="button">Responder</button>
          </div>
      </form>
  </body>
</html>
