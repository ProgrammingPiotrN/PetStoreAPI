<?php

namespace App\Exceptions;

use Exception;

class InvalidPetDataException extends Exception
{
    protected $message = 'Dane zwierzęcia są niepoprawne lub niepełne.';
}
