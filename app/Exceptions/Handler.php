<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Handle unauthenticated users based on guard
     */
    //protected function unauthenticated($request, AuthenticationException $exception)
   // {
        //$guard = data_get($exception->guards(), 0);

        //switch ($guard) {
            //case 'admin':
                //$route = 'admin.login';
                //break;

            //case 'seller':
               // $route = 'seller.login';
               // break;

            //case 'customer':
               // $route = 'user.login';
               // break;

           // default:
               // $route = 'user.login';
              //  break;
        //}

        //return $request->expectsJson()
          //  ? response()->json(['message' => 'Unauthenticated.'], 401)
            //: redirect()->guest(route($route));
   // }

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
