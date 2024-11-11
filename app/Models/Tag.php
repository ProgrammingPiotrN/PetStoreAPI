<?php

namespace App\Models;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public int $id;
    public string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
