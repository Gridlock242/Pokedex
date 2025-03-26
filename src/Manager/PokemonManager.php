<?php

namespace App\Manager;
use App\Interfaces\CrudInterface;
use App\Models\Pokemon;
use App\Models\PokemonType;
use PDO;

class PokemonManager extends DatabaseManager {

    public function selectById(int $id): ?Pokemon {
        $requete = self::getConnexion()->prepare("SELECT * FROM pokemon WHERE id = :id;");
        $requete->execute([
            ":id" => $id 
        ]);

        $arrayPokemon = $requete->fetch();

        // Si pas de résultat fetch()
        if(!$arrayPokemon) {
            return null;
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
            $pokemons[] = new Pokemon ($arrayPokemon["id"], $arrayPokemon["pokemonId"], $arrayPokemon["nameFr"], $arrayPokemon["category"], $arrayPokemon["image"], $arrayPokemon["imageShiny"], $arrayPokemon["type"]);
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

        return $requete->rowCount() > 0;

    }

    public function delete(int $id): bool {
    $requete = self::getConnexion()->prepare("DELETE FROM car WHERE id = :id;");
    $requete->execute([
        ":id" => $id
    ]);

    return $requete->rowCount() > 0;
    }

    private function getBaseQuery(): string {
        return "
        SELECT 
            p.id, 
            p.pokedexId, 
            p.nameFr, 
            p.category, 
            p.image, 
            p.imageShiny, 
            pt1.id AS type1_id,
            pt1.name AS type1_name,
            pt1.image AS type1_image,
            pt2.id AS type2_id,
            pt2.name AS type2_name,
            pt2.image AS type2_image
        FROM pokemon p
        LEFT JOIN pokemon_type_relation ptr1 ON p.id = ptr1.pokemon_id
        LEFT JOIN pokemon_type pt1 ON ptr1.type_id = pt1.id
        LEFT JOIN pokemon_type_relation ptr2 ON p.id = ptr2.pokemon_id AND ptr2.type_id > ptr1.type_id
        LEFT JOIN pokemon_type pt2 ON ptr2.type_id = pt2.id
        ";
    }
    private function arrayToObject(array $data): Pokemon {
        $pokemon = new Pokemon(
            $data['id'],
            $data['pokemonId'],
            $data['nameFr'],
            $data['category'], 
            $data['image'],
            $data['imageShiny'],
            []
        );

        if (!empty($date["type1_id"])) {
            $type1 = new PokemonType($data["type1_id"], $data
            ["type1_name"], $data["type1_image"]);

            $pokemon->addType($type1);
        }

        if (!empty($date["type2_id"])) {
            $type2 = new PokemonType($data["type2_id"], $data
            ["type2_name"], $data["type2_image"]);
 
            $pokemon->addType($type2);
        }
        $pokemons[] = $pokemon;
    }
}

