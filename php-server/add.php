<?php
session_start();//inicia a sessão para utilização dos dados registrados na global de sessão.

//verifica se o usuário está autenticado, caso não, redireciona para página de login.
if(!isset($_SESSION['user'])){
    header('locatiom:../index.php');
    exit();
} 

//recebe os dados da sessão e do formulário.
$user= $_SESSION['user'];
$item= $_POST['item'];

$newitem= $user.','.$item ."\n";//concatena o usúario e o item por questões de segurança e privacidade.

$fp= fopen('../csv/compras.csv', 'a');
fwrite($fp, $newitem);//adiciona no arquivo csv.
fclose($fp);//fecha o arquivo.

header('location:../logado.php')
//Redireciona para a página autenticada.
?>