<?php
require('secure.php');
session_start();
$user = $_SESSION['user'];
$restaurantes = file('csv/restaurant.csv');
$key = $_GET['key'];
$restaurante = $restaurantes[$key];
echo $restaurante;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR</title>
    <link rel="stylesheet" href="css/crud.css">
</head>

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

        <?php foreach ($restaurantes as $key => $restaurante) : ?>
            <!-- separa o usuário do restaurante para restrição de exclusão e exibiçao no site  -->
            <?php list($u, $name, $location, $type, $amount) = explode(',', $restaurante); ?>
            <?php if ($user == $u) : ?>

                <form action="php-server/update.php?key=<?= $key ?>" method="POST">
                    <h1>Adicionar Tarefa</h1>

                    <div class="input">
                        <label>Nome do restaurante</label>
                        <input type="text" name="restaurant" value="<?= $name ?>" required>
                    </div>
                    <div class="input">
                        <label>Endereço</label>
                        <input type="text" name="location" value="<?= $location ?>" required>
                    </div>
                    <div class="input">
                        <label>Tipo de culinária</label>
                        <select name="type" value="<?= $type ?>">
                            <option value="Brasileira" selected>Brasileira</option>
                            <option value="Italiana">Italiana</option>
                            <option value="Japonesa">Japonesa</option>
                            <option value="Francesa">Francesa</option>
                        </select>
                    </div>
                    <div class="input">
                        <label>Preço por pessoa</label>
                        <input type="text" name="amount" value="<?= $amount ?>" required>
                    </div>
                    <div class="input">
                        <input type="submit" value="Atualizar" class="button">
                    </div>
                </form>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</body>

</html>