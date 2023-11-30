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
    public function login()
    {
        try {
            if ($_POST['email'] == "" || $_POST['password'] == "") {
                throw new ValidationException("Field harus di isi");
            }
            $row = $this->login->login($_POST['email'], $_POST['password']);
            if (!$row) {
                throw new ValidationException("Username dan password salah");
            }
            session_start();
            $_SESSION['status_login'] = true;
            $_SESSION['uid_user'] = $row['userId'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['level'] = $row['level'];
            if($row['level'] == 'admin'){
                View::redirect("/admin/dashboard");
            }else if($row["level"] == "customer" || $row["level"] == "agen"){
                View::redirect("/");
            }
        } catch (\Throwable $th) {
            View::render("login", ["error" => $th->getMessage()]);
        }
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