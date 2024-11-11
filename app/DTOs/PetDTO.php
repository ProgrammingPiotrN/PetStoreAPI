<?php

namespace App\DTOs;

enum PetStatus: string
{
    case Available = 'available';
    case Pending = 'pending';
    case Sold = 'sold';
}

class PetDTO
{
    public int $id;
    public CategoryDTO $category;
    public string $name;
    public array $photoUrls;
    public array $tags;
    public PetStatus $status;

    public function __construct(int $id, CategoryDTO $category, string $name, array $photoUrls, array $tags, PetStatus $status)
    {
        $this->id = $id;
        $this->category = $category;
        $this->name = $name;
        $this->photoUrls = $photoUrls;
        $this->tags = $tags;
        $this->status = $status;
    }
}
