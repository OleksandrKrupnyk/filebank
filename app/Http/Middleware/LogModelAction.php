<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use JsonException;
use Log;
use Symfony\Component\HttpFoundation\Response;

class LogModelAction
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response
     * @throws JsonException
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $action =app('request')->route()->action;
        Log::info(json_encode($action, JSON_THROW_ON_ERROR));

        return $response;
    }
}
