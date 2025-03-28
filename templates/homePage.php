<h1 class="">Projet Pokedex</h1>

<div class="container">
    <div class="row">
        <?php foreach ($pokemons as $pokemon): ?>
            <div class="col-md-4"> <!-- Bootstrap permet d'avoir 3 colonnes par ligne -->
                <div class="card">
                    <img src="<?= $pokemon->getImageShiny() ?>" alt="<?= $pokemon->getNameFr() ?>" class="pokemonImgShiny">
                    <img src="<?= $pokemon->getImage() ?>" alt="<?= $pokemon->getNameFr() ?>" class="pokemonImg">
                    <div class="cardBody">
                        <h2><?= $pokemon->getNameFr() ?></h2>
                        <p><?= $pokemon->getCategory() ?></p>
                        <div class="types">
                            <?php foreach ($pokemon->getTypes() as $type): ?>
                                <img src="<?= $type->getImage() ?>" alt="<?= $type->getName() ?>" class="typeImg">
                            <?php endforeach; ?>
                        </div>
                        <button class="card-button">Description</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
