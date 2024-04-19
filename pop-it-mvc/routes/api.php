<?php

use Src\Route;

Route::add('GET', '/', [Controller\Api::class, 'index']);
Route::add('POST', '/echo', [Controller\Api::class, 'echo'])->middleware('token');
Route::add('POST', '/login', [Controller\Api::class, 'login']);
Route::add('POST', '/addUser', [Controller\Api::class, 'addUser']);
Route::add('POST', '/logout', [Controller\Api::class, 'logout']);
