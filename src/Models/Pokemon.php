<?php

namespace App\Models;

class Pokemon
{
    public function __construct(private ?int $id, private string $pokedexId, private string $nameFr, private string $category, private string $image, private string $imageShiny)
    {
        $this->id = $id;
        $this->pokedexId = $pokedexId;
        $this->nameFr = $nameFr;
        $this->category = $category;
        $this->image = $image;
        $this->imageShiny = $imageShiny;
    }

 

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPokedexId()
    {
        return $this->pokedexId;
    }

    public function setPokedexId($pokedexId)
    {
        $this->pokedexId = $pokedexId;
    }

    public function getNameFr()
    {
        return $this->nameFr;
    }

    public function setNameFr($nameFr)
    {
        $this->nameFr = $nameFr;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }


    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }


    public function getImageShiny()
    {
        return $this->imageShiny;
    }

    public function setImageShiny($imageShiny)
    {
        $this->imageShiny = $imageShiny;
    }
}
