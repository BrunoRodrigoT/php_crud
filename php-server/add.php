<?php
session_start(); 

if (!isset($_SESSION['user'])) {
    header('locatiom:../index.php');
    exit();
}

//recebe os dados da sessão e do formulário.
$user = $_SESSION['user'];
$restaurant = $_POST['restaurant'];
$location = $_POST['location'];
$type = $_POST['type'];
$amount = $_POST['amount'];


$newRestaurant = $user . ',' . $restaurant . ',' . $location . ',' . $type . ',' . $amount . "\n"; //concatena o usúario e o restaurant por questões de segurança e privacidade.

$fp = fopen('../csv/restaurant.csv', 'a');
fwrite($fp, $newRestaurant); //adiciona no arquivo csv.
fclose($fp); //fecha o arquivo.

header('location:../logado.php');
//Redireciona para a página autenticada.
