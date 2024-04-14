<?php

use Src\Route;

Route::add('GET', '/', [Controller\Site::class, 'hello'])
    ->middleware('auth','admin');
Route::add('GET', '/admin',[Controller\Site::class, 'admin'])
    ->middleware('admin');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup'])
    ->middleware('auth','admin');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/sis', [Controller\Site::class, 'sis'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/add', [Controller\Site::class, 'add']);
Route::add(['GET', 'POST'], '/addRoom', [Controller\Site::class, 'addRoom']);
Route::add(['GET', 'POST'], '/addNumber', [Controller\Site::class, 'addNumber']);
Route::add(['GET', 'POST'], '/AttachAbonent', [Controller\Site::class, 'AttachAbonent']);
Route::add('GET', '/searchAbonent', [Controller\Site::class, 'searchAbonent']);
Route::add('GET', '/searchNumber', [Controller\Site::class, 'searchNumber']);
Route::add('GET', '/CountingNumber', [Controller\Site::class, 'CountingNumber']);
Route::add(['GET', 'POST'], '/upload', [Controller\Site::class, 'upload']);