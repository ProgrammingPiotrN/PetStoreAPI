<?php

namespace App\Services;

use App\Models\Pet;
use App\DTOs\PetDTO;
use App\Repositories\PetRepositoryInterface;

class PetService implements PetServiceInterface
{
    private PetRepositoryInterface $petRepository;

    public function __construct(PetRepositoryInterface $petRepository)
    {
        $this->petRepository = $petRepository;
    }

    public function getAllPets(): array
    {
        return $this->petRepository->getAllPets();
    }

    public function addPet(PetDTO $petDTO): Pet
    {
        return $this->petRepository->addPet($petDTO);
    }

    public function updatePet(int $petId, PetDTO $petDTO): Pet
    {
        return $this->petRepository->updatePet($petId, $petDTO);
    }

    public function findPetById(int $petId): Pet
    {
        return $this->petRepository->findPetById($petId);
    }

    public function findPetsByStatus(string $status): array
    {
        return $this->petRepository->findPetsByStatus($status);
    }

    public function findPetsByTags(array $tags): array
    {
        return $this->petRepository->findPetsByTags($tags);
    }

    public function uploadImage(int $petId, string $imagePath): bool
    {
        return $this->petRepository->uploadImage($petId, $imagePath);
    }

    public function deletePet(int $petId): bool
    {
        return $this->petRepository->deletePet($petId);
    }
}
