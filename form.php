<?php
require 'functions.php';
$erro = null;
$sucesso = null;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $texto = $_POST['texto'];

    //Sanitização 
    $texto = htmlspecialchars($texto);

    //Remover espaços antes e depois da palavra
    $texto = trim($texto);

    // Garantir que tem um @
    if(strpos($texto, '@') == false) {
        $erro = 'O texto precisa ter um @';
    }elseif(empty($texto)) {
        $erro = "O campo texto é obrigatório";
    }elseif(strlen($texto) < 5) {
        $erro = "O número mínimo de caracteres é 5";
    }elseif(strlen($texto) > 20) {
        $erro = "O limite de caracteres é 20";
    }else{
        $sucesso = "Campo validado com sucesso!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <h1> Formulário </h1>
    <?php if(exibirErro($erro)) :?>
    <p style="color:red">
        <?= $erro; ?>
    </p>
    <?php endif; ?>
    <?php if(exibirErro($sucesso)) : ?>
    <p style="color:green">
        <?= $sucesso; ?>
    </p>
    <?php endif; ?>
    <form method="POST">
        <input type="text" name= "texto" placeholder= "Digite o texto">
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>