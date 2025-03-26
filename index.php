<?php 
require_once(__DIR__ . "/vendor/autoload.php");

use App\Controller\HomeController;
// use App\Controller\PokemonSelectionController;

var_dump($_SERVER["REQUEST_URI"]);

$action = $_GET["action"];

$id = $_GET['id'];

var_dump("Action, $action");

// Créer une route pour afficher la page d'accueil
// Afficher tous les pokémons  
// index.php?action=homePage
$homeController = new HomeController();

if($action === "homePage"){
    $homeController->homePage();
}
else {
    echo("Pas home page");
}

// index.php?action=pokemonSelection

if($action === "pokemonSelection") {
    $homeController->pokemonSelection($id);
}
