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
    }
    
    public function loginuser()
    {
        View::render('user/login',
         [
            "title" => 'Data Semua Murid',
            "dataGuru" => ""
        ]);

        try {
            if ($_POST['noinduk'] == "" || $_POST['password'] == "") {
                throw new ValidationException("Field harus di isi");
            }
            $row = $this->login->login($_POST['noinduk'], $_POST['noinduk']);
            if (!$row) {
                throw new ValidationException("NIP atau password salah");
            }
            session_start();
            $_SESSION['status_login'] = true;
            $_SESSION['noinduk'] = $row['noinduk'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            if($row['role'] == 'admin'){
                View::redirect("/admin/data_murid");
            }else if($row["role"] == "guru"){
                View::redirect("/admin/data_murid");
            }
        } catch (\Throwable $th) {
            View::render("login", ["error" => $th->getMessage()]);
        }
    }
    

}