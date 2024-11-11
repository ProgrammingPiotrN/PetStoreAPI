<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        PetNotFoundException::class,
        InvalidPetDataException::class,
        ImageUploadException::class,
    ];

    public function render($request, Throwable $exception): Response
    {
        if ($exception instanceof PetNotFoundException) {
            return response()->json(['error' => $exception->getMessage()], 404);
        }

        if ($exception instanceof InvalidPetDataException) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }

        if ($exception instanceof ImageUploadException) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }

        return parent::render($request, $exception);
    }
}
