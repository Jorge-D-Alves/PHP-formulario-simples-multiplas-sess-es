<?php
    session_start();
    // session_destroy();

    if(!isset($_SESSION['etapa_formulario'])){
        $_SESSION['etapa_formulario'] = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>

    <?php
        if(isset($_POST['acao_form1'])){
            $_SESSION['etapa_formulario'] = $_SESSION['etapa_formulario']+1;
            // $_SESSION['etapa_formulario']++;
            $_SESSION['nome'] = $_POST['nome'];
            header('Location: index.php');
            die(); // Interromper programa
        }else  if(isset($_POST['acao_form2'])){
            $_SESSION['etapa_formulario'] = $_SESSION['etapa_formulario']+1;
            
            $_SESSION['email'] = $_POST['email'];
            header('Location: index.php');
            die(); // Não continuar a execução do código
        }
    ?>

    <?php 
        if(isset($_SESSION['etapa_formulario']) && $_SESSION['etapa_formulario'] == 0 ){
    ?>

    <form method="post">
        <imput type="text" name="nome" placeholder="Digite seu nome...">
        <imput type="hidden" name="acao_form1">
        <imput type="submit" value="Enviar!">
    </form>

    <?php }else if(isset($_SESSION['etapa_formulario']) && $_SESSION['etapa_formulario'] == 1 ){ ?>

    <form method="post">
        <imput type="text" name="email" placeholder="Digite seu e-mail...">
        <imput type="hidden" name="acao_form2">
        <imput type="submit" value="Enviar!">
    </form>

    <?php }else { ?>
        <h2>Você chegou no final do formuláerio! Abaixo suas informações:</h2>
        <?php 
            echo 'Nome: '.$_SESSION['nome'];
            echo '<br>';
            echo 'E-mail: '.$_SESSION['email'];
        ?>
    <?php } ?>    
</body>
</html>