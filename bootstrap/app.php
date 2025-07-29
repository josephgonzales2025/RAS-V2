<?php

use App\Contracts\RenderableException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (Throwable $e){
            if ($e instanceof RenderableException)
            {
                return new JsonResponse(
                    $e->getErrorResponse(), 
                    $e->getStatusCode()
                );
            }

            if ($e instanceof ValidationException) {
                return new JsonResponse([
                    'error' => 'Datos inválidos',
                    'message' => 'Por favor verifica los datos enviados.',
                    'validation_errors' => $e->errors()
                ], 422);
            }
        });
    })->create();
