<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof HttpExceptionInterface) {
            $status = $exception->getStatusCode();

            if (view()->exists("errors.{$status}")) {
                return response()->view("errors.{$status}", ['exception' => $exception], $status);
            }
        }

        return parent::render($request, $exception);
    }
}
