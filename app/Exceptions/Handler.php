<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * @param $request
     * @param Throwable $e
     * @return JsonResponse|Response|\Symfony\Component\HttpFoundation\Response
     * @throws Throwable
     */
    public function render($request, Throwable $e): Response|JsonResponse|\Symfony\Component\HttpFoundation\Response
    {
        // Grab the HTTP status code from the Exception, or default response of 400
        $statusCode = $this->isHttpException($e) ? $e->getStatusCode() : 400;

        // If is validation exception and json request
        if ($e instanceof ValidationException && $request->wantsJson())
        {
            // Apply pluralization
            $messages = $e->validator->errors()->all();
            $message = array_shift($messages);
            if ($additional = count($messages)) {
                $pluralized = $additional === 1 ? __('erro') : __('erros');
                $message .= __(" (e +:additional :pluralized)", compact('additional', 'pluralized'));
            }
            // Send pluralized message with errors
            return response()->json(['error' => $message, 'errors' => $e->errors()], $statusCode);
        }

        if ($e instanceof ModelNotFoundException) {
            return response()->json(['error' => 'Recurso deletado ou inexistente.'], 404);
        }

        // Default to the parent handler class implementation
        return parent::render($request, $e);
    }
}