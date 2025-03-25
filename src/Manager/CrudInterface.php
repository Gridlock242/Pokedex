<?php 

namespace App\Interfaces;

interface CrudInterface {
    public function selectById(int $id);
    public function selectAll(): array;
    public function insert(object $entity): bool;
    public function update(object $entity): bool;
    public function delete(int $id): bool;
}