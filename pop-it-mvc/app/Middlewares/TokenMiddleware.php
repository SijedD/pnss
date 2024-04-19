<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class TokenMiddleware
{
    public function handle(Request $request): void
    {
        if (!Auth::checkToken()) app()->route->redirect('/sis');
    }
}