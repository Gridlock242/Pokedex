<?php

namespace App\Controller;
use App\Manager\PokemonManager;


class  HomeController
{

    public function homePage()
    {
        // var_dump("salut");
        $pokemonManager = new PokemonManager;
        $pokemons = $pokemonManager->selectAll();
        $title = "Accueil Pokédex";
        require_once("templates/header.php");
        require_once("templates/homePage.php");
        require_once("templates/footer.php");

        
    }

    // Route pokemonSelection -> URL: index.php?action=detail&id=10 
    public function pokemonSelection(int $id)
    {
        $pokemonManager = new PokemonManager();
        $pokemon = $pokemonManager->selectById($id);
        var_dump($pokemon);
        // Récupérer les pokémons
        if ($pokemon != false) {
            require_once("./templates/pokemonSelection.php");
        } else {
            header("Location: index.php");
            exit();
        }
    }

    public function searchPage(string $name)
    {
        $pokemonManager = new PokemonManager();
        $pokemon = $pokemonManager->selectByName($name);

        // var_dump('cc');

        if ($pokemon != false) {
            require_once("templates/searchPage.php");
        } else {
            header("Location: index.php");
            exit();
        }
    }
    
}
