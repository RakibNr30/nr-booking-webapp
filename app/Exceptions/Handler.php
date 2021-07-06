<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception)) {
            $status_code = $exception->getStatusCode();
            if ($status_code == 404) {
                $status = "Oops! page not found!";
                $message = "the page you are looking for does not exist. It might have been moved or deleted. Please go back to home";
                return response()->view('error.index', [
                    'status_code' => $status_code,
                    'status' => $status,
                    'message' => $message
                ]);
            } else if ($status_code == 500) {
                $status = "Oops! internal server error!";
                $message = "something has gone wrong on the web site's server but the server could not be more specific on what the exact problem is";
                return response()->view('error.index', [
                    'status_code' => $status_code,
                    'status' => $status,
                    'message' => $message
                ]);
            } else if ($status_code == 405) {
                $status = "Oops! Method Not Allowed!";
                $message = "The GET method is not supported for this route. Supported method is POST";
                return response()->view('error.index', [
                    'status_code' => $status_code,
                    'status' => $status,
                    'message' => $message
                ]);
            }
            else {
                $status = "Oops! Unknown Error!";
                $message = "";
                return response()->view('error.index', [
                    'status_code' => $status_code,
                    'status' => $status,
                    'message' => $message
                ]);
            }
        }

        return parent::render($request, $exception);
    }
}
