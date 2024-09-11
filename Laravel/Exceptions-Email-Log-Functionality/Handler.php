<?php

namespace App\Exceptions;

use Throwable;
use App\Mail\ExceptionMail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            $this->sendMail($e);
        });
    }

    private function sendMail(Throwable $e)
    {       
        try {
            // Define the specific error string to check
            $specificErrorStart = 'Expected response code "250/251/252"';
            $specificErrorStartTwo = 'FileNotFoundException';
            Log::info("that error message is: " . $e->getMessage());
            // Check if the error message starts with the specific string
            if ((strpos($e->getMessage(), $specificErrorStart) !== 0) && (strpos($e->getMessage(), $specificErrorStartTwo) !== 0)) {
                Mail::mailer('second_smtp')
                // ->subject("Mariner Museum Error Report")
                ->to('support@techark.com')->send(new ExceptionMail($e));                
            }

        } catch (\Throwable $th) {
            Log::info($th->getMessage());
        }
    }
}
