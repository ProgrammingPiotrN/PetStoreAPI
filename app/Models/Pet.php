<?php

namespace App\Models;

class Pet
{
    public int $id;
    public Category $category;
    public string $name;
    public array $photoUrls;
    public array $tags;
    public string $status;

    public function __construct(int $id, Category $category, string $name, array $photoUrls, array $tags, string $status)
    {
        $this->id = $id;
        $this->category = $category;
        $this->name = $name;
        $this->photoUrls = $photoUrls;
        $this->tags = $tags;
        $this->status = $status;
    }
}
