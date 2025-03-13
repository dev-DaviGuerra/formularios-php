<?php
require 'functions.php';

$tecnologias = ['HTML', 'CSS', 'PHP', 'JavaScript'];

$erro = null;
$sucesso = null;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $opcao = $_POST['opcao'];
    echo $opcao;
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
        <select name="opcao">
            <?php
            foreach($tecnologias as $tec) : ?>
            <option value="<?=$tec;?>"><?=$tec;?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>