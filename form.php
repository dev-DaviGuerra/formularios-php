<?php
require 'functions.php';

$tecnologias = ['HTML', 'CSS', 'PHP', 'JavaScript'];





$erro = null;
$sucesso = null;
$tecnologiaSelecionada = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(empty($_POST['tecnologia'])){
        $erro = 'Selecione uma tecnologia';
    }
    $tecnologiaSelecionada = $_POST['tecnologia'] ?? [];
    
    if(count($tecnologiaSelecionada) != 1) {
        $erro = 'Selecione apenas 1 tecnologia';
    } elseif($tecnologiaSelecionada[0] != 'HTML'){
        $erro = 'Você deve selecionar o HTML, ao invés de '. $tecnologiaSelecionada[0];
    } else{
        $sucesso = 'HTML SELECIONADO!';
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
    <h1> Selecione o HTML </h1>
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
        <select name="tecnologia[]" multiple>
    <?php
        foreach($tecnologias as $tecnologia):
        ?>
        <option value="<?= $tecnologia; ?>"
        <?= in_array($tecnologia, $tecnologiaSelecionada) ? 'selected' : '';?>
        >
        <?= $tecnologia; ?>

        </option>
    <?php
        endforeach; 
    ?>

        </select>
        
        <input type="submit" value="Enviar">
        
    </form>
    
</body>
</html>