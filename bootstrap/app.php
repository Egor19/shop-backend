<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminPanelMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
         // Обработка ошибки 403 (Forbidden)
         $exceptions->render(function (AuthorizationException $e, Request $request) {
            // Возвращаем кастомную страницу ошибки 403
            return response()->view('errors.403', [], Response::HTTP_FORBIDDEN);
        });
        $exceptions->render(function(ModelNotFoundException $e, Request $request){
            return response()->view('errors.404');
        });
    })->create();
