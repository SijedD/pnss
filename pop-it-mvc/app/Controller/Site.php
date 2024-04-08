<?php

namespace pnss\pop-it-mvc\app\Controller;

use mvc\app\Model\Post;
use mvc\core\Src\View;

class Site
{
   public function index(): string
   {
       $posts = Post::all();
       return (new View())->render('site.post', ['posts' => $posts]);
   }

   public function hello(): string
   {
       return new View('site.hello', ['message' => 'hello working']);
   }
}
