<h1 class="">Projet Pokedex</h1>

<div class="d-flex flex-wrap justify-content-evenly">
    <?php foreach ($pokemons as $pokemon): ?>
        <div class="col-4 d-flex p-3 justify-content-center">
            <img src="<?= $pokemon->getImage() ?>" alt="<?= $pokemon->getNameFr() ?>" style="height: 200px; width: auto;">
            <div class="p-2">
                <?php foreach ($pokemon->getTypes() as $type) { ?>
                <h2><?= $type ?></h2> <?php } ?>
                <p><?= $pokemon->getCategory() ?></p> 

            </div>
        </div>
    <?php endforeach; ?>
