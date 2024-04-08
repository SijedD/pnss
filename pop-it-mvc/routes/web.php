<?php

use mvc\core\Src\Route;

Route::add('go', [mvc\app\Controller\Site::class, 'index']);
Route::add('hello', [mvc\app\Controller\Site::class, 'hello']);
