<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('locatiom:../index.php');
    exit();
}

$user = $_SESSION['user'];
$key = $_POST['key'];
$restaurant = $_POST['restaurant'];
$location = $_POST['location'];
$type = $_POST['type'];
$amount = $_POST['amount'];


$editRestaurant = $user . ',' . $restaurant . ',' . $location . ',' . $type . ',' . $amount . "\n";

$editRestaurant = implode('', $restaurants);
file_put_contents('../csv/restaurant.csv', $editRestaurant);

header('location:../logado.php');
