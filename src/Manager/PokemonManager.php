<?php

namespace App\Manager;
use App\Interfaces\CrudInterface;
use App\Model\User;
use PDO;

class PokemonManager extends DatabaseManager {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function selectById(int $id): ?User {
       ....
    }

    public function selectAll(): array {
        .....
    }

    public function insert(object $entity): bool {
       .....
    }

    public function update(object $entity): bool {
       ...
    }

    public function delete(int $id): bool {
        ....
    }
}

