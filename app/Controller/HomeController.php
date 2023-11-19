<?php

namespace dfdiag\Belajar\PHP\MVC\Controller;

use dfdiag\Belajar\PHP\MVC\App\View;

class HomeController
{

    function index()
    {
      View::render('Home/index', [
          "title" => "Login Semada"               
          ]);
    }

}