<?php

declare(strict_types=1);

namespace App\Http\Controllers\Concerns;

use App\Http\Responses\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

/**
 * Provides standardized exception handling with logging for controllers.
 * Also includes standardized response methods for common redirect patterns.
 */
trait HandlesControllerExceptions
{
    /**
     * Handle an exception with logging and return appropriate JSON response.
     *
     * @param  array<string, mixed>  $context
     */
    protected function handleApiException(
        \Throwable $exception,
        string $message,
        array $context = [],
        ?string $level = 'error'
    ): JsonResponse {
        Log::{$level}($message, array_merge($context, [
            'error' => $exception->getMessage(),
            'trace' => $exception->getTraceAsString(),
        ]));

        return ApiResponse::serverError($message, $exception->getMessage());
    }

    /**
     * Handle an exception with logging and return redirect response with error flash.
     *
     * @param  array<string, mixed>  $context
     */
    protected function handleWebException(
        \Throwable $exception,
        string $redirectRoute,
        string $message,
        array $context = [],
        ?array $routeParams = [],
        ?string $level = 'error'
    ): RedirectResponse {
        Log::{$level}($message, array_merge($context, [
            'error' => $exception->getMessage(),
            'trace' => $exception->getTraceAsString(),
        ]));

        return redirect()
            ->route($redirectRoute, $routeParams)
            ->with('error', $message.': '.$exception->getMessage());
    }

    /**
     * Return a success response that redirects back.
     */
    protected function successResponse(string $message): RedirectResponse
    {
        return redirect()
            ->back()
            ->with('success', $message);
    }

    /**
     * Return an error response that redirects back.
     */
    protected function errorResponse(string $message): RedirectResponse
    {
        return redirect()
            ->back()
            ->with('error', $message);
    }

    /**
     * Return a success response that redirects to a named route.
     *
     * @param  array<int|string, mixed>  $params
     */
    protected function successRedirect(string $route, string $message, array $params = []): RedirectResponse
    {
        return redirect()
            ->route($route, $params)
            ->with('success', $message);
    }

    /**
     * Return an error response that redirects to a named route.
     *
     * @param  array<int|string, mixed>  $params
     */
    protected function errorRedirect(string $route, string $message, array $params = []): RedirectResponse
    {
        return redirect()
            ->route($route, $params)
            ->with('error', $message);
    }
}
