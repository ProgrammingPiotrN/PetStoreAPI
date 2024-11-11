<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PetController;

Route::get('/', [PetController::class, 'index'])->name('layouts.welcome');

// Pet routes
Route::get('/pets', [PetController::class, 'indexPet'])->name('pets.add');
Route::post('/pets/add', [PetController::class, 'addPet'])->name('pets.create');
Route::put('/pets/{petId}', [PetController::class, 'updatePet'])->name('pets.update');
Route::get('/pets/status/{status}', [PetController::class, 'findByStatus'])->name('pets.status');
Route::get('/pets/tags', [PetController::class, 'findByTags'])->name('pets.tags');
Route::get('/pets/{petId}', [PetController::class, 'findPetById'])->name('pets.show');
Route::post('/pets/{petId}/upload-image', [PetController::class, 'uploadImage'])->name('pets.uploadImage');
Route::delete('/pets/{petId}', [PetController::class, 'deletePet'])->name('pets.delete');
