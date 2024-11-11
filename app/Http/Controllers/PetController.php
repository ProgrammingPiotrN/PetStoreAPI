<?php

namespace App\Http\Controllers;

use App\DTOs\CategoryDTO;
use App\DTOs\PetDTO;
use App\Exceptions\PetNotFoundException;
use App\Exceptions\InvalidPetDataException;
use App\Exceptions\ImageUploadException;
use App\Http\Requests\AddPetRequest;
use App\Http\Requests\UploadPetImageRequest;
use App\Services\PetService;

class PetController extends Controller
{
    private PetService $petService;

    public function __construct(PetService $petService)
    {
        $this->petService = $petService;
    }

    public function index()
    {
        return view('layouts.welcome');
    }
    public function indexPet()
    {
        $pets = $this->petService->getAllPets();
        return view('pets.index', compact('pets'));
    }

    public function addPet(AddPetRequest $request)
    {
        $petDTO = new PetDTO(
            $request->id,
            new CategoryDTO($request->category['id'], $request->category['name']),
            $request->name,
            $request->photoUrls,
            $request->tags,
            $request->status
        );

        try {
            $pet = $this->petService->addPet($petDTO);
        } catch (\Exception $e) {
            throw new InvalidPetDataException();
        }

        return response()->json($pet, 201);
    }

    public function findPetById(int $petId)
    {
        $pet = $this->petService->findPetById($petId);

        if (!$pet) {
            throw new PetNotFoundException();
        }

        return response()->json($pet, 200);
    }

    public function uploadImage(UploadPetImageRequest $request, int $petId)
    {
        $imagePath = $request->file('image')->getPathname();

        $success = $this->petService->uploadImage($petId, $imagePath);

        if (!$success) {
            throw new ImageUploadException();
        }

        return response()->json(['success' => $success], 200);
    }

    public function deletePet(int $petId)
    {
        $success = $this->petService->deletePet($petId);

        if (!$success) {
            throw new PetNotFoundException();
        }

        return response()->json(['message' => 'The animal was removed'], 200);
    }
}
