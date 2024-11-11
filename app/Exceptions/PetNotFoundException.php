<?php

namespace App\Exceptions;

use Exception;

class PetNotFoundException extends Exception
{
    protected $message = 'Nie znaleziono zwierzęcia o podanym ID.';
}
