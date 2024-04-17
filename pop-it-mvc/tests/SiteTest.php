<?php

use Model\User;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class SiteTest extends TestCase
{

     #[DataProvider('additionProvider')]

    public function testSignup(string $httpMethod, array $userData, string $message): void
    {
        //Выбираем занятый логин из базы данных
        if ($userData['login'] === '123') {
            $userData['login'] = User::get()->first()->login;
        }

        // Создаем заглушку для класса Request.
        $request = $this->createMock(\Src\Request::class);
        // Переопределяем метод all() и свойство method
        $request->expects($this->any())
            ->method('all')
            ->willReturn($userData);
        $request->method = $httpMethod;

        //Сохраняем результат работы метода в переменную
        $result = (new \Controller\Site())->signup($request);

        if (!empty($result)) {
            //Проверяем варианты с ошибками валидации
            $message = '/' . preg_quote($message, '/') . '/';
            $this->expectOutputRegex($message);
            return;
        }

        //Проверяем добавился ли пользователь в базу данных
        $this->assertTrue((bool)User::where('login', $userData['login'])->count());
        //Удаляем созданного пользователя из базы данных
        User::where('login', $userData['login'])->delete();


    }

//Метод, возвращающий набор тестовых данных
    public static function additionProvider(): array
    {
        return [
            ['GET', ['name' => '', 'surname' => '', 'patronymic' => '', 'date' => '', 'login' => '', 'password' => ''],
                '<h3></h3>'
            ],
            ['POST', ['name' => '', 'surname' => '', 'patronymic' => '', 'date' => '', 'login' => '', 'password' => ''],
                '<h3>{"name":["Поле name пусто"],"surname":["Поле surname пусто"],"patronymic":["Поле patronymic пусто"],"date":["Поле date пусто"],"login":["Поле login пусто"],"password":["Поле password пусто"]}</h3>',
            ],
            ['POST', ['name' => '123123', 'surname' => '1233', 'patronymic' => '123', 'date' => '10.20.2023', 'login' => '123', 'password' => '123'],
                '<h3>{"login":["Поле login должно быть уникально"]}</h3>',
            ]
        ];
    }


        #[DataProvider('authProvider')]
    public function testLogin(string $httpMethod, array $userData, string $message): void
    {
        // Создаем заглушку для класса Request.
            $request = $this->createMock(\Src\Request::class);
            // Переопределяем метод all() и свойство method
            $request->expects($this->any())
                ->method('all')
                ->willReturn($userData);
            $request->method = $httpMethod;

            //Сохраняем результат работы метода в переменную
            $result = (new \Controller\Site())->login($request);

            if (!empty($result)) {
                //Проверяем варианты с ошибками валидации
                $message = '/' . preg_quote($message, '/') . '/';
                $this->expectOutputRegex($message);
                return;
            }
    }

    // Метод, возвращающий набор тестовых данных
    public static function authProvider(): array
    {
        return [
            ['GET', ['login' => '', 'password' => ''],
                '<h3></h3>'
            ],
            ['POST', [ 'login' => '12344', 'password' => '1323'],
                '<h3>Неправильные логин или пароль</h3>',
            ]
        ];
    }


    //Настройка конфигурации окружения
    protected function setUp(): void
    {
        //Установка переменной среды
        $_SERVER['DOCUMENT_ROOT'] = 'C:/xampp/htdocs';

   //Создаем экземпляр приложения
   $GLOBALS['app'] = new Src\Application(new Src\Settings([
       'app' => include $_SERVER['DOCUMENT_ROOT'] . '/pnss/pop-it-mvc/config/app.php',
       'db' => include $_SERVER['DOCUMENT_ROOT'] . '/pnss/pop-it-mvc/config/db.php',
       'path' => include $_SERVER['DOCUMENT_ROOT'] . '/pnss/pop-it-mvc/config/path.php',
   ]));

   //Глобальная функция для доступа к объекту приложения
   if (!function_exists('app')) {
       function app()
       {
           return $GLOBALS['app'];
       }
   }
}

}
