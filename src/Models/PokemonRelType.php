<?php 

namespace App\src\Model;

class PokemonType
{
    public function __construct (private ?int $pokemon_id, private int $type)
    {
        $this->pokemon_id = $pokemon_id;
        $this->type = $type;
    }

        public function getPokemon_id()
        {
                return $this->pokemon_id;
        }


        public function setPokemon_id($pokemon_id)
        {
                $this->pokemon_id = $pokemon_id;
        }
}