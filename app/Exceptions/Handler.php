<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
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
        'new_password',
        'password_confirmation',
        'new_password_confirmation',
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

     $this->renderable(function (AuthenticationException $e, $request){
          /** @var \Illuminate\Http\Request $request */
          if ($request->expectsJson()) {
               return response()->json(['message' => 'Unauthorized - Token is missing or invalid'], 401);
          }
   
          return redirect()->guest(route('login'));
     });

	$this->renderable(function (NotFoundHttpException $e, $request) {
	     if ($request->is('api/*')) {
		return response()->json([
		     'message' => 'Record not found'
		], 404);
	     }
	});

	$this->renderable(function (ValidationException $e, $request) {
	     if ($request->is('api/*')) {
		return response()->json([
		     'message' => $e->getMessage(),
		     'errors' => $e->errors(),
		], 422);
	     }
	});
    }
}
