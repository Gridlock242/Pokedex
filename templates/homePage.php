<?php

use App\Manager\PokemonManager;

require_once("header.php");
$title = "Accueil Pokédex";

?>

<h1 class="">Projet Pokedex</h1>

<div class="d-flex flex-wrap justify-content-evenly">
    <?php foreach ($pokemons as $pokemon): ?>
        <div class="col-4 d-flex p-3 justify-content-center">
            <img src="<?= $pokemon->getImage() ?>" alt="<?= $pokemon->nameFr() ?>" style="height: 200px; width: auto;">
            <div class="p-2">
                <h2><?= $pokemon->getType() ?></h2>
                <p><?= $pokemon->category() ?></p>
            </div>
        </div>
    <?php endforeach; ?>

<?php

require_once("footer.php");