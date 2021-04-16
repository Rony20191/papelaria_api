<?php

namespace App\Exceptions;


use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Throwable;

use Exception;

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
        'current_password',
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


        $this->reportable(function (Throwable $e) {

        });

    }
    public function render($request, Throwable $e)
    {
        $message = '';
        $errors = [];
        $statusCode = null;

        if ($e instanceof UnauthorizedHttpException) {
            $message = $e->getMessage();
            $statusCode = $e->getStatusCode();
        } elseif ($e instanceof UnprocessableEntityHttpException) {
            $message = $e->getMessage();
            $statusCode = $e->getStatusCode();
        }  elseif ($e instanceof ValidationException) {
            $message = $e->getMessage();
            $errors = $e->response['errors'];
            $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY;
        } elseif ($e instanceof NotFoundHttpException) {
            $message = 'Recurso não encontrado';
            $statusCode = Response::HTTP_NOT_FOUND;
        } elseif ($e instanceof Exception) {
            $message = $e->getMessage();
            $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        if (isset($message) || isset($errors) || isset($statusCode)) {
            return response()->json([
                                        'type' => 'error',
                                        'message' => $message,
                                        'data' => [],
                                        'errors' => $errors,
                                        'status' => $statusCode
                                    ], $statusCode);
        }
        return parent::render($request, $e);
    }

}
