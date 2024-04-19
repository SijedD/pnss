<?php

namespace Controller;

use Illuminate\Support\Str;
use Model\Post;
use Model\Subscriber;
use Src\Auth\Auth;
use Src\Request;
use Src\Validator\Validator;
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

            $user->api_token = hash('md5', $token); //хеш-сумма
            $user->save();

            (new View())->toJSON(['token' => $token], 200);
        }

        (new View())->toJSON(['message' => 'Unauthorized'], 401);
    }

    public function addUser(Request $request)
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'surname' => ['required'],
                'patronymic' => ['required'],
                'date_birth' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);
            if ($validator->fails()) {
                (new View())->toJSON(['message' => $validator->errors()], 422);
            }
            $subscriber = Subscriber::create($request->all());
            if ($subscriber) {
                (new View())->toJSON(['message' => "user add"], 200);
            }
        }
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->api_token = '';
        $user->save();
        (new View())->toJSON(['message' => 'successful'], 200);
    }
}
