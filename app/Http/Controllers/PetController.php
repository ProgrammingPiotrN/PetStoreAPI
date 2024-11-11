<?php

namespace App\Http\Controllers;

use App\DTOs\CategoryDTO;
use App\DTOs\PetDTO;
use App\Http\Requests\AddPetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Http\Requests\UploadPetImageRequest;
use App\Models\Category;
use App\Models\Pet;
use App\Services\PetService;
use Illuminate\Http\Request;

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

        $pet = $this->petService->addPet($petDTO);
        return response()->json($pet);
    }

    public function updatePet(UpdatePetRequest $request, int $petId)
    {
        $petDTO = new PetDTO(
            $request->id,
            new CategoryDTO($request->category['id'], $request->category['name']),
            $request->name,
            $request->photoUrls,
            $request->tags,
            $request->status
        );

        $pet = $this->petService->updatePet($petId, $petDTO);
        return response()->json($pet);
    }

    public function findByStatus(string $status)
    {
        $pets = $this->petService->findPetsByStatus($status);
        return response()->json($pets);
    }

    public function findByTags(array $tags)
    {
        $pets = $this->petService->findPetsByTags($tags);
        return response()->json($pets);
    }

    public function findPetById(int $petId)
    {
        $pet = $this->petService->findPetById($petId);
        return response()->json($pet);
    }

    public function uploadImage(UploadPetImageRequest $request, int $petId)
    {
        $imagePath = $request->file('image')->getPathname();
        $success = $this->petService->uploadImage($petId, $imagePath);
        return response()->json(['success' => $success]);
    }

    public function deletePet(int $petId)
    {
        $success = $this->petService->deletePet($petId);
        return response()->json(['success' => $success]);
    }
}
