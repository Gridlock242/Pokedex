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
        require_once("templates/homePage.php");        
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
        $pokemons = $pokemonManager->selectByName($name);
        $title = "Recherche Pokédex";

        // var_dump('cc');

        if ($pokemons != false) {
            require_once("templates/searchPage.php");
        } else {
            header("Location: index.php");
            exit();
        }
    }
    
}
