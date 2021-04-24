<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->is('admin/*')) {
                return route('admin.login');
            } elseif ($request->is('editor/*')) {
                return route('editor.login');
            } elseif ($request->is('guide/*')) {
                return route('guide.login');
            } elseif ($request->is('tourist/*')) {
                return route('tourist.login');
            } else {
                return Route('welcome');
            }
        }
    }
}
