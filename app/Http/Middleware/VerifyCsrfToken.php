<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    // Override methods or $except array
    protected $except = [
        '*',
    ];

    // Example: override tokensMatch if you need custom validation
    // protected function tokensMatch($request)
    // {
    //     // your custom logic here
    // }
}
