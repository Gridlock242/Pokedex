<?php 
require_once(__DIR__ . "/vendor/autoload.php");

use App\Controller\HomeController;
use App\Models\Pokemon;
use App\Models\PokemonType;
use App\Manager\PokemonManager;
use App\Manager\DatabaseManager;

// var_dump($_SERVER["REQUEST_URI"]);
// var_dump($_GET);

$action = $_GET["action"] ?? null;
$id = $_GET['id'] ?? null;
$name = $_GET['name'] ?? null;


// var_dump("Action, $action");
// var_dump($_GET);

// Créer une route pour afficher la page d'accueil
// Afficher tous les pokémons  
// index.php?action=homePage
$homeController = new HomeController();

if ($action === "homePage") {
    $homeController->homePage();
} elseif ($action === "pokemonSelection") {
    $homeController->pokemonSelection((int) $id); //
}

// Récuperer le $name dans homePage
// var_dump($action, $name);

elseif($action === "searchPage") {
    $homeController->searchPage($name);
} else {
    $homeController->homePage();
}