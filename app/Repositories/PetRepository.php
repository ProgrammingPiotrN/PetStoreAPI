<?php

namespace App\Repositories;

use App\DTOs\PetDTO;
use App\Models\Category;
use App\Models\Pet;
use Illuminate\Support\Facades\Http;

class PetRepository implements PetRepositoryInterface
{
    private string $apiUrl = 'https://petstore.swagger.io/v2/pet';

    public function getAllPets(): array
    {
        $response = Http::get($this->apiUrl);

        return array_map(function ($item) {
            return new Pet(
                $item['id'],
                new Category($item['category']['id'], $item['category']['name']),
                $item['name'],
                $item['photoUrls'],
                $item['tags'],
                $item['status']
            );
        }, $response->json());
    }

    public function addPet(PetDTO $petDTO): Pet
    {
        $response = Http::post($this->apiUrl, [
            'id' => $petDTO->id,
            'category' => [
                'id' => $petDTO->category->id,
                'name' => $petDTO->category->name
            ],
            'name' => $petDTO->name,
            'photoUrls' => $petDTO->photoUrls,
            'tags' => $petDTO->tags,
            'status' => $petDTO->status
        ]);

        return new Pet(
            $response['id'],
            new Category($response['category']['id'], $response['category']['name']),
            $response['name'],
            $response['photoUrls'],
            $response['tags'],
            $response['status']
        );
    }

    public function updatePet(int $petId, PetDTO $petDTO): Pet
    {
        $response = Http::put("{$this->apiUrl}/{$petId}", [
            'category' => [
                'id' => $petDTO->category->id,
                'name' => $petDTO->category->name
            ],
            'name' => $petDTO->name,
            'photoUrls' => $petDTO->photoUrls,
            'tags' => $petDTO->tags,
            'status' => $petDTO->status
        ]);

        return new Pet(
            $response['id'],
            new Category($response['category']['id'], $response['category']['name']),
            $response['name'],
            $response['photoUrls'],
            $response['tags'],
            $response['status']
        );
    }

    public function findPetById(int $petId): Pet
    {
        $response = Http::get("{$this->apiUrl}/{$petId}");

        return new Pet(
            $response['id'],
            new Category($response['category']['id'], $response['category']['name']),
            $response['name'],
            $response['photoUrls'],
            $response['tags'],
            $response['status']
        );
    }

    public function findPetsByStatus(string $status): array
    {
        $response = Http::get("{$this->apiUrl}/findByStatus", [
            'status' => $status
        ]);

        return array_map(function ($item) {
            return new Pet(
                $item['id'],
                new Category($item['category']['id'], $item['category']['name']),
                $item['name'],
                $item['photoUrls'],
                $item['tags'],
                $item['status']
            );
        }, $response->json());
    }

    public function findPetsByTags(array $tags): array
    {
        $response = Http::get("{$this->apiUrl}/findByTags", [
            'tags' => implode(',', $tags)
        ]);

        return array_map(function ($item) {
            return new Pet(
                $item['id'],
                new Category($item['category']['id'], $item['category']['name']),
                $item['name'],
                $item['photoUrls'],
                $item['tags'],
                $item['status']
            );
        }, $response->json());
    }

    public function uploadImage(int $petId, string $imagePath): bool
    {
        $response = Http::attach('file', file_get_contents($imagePath), 'image.jpg')
                        ->post("{$this->apiUrl}/{$petId}/uploadImage");

        return $response->successful();
    }

    public function deletePet(int $petId): bool
    {
        $response = Http::delete("{$this->apiUrl}/{$petId}");

        return $response->successful();
    }
}
