<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/crud.css">
    <title>CRUD</title>
</head>

<?php
//Função php que inicia uma sessão e seta um cookie php para o client que serve como identificador.
session_start();
//Variável que recebe os dados registrados do usuário na variaável global de sessão.
$user = $_SESSION['user'];
//Variável que recebe os dados registrados no arquivo csv.
$itens = file('csv/compras.csv'); //file é a função que abre e lê o arquivo, transformando-o em um array onde cada linha torna-se um elemento.
?>

<body>

    <div id="screen">

        <div id="menu">
            <nav>
                <span>Lista de Tarefas</span>
                <?php if (isset($user)) : ?>
                    <span id="user">Olá, <?= $user ?>!<span>- </span><a href="index.php">Sair</a></span>
                <?php endif ?>
            </nav>
        </div>


        <form id="add" action="php-server/add.php" method="POST">
            <h1>Adicionar Tarefa</h1>

            <div class="input">
                <label>Item da lista</label>
                <input type="text" name="item" class="email" required>
            </div>
            <div class="input">
                <input type="submit" value="Adicionar" class="button">
            </div>
        </form>

        <div id="list">

            <table>
                <h2>Itens da lista</h2>
                <!-- separa e exibe os itens arquivados em csv para o usuário -->
                <?php foreach ($itens as $key => $item) : ?>
                    <!-- separa o usuário do item para restrição de esclusão e exibiçao no site  -->
                    <?php list($u, $i) = explode(',', $item); ?>
                    <?php if ($user == $u) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <!-- botão de delete que passa o indice do item por pelo metodo get ao servidor para a exclusão do item da lista -->
                            <td id="delete"><a href="php-server/delete.php?key=<?= $key ?>">Check</a></td>
                        </tr>
                    <?php endif ?>
                <?php endforeach ?>

            </table>

        </div>

    </div>