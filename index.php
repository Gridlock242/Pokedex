<?php 
require_once(__DIR__ . "/vendor/autoload.php");

use App\Controller\HomeController;
use App\Models\Pokemon;
use App\Models\PokemonType;
use App\Manager\PokemonManager;
use App\Manager\DatabaseManager;

// var_dump($_SERVER["REQUEST_URI"]);

$action = $_GET["action"] ?? null;
$id = $_GET['id'] ?? null;

// var_dump("Action, $action");
// var_dump($_GET);

// Créer une route pour afficher la page d'accueil
// Afficher tous les pokémons  
// index.php?action=homePage
$homeController = new HomeController();

// if($action == "homePage"){
//     // var_dump("je suis fou");
//     $homeController->homePage();
// }
// else {
//     echo("Pas home page");
// }

// index.php?action=pokemonSelection

// if($action === "pokemonSelection") {
//     $homeController->pokemonSelection($id);
// } 
// else {
//     echo(" " . "Pas page Sélection");
// }

if ($action === "homePage") {
    $homeController->homePage();
} elseif ($action === "pokemonSelection") {
    $homeController->pokemonSelection((int) $id); //
} else {
    echo("Action non reconnue");
}
