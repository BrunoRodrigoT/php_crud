<!-- Restaurante: nome, endereço, tipo de culinária
 (opções: italiana, japonesa, brasileira, francesa),
faixa de preço por pessoa / restaurantes.csv -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/crud.css">
    <title>LISTA DE RESTAURANTES</title>
</head>

<?php
require('secure.php');
session_start();
$user = $_SESSION['user'];
$restaurantes = file('csv/restaurant.csv');
?>

<body>

    <div id="screen">

        <div id="menu">
            <nav>
                <span>Lista de Restaurantes</span>
                <?php if (isset($user)) : ?>
                    <span id="user">Olá, <?= $user ?>!<span>- </span><a href="/php-server/logout.php">Sair</a></span>
                <?php endif ?>
            </nav>
        </div>


        <form id="add" action="php-server/update.php" method="POST">
            <h1>Adicionar Tarefa</h1>

            <div class="input">
                <label>Nome do restaurante</label>
                <input type="text" name="restaurant" required>
            </div>
            <div class="input">
                <label>Endereço</label>
                <input type="text" name="location" required>
            </div>
            <div class="input">
                <label>Tipo de culinária</label>
                <select name="type">
                    <option value="Brasileira" selected>Brasileira</option>
                    <option value="Italiana">Italiana</option>
                    <option value="Japonesa">Japonesa</option>
                    <option value="Francesa">Francesa</option>
                </select>
            </div>
            <div class="input">
                <label>Preço por pessoa</label>
                <input type="text" name="amount" required>
            </div>
            <div class="input">
                <input type="submit" value="Adicionar" class="button">
            </div>
        </form>

        <div id="list">

            <table>
                <h2>Restaurantes da lista</h2>
                <!-- separa e exibe os itens arquivados em csv para o usuário -->
                <?php foreach ($restaurantes as $key => $restaurante) : ?>
                    <!-- separa o usuário do restaurante para restrição de exclusão e exibiçao no site  -->
                    <?php list($u, $name, $location, $type, $amount) = explode(',', $restaurante); ?>
                    <?php if ($user == $u) : ?>
                        <tr>
                            <td><?= $name ?></td>
                            <td><?= $location ?></td>
                            <td><?= $type ?></td>
                            <td><?= $amount ?></td>
                            <!-- botão de delete que passa o indice do restaurante por pelo metodo get ao servidor para a exclusão do restaurante da lista -->
                            <td id="delete"><a href="php-server/delete.php?key=<?= $key ?>">Deletar</a></td>
                            <td id="update"><a href="updateRestaurant.php?key=<?= $key ?>">Editar</a></td>

                        </tr>
                    <?php endif ?>
                <?php endforeach ?>

            </table>

        </div>

    </div>