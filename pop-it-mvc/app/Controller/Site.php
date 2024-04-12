<?php

namespace Controller;

use Model\Division;
use Model\Phone;
use Model\Phone_number;
use Model\Room;
use Model\Subscriber;
use Src\Request;
use Src\View;
use Model\User;
use Src\Auth\Auth;
use Src\Validator\Validator;


class Site
{
    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/');
            }
        }
        return new View('site.signup');
    }




    public function index(Request $request): string
    {
        $posts = Post::where('id', $request->id)->get();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function hello(): string
    {
        return new View('site.AdminPage');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/admin');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/');
    }

    public function admin(): string {
        return new View('site.AdminPage');
    }
    public function sis(): string {
        return new View('site.SisAdminPage');
    }
    public function add($request): string {
        if ($request->method === 'POST' && Subscriber::create($request->all())) {
            app()->route->redirect('/sis');
        }
        $divisions = Division::all();

        return new View('site.AddNewAbonent', ['divisions' => $divisions]);
    }
    public function addRoom($request): string {
        if ($request->method === 'POST' && Room::create($request->all())) {
            app()->route->redirect('/sis');
        }
        $divisions = Division::all();

        return new View('site.addRoom', ['divisions' => $divisions]);
    }
    public function addNumber($request): string {
        if ($request->method === 'POST' && Phone::create($request->all())) {
            app()->route->redirect('/sis');
        }
        $divisions = Room::all();

        return new View('site.addNumber', ['divisions' => $divisions]);
    }
    public function AttachAbonent($request): string {
        if ($request->method === 'POST' && Phone_number::create($request->all())) {
            app()->route->redirect('/sis');
        }
        $divisions = Subscriber::all();
        $phone = Phone::all();

        return new View('site.AttachAbonent', ['divisions' => $divisions, 'phone'=> $phone] );
    }
    public function searchAbonent($request): string {


            // Получаем значения из запроса
            $phoneNumber = Phone::all();
            $divisions = Subscriber::all();
            $abonent = Division::all();


            // Возвращаем результаты в представление
            return new View('site.searchAbonent',['divisions' => $divisions, 'abonent' =>$abonent, 'phoneNumber'=>$phoneNumber]);

    }
    public function searchNumber(): string {
        return new View('site.searchNumber');
    }
    public function CountingNumber(): string {
        return new View('site.CountingNumber');
    }

}
