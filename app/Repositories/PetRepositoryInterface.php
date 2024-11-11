<?php

namespace App\Repositories;

use App\Models\Pet;
use App\DTOs\PetDTO;

interface PetRepositoryInterface
{
    public function getAllPets(): array;

    public function addPet(PetDTO $petDTO): Pet;
    public function updatePet(int $petId, PetDTO $petDTO): Pet;
    public function findPetById(int $petId): Pet;
    public function findPetsByStatus(string $status): array;
    public function findPetsByTags(array $tags): array;
    public function uploadImage(int $petId, string $imagePath): bool;
    public function deletePet(int $petId): bool;
}

