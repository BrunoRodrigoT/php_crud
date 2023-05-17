<?php
//inicia a sessão.
session_start();
//recebe os valores respectivos do formulário de login e aloca a uma variável.
$user= $_POST['user'];
$passwd=sha1($_POST['passwd']);//cripytografa a senha para validação.

$registers= file('../csv/register.csv');//guarada os dados vindo do arquivo csv de registro.

//verifica se o usuário já está registrado para pode logar.
foreach ($registers as $register) {
    
    list($un, $e, $pass)= explode(',',$register);//separa os dados dos registros para validação;

    //verifica se os dados de login estão de acordo com o de registro.
if($user==trim($un)&&$passwd==trim($pass)||$user==trim($e)&&$passwd==trim($pass)){
    //caso os dados estejam corretos, adiciona os dados do usuário a uma variável de sessão, e redireciona para pagina já autenticada.
    $_SESSION["user"]= $un;
    header('location:../logado.php');
    exit();
}

}

//caso os dados estejam incorretos ou não constem como registrados, o programa redireciona com, um menssagem de erro para a página de login.

header("location:../index.php?message=usúario ou senha incorretos&color=253, 204, 201")


?>