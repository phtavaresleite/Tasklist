<?php
    session_start();

    //validando formulario
    if (isset($_POST["acao"]))
    {
        $tarefa = strip_tags($_POST["tarefa"]);

        //verificcar se existe sessão
        if(!isset($_SESSION["tarefas"]))
        {
            $_SESSION["tarefas"] = array();
            $_SESSION["tarefas"][] = $tarefa;
        }

        else 
        {
            $_SESSION["tarefas"][] = $tarefa;
        }

        echo '<script>alert("Tarefa foi adicionada.");</script>';

    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <input type="text" name="tarefa" placeholder="Digite sua tarefa:">
        <input type="submit" name="acao" value="Enviar">
    </form>
    <br>
    <h3>Suas Tarefas Atuais:</h3>

    <?php
        foreach ($_SESSION['tarefas'] as $key => $value)
        {
            echo '<p>'.$value.'</p>';
        }
    ?>
</body>
</html>