<?php

namespace dfdiag\Belajar\PHP\MVC\Controller;

use Couchbase\ViewMetaData;
use dfdiag\Belajar\PHP\MVC\App\View;
use dfdiag\Belajar\PHP\MVC\Config\Database;
use dfdiag\Belajar\PHP\MVC\Exception\ValidationException;
use dfdiag\Belajar\PHP\MVC\Model\UserLoginRequest;
use dfdiag\Belajar\PHP\MVC\Model\datamurid;
use dfdiag\Belajar\PHP\MVC\Model\UserModel;
use dfdiag\Belajar\PHP\MVC\Model\UserRegisterRequest;
use dfdiag\Belajar\PHP\MVC\Repository\UserRepository;
use dfdiag\Belajar\PHP\MVC\Service\UserService;
class UserController
{
    public function showLoginForm()
    {
        // Menampilkan formulir login
        View::render('user/login', [
            "title" => 'Login',
        ]);
    }

    public function loginUser()
    {
        try {
            // Validasi dan penanganan login
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (empty($_POST['noinduk']) || empty($_POST['password'])) {
                    throw new ValidationException("Noinduk dan Password harus diisi.");
                }

                $noinduk = $_POST['noinduk'];
                $password = $_POST['password'];

                $conn = Database::getConnection();
                $userModel = new UserModel($conn);
                $userData = $userModel->login($noinduk, $password);

                if ($userData) {
                    session_start();
                    $_SESSION['status_login'] = true;
                    $_SESSION['noinduk'] = $userData['noinduk'];
                    $_SESSION['role'] = $userData['role'];

                    if ($userData['role'] == 'admin') {
                        View::redirect("/admin/data_guru");
                    }elseif($userData['role'] == 'guru'){
                        View::redirect("/guru/dashboard");
                    }
                } else {
                    throw new ValidationException("Noinduk atau Password salah.");
                }
            }
        } catch (ValidationException $ve) {
            // Tangani kesalahan jika terjadi
            View::render("user/login", ["error" => $ve->getMessage()]);
            
        }
    }
}
