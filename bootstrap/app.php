<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $exception, $request) {
            $status = method_exists($exception, 'getStatusCode')
                ? $exception->getStatusCode()
                : 500;

            if ($exception instanceof ValidationException) {
                return response()->json([
                    'message' => 'Validation error',
                    'details' => $exception->errors(),
                ], 400);
            }

            if($status == 404) {
                return response()->json([
                    'message'=> 'Resource not found',
                ],404);
            }

            return response()->json([
                'message' => $exception->getMessage() ?: 'Server error',
            ], $status);
        });
    })->create();
