<?php
require 'functions.php';

$tecnologias = ['HTML', 'CSS', 'PHP', 'JavaScript'];
$opcoesValidas = ['PHP', 'JavaScript'];


$erro = null;
$sucesso = null;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $opcoes = $_POST['opcoes'];
    
    if(count($opcoes) != 2){
        $erro = 'Selecione EXATAMENTE duas tecnologias!';
    } 

    foreach($opcoes as $opcao) {
        if(!in_array($opcao, $opcoesValidas)){
            $erro = 'A tecnologia '. $opcao .' não é válida';
            break;
        }
    }
    if(empty($erro)){
        $sucesso = 'Deu tudo certo';
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
        <select name="opcoes[]" multiple>
            <?php
            foreach($tecnologias as $tec) : ?>
            <option value=" <?=$tec;?> "> <?= $tec; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>