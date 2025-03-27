<?php 

namespace App\Models;

class PokemonRelationType
{
    public function __construct (private ?int $pokemon_id, private int $typeId)
    {
        $this->pokemon_id = $pokemon_id;
        $this->typeId = $typeId;
    }

        public function getPokemon_id()
        {
                return $this->pokemon_id;
        }


        public function setPokemon_id($pokemon_id)
        {
                $this->pokemon_id = $pokemon_id;
        }
        public function getTypeId()
        {
                return $this->typeId;
        }

        public function setTypeId($typeId)
        {
                $this->typeId = $typeId;
        }
}