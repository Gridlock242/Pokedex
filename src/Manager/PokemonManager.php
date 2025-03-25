<?php

namespace App\Manager;
use App\Interfaces\CrudInterface;
use App\src\Model\Pokemon;
use PDO;

class PokemonManager extends DatabaseManager {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function selectById(int $id): ?Pokemon {
        $requete = self::getConnexion()->prepare("SELECT * FROM pokemon WHERE id = :id:");
        $requete->execute([
            ":id" => $id
        ]);

        $arrayPokemon = $requete->fetch();

        // Si pas de résultat fetch()
        if(!arrayPokemon) {
            return false;
        }
        // Renvoyer l'instance d'un objet Pokemon avec les données du tableau associatif
        return new Pokemon($arrayPokemon["id"], $arrayPokemon["pokemonId"], $arrayPokemon["nameFr"], $arrayPokemon["category"], $arrayPokemon["image"], $arrayPokemon["imageShiny"]);
    }

    public function selectAll(): array {
        $requete = self::getConnexion()->prepare("SELECT * FROM pokemon;");
        $requete->execute();

        $arrayPokemons = $requete->fetchAll();
        $pokemons = [];
        foreach ($arrayPokemons as $arrayPokemon) {
            $pokemons[] = new Pokemon ($arrayPokemon["id"], $arrayPokemon["pokemonId"], $arrayPokemon["nameFr"], $arrayPokemon["category"], $arrayPokemon["image"], $arrayPokemon["imageShiny"]);
        }

        return $pokemons;
    }

    public function insert(Pokemon $pokemon): bool {
        $requete = self::getConnexion()->prepare("INSERT INTO pokemon (nameFr, category, image, imageShiny) VALUE (:nameFr, :category, :image, :imageShiny);");
        $requete->execute([
            ":nameFr" => $pokemon->getNameFr(),
            ":category" => $pokemon->getCategory(),
            ":image" => $pokemon->getImage(),
            ":imageShiny" => $pokemon->getImageShiny()
        ]);

        return $requete->rowCount() > 0;
    }

    public function update(Pokemon $pokemon): bool {
        $requete = self::getConnexion()->prepare("UPDATE pokemon SET nameFr = :nameFr, category = :category, image = :image, imageShiny = :imageShiny;");
        $requete->execute(
            [
                ":nameFr" => $pokemon->getNameFr(),
                ":category" => $pokemon->getCategory(),
                ":image" => $pokemon->getImage(),
                ":imageShiny" => $pokemon->getImageShiny()
            ]
            );
    }

    public function delete(int $id): bool {
    $requete = self::getConnexion()->prepare("DELETE FROM car WHERE id = :id;");
    $requete->execute([
        ":id" => $id
    ]);
    }
}

