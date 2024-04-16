<?php

namespace Controller;


use search\SubscriberSearch;
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
            $data = $request->all();
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'surname' => ['required'],
                'patronymic' => ['required'],
                'date' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);
            if ($validator->fails()) {
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            $image_path = $_FILES['image_path']['name'];
            $target_dir = __DIR__ . '/../../public/img/';
            $target_file = $target_dir . basename($image_path);
            $fileName = $_FILES['image_path']['name'];
            if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)){

                if (User::create([
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'patronymic' => $data['patronymic'],
                    'date' => $data['date'],
                    'login' => $data['login'],
                    'password' => $data['password'],
                    'image_path' => $fileName
                ])) {
                    app()->route->redirect('/');
                }};

        }

        return new View('site.signup');
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

    public function admin(): string
    {
        return new View('site.AdminPage');
    }

    public function sis(): string
    {
        return new View('site.SisAdminPage');
    }

    public function add($request): string
    {


        if ($request->method === 'POST') {
            $divisions = Division::all();
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
                return new View('site.AddNewAbonent',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'divisions' => $divisions]);
            }
            if (Subscriber::create($request->all())) {
                app()->route->redirect('/sis');
            }
        }

        $divisions = Division::all();
        return new View('site.AddNewAbonent', ['divisions' => $divisions]);
    }

    public function addRoom($request): string
    {
        $divisions = Division::all();
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'room_name_number' => ['required'],
                'room_type' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);
            if ($validator->fails()) {
                return new View('site.AddRoom',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'divisions' => $divisions]);
            }
            if (Room::create($request->all())) {
                app()->route->redirect('/sis');
            }
        }
        $divisions = Division::all();

        return new View('site.addRoom', ['divisions' => $divisions]);
    }

    public function addNumber($request): string
    {
        $divisions = Room::all();
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'phone_number' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);
            if ($validator->fails()) {
                return new View('site.AddNumber',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'divisions' => $divisions]);
            }
            if (Phone::create($request->all())) {
                app()->route->redirect('/sis');
            }
        }
        $divisions = Room::all();

        return new View('site.addNumber', ['divisions' => $divisions]);
    }

    public function AttachAbonent($request): string
    {

        if ($request->method === 'POST') {
            $divisions = Subscriber::all();
            $phone = Phone::all();
            $validator = new Validator($request->all(), [
                'id_phone' => ['required','unique:phone_numbers,id_phone']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);
            if ($validator->fails()) {
                return new View('site.AttachAbonent',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE),'divisions' => $divisions, 'phone' => $phone]);
            }


        if(Phone_number::create($request->all())) {
            app()->route->redirect('/sis');
        }

        }
        $divisions = Subscriber::all();
        $phone = Phone::all();

        return new View('site.AttachAbonent', ['divisions' => $divisions, 'phone' => $phone]);
    }

    public function searchAbonent($request): string
    {
        $subscribers = Subscriber::all();
        $divisions = Division::all();
        $id = $request->get('id');

        if ($request->method === 'POST') {
            $subscriber = Subscriber::find($request->get('subscriberId'));
            $divisionId = Division::find($request->get('divisionsId'))->id;

            $phones = $subscriber->phones()->whereHas('room', function ($query) use ($divisionId) {
               $query->where('id_divisions', $divisionId);
            })->get();

            if (!is_null($subscriber->phones())) {
                return (new View())->render('site.searchAbonent', ['subscribers' => $subscribers, 'divisions' => $divisions, 'findAbonent' => $phones]);
            }

        }



        return (new View())->render('site.searchAbonent', ['subscribers' => $subscribers, 'divisions' => $divisions]);


    }


    public function searchNumber($request): string
    {
        $subscribers = Subscriber::all();
        $name = $request->get('name');
        $surname = $request->get('surname');
        $patronymic = $request->get('patronymic');
        $findAbonent = Subscriber::whereHas('phoneNumber', function ($query) use ($name, $surname, $patronymic) {
            $query->where('name', 'like', "%{$name}%")
                ->where('surname', 'like', "%{$surname}%")
                ->where('patronymic', 'like', "%{$patronymic}%");
        })->with('phoneNumber.phone')->get();
        return new View('site.searchNumber', ['subscribers' => $subscribers, 'findAbonent' => $findAbonent]);
    }

    public function CountingNumber($request): string
    {
        // Получаем ID подразделения из запроса
        $divisionId = $request->get('Id_divisions');
        // Находим количество абонентов в выбранном подразделении
        $countAbonents = Subscriber::where('Id_divisions', $divisionId)->count();
        // Получаем все подразделения для отображения в выпадающем списке
        $divisions = Division::all();

        $id_rooms = $request->get('id_rooms');
        $countAbonentsroom = Subscriber::where('id_rooms', $id_rooms)->count();
        $rooms = Room::all();
        // Передаем данные в представление
        return (new View())->render('site.CountingNumber', [
            'countAbonents' => $countAbonents,
            'divisions' => $divisions, 'rooms' => $rooms, 'countAbonentsroom' => $countAbonentsroom
        ]);
    }

    public function addDivisions($request):string{
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'type_division' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);
            if ($validator->fails()) {
                return new View('site.addDivisions',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (Division::create($request->all())) {
                app()->route->redirect('/sis');
            }
        }

        return new View('site.addDivisions');
    }

    public function upload(Request $request)
    {
        if ($request->method === 'POST') {
            $image_path = $_FILES['image_path']['name'];
            $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/pnss/pop-it-mvc/images/";
            $target_file = $target_dir . basename($image_path);

            // Переместить загруженный файл в целевую директорию
            move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file);

            User::create([
            'image_path' => $target_file // Сохраняем путь к изображению в базе данных
            ]);}
            var_dump ($_FILES['image_path']['name']);
            return new View( 'site.SisAdminPage');

    }

    public function SearchUser(Request $request): string
    {
        $subscriber = Subscriber::all();

        if ($request->method === 'POST' && isset($_POST['search_query'])) {
            $search_query = $_POST['search_query'];
            if (!empty($search_query)) {
                $subscriber = SubscriberSearch::search(Subscriber::query(), $search_query);
            }
        }

        return new View('site.SearchUser', ['subscriber' => $subscriber]);


    }

}



