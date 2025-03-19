<?php
require 'functions.php';

$formas_pagamento = ['cartao', 'boleto', 'dinheiro'];




$erro = null;
$sucesso = null;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST['forma_pagamento'])){
        $erro = 'Selecione um método de pagamento';
    }

    $formaPagamento = $_POST['forma_pagamento'] ?? '';
    
 
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

        <?php
        foreach($formas_pagamento as $forma_pagamento) : ?>
            <label> <?= $forma_pagamento; ?> </label>
            <input type="radio" name="forma_pagamento[]" value="<?= $forma_pagamento; ?>">
            <br/>
        <?php endforeach; ?>

        <input type="submit" value="Enviar">
        
    </form>
    
</body>
</html>