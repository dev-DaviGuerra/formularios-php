<?php
require 'functions.php';



$erro = null;
$sucesso = null;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['honeypot'])){
        $erro = 'Ops, robô detectado';
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
    <h1> Selecione a forma de pagamento </h1>
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
        <input type="text" name="nome" placeholder="Digite seu nome">
        <br/>
        <input type="text" name="email" placeholder="Digite seu email">
        <br/>
        <input type="text" name="mensagem" placeholder="Digite sua mensagem">
        <br/>
        <input type="hidden" name="honeypot" value="">
        <br/>
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>