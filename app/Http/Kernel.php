<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The global HTTP middleware stack for the application.
     *
     * These middleware are executed for every incoming request to the application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class, // Middleware for trusting host headers
        \App\Http\Middleware\TrustProxies::class, // Middleware for handling proxy headers
        \Illuminate\Http\Middleware\HandleCors::class, // Middleware for Cross-Origin Resource Sharing (CORS)
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class, // Middleware to prevent requests during maintenance mode
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class, // Middleware to validate the size of POST requests
        \App\Http\Middleware\TrimStrings::class, // Middleware to trim whitespace from string input
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class, // Middleware to convert empty strings to null
    ];

    /**
     * The middleware groups for routing within the application.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class, // Middleware to encrypt cookies
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, // Middleware to add queued cookies to the response
            \Illuminate\Session\Middleware\StartSession::class, // Middleware to initiate session handling
            \Illuminate\View\Middleware\ShareErrorsFromSession::class, // Middleware to share validation errors from the session
            \App\Http\Middleware\VerifyCsrfToken::class, // Middleware to verify CSRF tokens
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Middleware to substitute route bindings
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, // Middleware for stateful requests in Sanctum
            \Illuminate\Routing\Middleware\ThrottleRequests::class . ':api', // Middleware to throttle API requests
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Middleware to substitute route bindings for APIs
        ],
    ];

    /**
     * The aliases for middleware in the application.
     *
     * Aliases allow for convenient assignment of middleware to routes and groups.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [
        'auth' => \App\Http\Middleware\Authenticate::class, // Middleware to authenticate users
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class, // Middleware for basic authentication
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class, // Middleware to authenticate sessions
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class, // Middleware to set caching headers
        'can' => \Illuminate\Auth\Middleware\Authorize::class, // Middleware to authorize user actions
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class, // Middleware to redirect authenticated users
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class, // Middleware to require password confirmation
        'signed' => \App\Http\Middleware\ValidateSignature::class, // Middleware to validate signed requests
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class, // Middleware to throttle requests
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class, // Middleware to ensure email is verified
    ];
}
