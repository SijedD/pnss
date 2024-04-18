<?php

namespace Controller;

use Illuminate\Support\Str;
use Model\Post;
use Src\Auth\Auth;
use Src\Request;
use Src\View;


class Api
{
    public function index(): void
    {
        $posts = Post::all()->toArray();

        (new View())->toJSON($posts);
    }

    public function echo(Request $request): void
    {
        (new View())->toJSON($request->all());
    }

    public function login(Request $request)
    {
        $credentials = $request->all();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = Str::random(60);

            $user->api_token = hash('sha256', $token); //хеш-сумма
            $user->save();

            (new View())->toJSON(['token' => $token], 200);
        }

        (new View())->toJSON(['message' => 'Unauthorized'], 401);
    }
}

//{
 //   "login" : "123",
 //   "password": "123"

//}