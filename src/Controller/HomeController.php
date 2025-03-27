<?php

namespace App\Controller;
use App\Manager\PokemonManager;

class  HomeController
{

    public function homePage()
    {
        // var_dump("salut");
        require_once("./templates/homePage.php");
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
}
