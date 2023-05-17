<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/crud.css">
    <title>REGISTRE-SE</title>
</head>

<body>

    <div id="screen">

        <div id="menu">
            <nav>
                <span>Lista de Restaurantes</span>
            </nav>
        </div>

        <!-- Formulário de registro que envia os dados pelo metodo POST ao servidor php-->

        <form action="php-server/register.php" method="POST">

            <h1>Registre-se</h1>

            <?php
            // Variável que recebe a cor da div de mensagem, representando erro ou sucesso.
            $color = isset($_GET['color']) ? $_GET['color'] : '';
            // Variável que recebe uma mensagem pelo metodo get, confirmando ou não o login.
            $message = isset($_GET['message']) ? $_GET['message'] : '';
            //condição que verifica se existe uma mensagem de login vinda do servidor php e exibe a div de menssagem.
            if ($message != '') {
                echo "<div id='message' style='background-color:rgb(" . $color . ");'><h4>" . $message . "</h4></div>";
            }
            ?>
            <div class="input">
                <label>Nome</label>
                <input type="text" name="username" class="username" required minlength="3">
            </div>
            <div class="input">
                <label>Email</label>
                <input type="email" name="email" class="email" required>
            </div>
            <div class="input">
                <label>Senha</label>
                <input type="password" name="passwd" class="password" minlength="8" required>
            </div>
            <div class="input">
                <input type="submit" value="Confirmar" class="button">
            </div>
            <div class="input">
                <a href="/">Voltar ao Login</a>
            </div>
        </form>

    </div>

</body>

</html>