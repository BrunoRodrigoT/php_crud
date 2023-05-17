<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/crud.css">
    <title>LOGIN</title>
</head>

<body>

    <div id="screen">

        <div id="menu">
            <nav>
                <span>Lista de Restaurantes</span>
            </nav>
        </div>

        <form action="php-server/aut.php" method="POST">

            <h1>Login</h1>

            <?php
            $color = isset($_GET['color']) ? $_GET['color'] : '';
            $message = isset($_GET['message']) ? $_GET['message'] : '';
            if ($message != '') {
                echo "<div id='message' style='background-color:rgb(" . $color . ");'><h4>" . $message . "</h4></div>";
            }
            ?>

            <div class="input">
                <label>Email</label>
                <input type="text" name="user" class="email" minlength="3" required>
            </div>
            <div class="input">
                <label>Senha</label>
                <input type="password" name="passwd" class="password" minlength="8" required>
            </div>
            <div class="input">
                <input type="submit" value="Entrar" class="button">
            </div>
            <div class="input">
                <a href="reg_form.php">Registre-se</a>
            </div>
        </form>


    </div>

</body>

</html>