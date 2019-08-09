<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>
      <?php
        include_once "funcao.php";
        $id = $_POST['id'];
        $resposta = $_POST['resposta'];
        $questao = obterQuestaoById($id);
        $respostaCerta = $questao['resposta'];
        echo 'Sua resposta para a questão '.$_POST['id'].' foi: '.$resposta;
        if (trim($resposta) == trim($respostaCerta)) {
          echo '. Você acertou.';
        } else {
          echo '. Você errou a questão.';
        }
       ?>
    </h1>
  </body>
</html>
