<h1 class="">Projet Pokedex</h1>

<div class="d-flex flex-wrap justify-content-evenly">
    <?php foreach ($pokemons as $pokemon): ?>
        <a href="templates/pokemonSelection.php" class="textDecorationContainer">
        <div class="col-4 d-flex p-3 justify-content-center">
            <img src="<?= $pokemon->getImage() ?>" alt="<?= $pokemon->getNameFr() ?>" style="height: 200px; width: auto;">
            <div class="p-2">
                <h2><?= $pokemon->getNameFr() ?></h2>
                <p><?= $pokemon->getCategory() ?></p> 

                <?php foreach ($pokemon->getTypes() as $type) { ?>
                <img src="<?= $type->getImage() ?>" alt=""> 
                <?php } ?>

            </div>
            </a>
        </div>
    <?php endforeach; ?>
