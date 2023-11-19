<?php

namespace dfdiag\Belajar\PHP\MVC\Controller;

use Couchbase\ViewMetaData;
use dfdiag\Belajar\PHP\MVC\App\View;
use dfdiag\Belajar\PHP\MVC\Config\Database;
use dfdiag\Belajar\PHP\MVC\Exception\ValidationException;
use dfdiag\Belajar\PHP\MVC\Model\UserLoginRequest;
use dfdiag\Belajar\PHP\MVC\Model\datamurid;
use dfdiag\Belajar\PHP\MVC\Model\UserRegisterRequest;
use dfdiag\Belajar\PHP\MVC\Repository\UserRepository;
use dfdiag\Belajar\PHP\MVC\Service\UserService;

class UserController
{
    private UserService $userService;
    public function __construct()
    {
        $connection = Database::getConnection();
        $userRepository = new UserRepository($connection);
        $this->userService = new UserService($userRepository);
        $this->model = $model;

    }

    public function register()
    {
        View::render('User/register',[
            "title" =>'Register new User'
        ]);
    }

    public function postRegister()
    {
        $request = new UserRegisterRequest();
        $request -> id = $_POST['id'];
        $request -> nama = $_POST['name'];
        $request -> password = $_POST['password'];
        try {
            $this->userService->register($request);
            View::redirect("/users/login");
        }catch (ValidationException $exception)
        {
            View::render('User/register',[
                "title" =>'Register new User',
                "error" => $exception->getMessage()
            ]);
        }
    }
    public function  login()
    {
        View::render('User/login',[
            "title" => 'Login user'
        ]);
    }

    public function postLogin()
    {
        $request = new UserLoginRequest();
        $request->id = $_POST['id'];
        $request->password = $_POST['password'];

        try {
            $this->userService->login($request);
            View::redirect('/');
        }catch (ValidationException $exception) {
            View::render('User/login',[
                "title" =>'Login user',
            "error" => $exception->getMessage()
            ]);
        }
    }


    
}