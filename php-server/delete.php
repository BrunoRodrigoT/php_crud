<?phP
session_start(); 

if (!isset($_SESSION['user'])) {
    header('locatiom:../index.php');
    exit();
}

$user = $_SESSION['user'];

$key = $_GET["key"];

$restaurants = file('../csv/restaurant.csv'); 


$restaurants[$key] = "";

$newRestaurants = implode('', $restaurants);
file_put_contents('../csv/restaurant.csv', $newRestaurants);  

header('location:../logado.php');
