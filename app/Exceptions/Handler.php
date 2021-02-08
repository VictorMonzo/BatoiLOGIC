<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Throwable $exception) {
            if (request()->is('api*'))
            {
                if ($exception instanceof ModelNotFoundException)
                    return response()->json(['error' => 'Recurso no encontrado'],404);
                elseif ($exception instanceof AuthenticationException)
                    return response()->json(['error' => 'Usuario no autenticado'], 401); //aqui
                else if ($exception instanceof ValidationException)
                    return response()->json(['error' => 'Datos no válidos: '.$exception->getMessage()],400);
                else if ($exception instanceof QueryException)
                    return response()->json(['error'=> 'SQL no válido: '.$exception->getMessage()], 400); //aqui
                else if (isset($exception))
                    return response()->json(['error' => 'Error: ' .$exception->getMessage()], 500);
            }
        });
    }
}
