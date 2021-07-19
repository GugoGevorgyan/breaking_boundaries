<?php

namespace App\Exceptions;

use App\Response\APIResponse;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

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
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param Throwable $exception
     * @return void
     *
     * @throws \Exception|Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param    $request
     * @param Throwable $exception
     * @return Response|JsonResponse
     *
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($request->header('accept') === 'application/json') {
            return $this->customApiResponse($exception);
        } else {
            return parent::render($request, $exception);
        }
    }

    /**
     * @param Throwable $exception
     * @return JsonResponse
     */
    private function customApiResponse(Throwable $exception): JsonResponse
    {
        $exceptionName = get_class($exception);

        switch ($exceptionName) {
            case ValidationException::class:
                $response['message'] = trans("errors.".getClassName($exception));
                $response['errors'] = $exception->errors();
                $response['status'] = Response::HTTP_UNPROCESSABLE_ENTITY;
                break;
            case UnauthorizedException::class:
                $response['message'] = trans("errors.".getClassName($exception));
                $response['status'] = Response::HTTP_FORBIDDEN;
                break;
            case ModelNotFoundException::class:
            case NotFoundHttpException::class:
                $response['message'] = trans("errors.".getClassName($exception));
                $response['status'] = Response::HTTP_NOT_FOUND;
                break;
            case MethodNotAllowedHttpException::class:
                $response['message'] = trans("errors.".getClassName($exception));
                $response['status'] = Response::HTTP_METHOD_NOT_ALLOWED;
                break;
            case InvalidArgumentException::class:
            case ImageException::class:
                $response['message'] = trans("errors.".getClassName($exception));
                $response['status'] = Response::HTTP_BAD_REQUEST;
                break;
            case LoginException::class:
            case ClientException::class:
                $response['message'] = trans("errors.".getClassName($exception));
                $response['status'] = $exception->getCode();
                break;
            default:
                $response['message'] =  trans("errors.default");
                $response['status'] = Response::HTTP_INTERNAL_SERVER_ERROR;
                break;
        }
        if (config(  'app.debug')) {
            $response['message'] = empty($exception->getMessage()) ? $response['message'] : $exception->getMessage() ;
        }

        return APIResponse::errorResponse($response, $response['message'], $response['status']);
    }
}
