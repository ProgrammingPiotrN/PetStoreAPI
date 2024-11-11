<?php

namespace App\Exceptions;

use Exception;

class ImageUploadException extends Exception
{
    protected $message = 'Nie udało się przesłać obrazu.';
}
