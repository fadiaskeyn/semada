<?php
namespace dfdiag\Belajar\PHP\MVC\App{
    function header(string $value)
    {
        echo $value;
    }
}

namespace dfdiag\Belajar\PHP\MVC\Controller {

    use dfdiag\Belajar\PHP\MVC\Config\Database;
    use dfdiag\Belajar\PHP\MVC\Domain\User;
    use dfdiag\Belajar\PHP\MVC\Repository\UserRepository;
    use PHPUnit\Framework\TestCase;

    class UserControllerTest extends TestCase
    {
        private UserController $userController;
        private  UserRepository $userRepository;
        protected function setUp() :void
        {
            $this->userController = new UserController();

            $this->userRepository = new UserRepository(Database::getConnection());
            $this->userRepository->deleteAll();

            putenv("mode=test");
        }

        public function testRegister()
        {
            $this->userController->register();

            $this->expectOutputRegex("[Register]");
            $this->expectOutputRegex("[id]");
            $this->expectOutputRegex("[name]");
            $this->expectOutputRegex("[password]");
            $this->expectOutputRegex("[Register new User]");

        }

        public function testPostRegisterSuccess()
        {
            $_POST['id'] = '1';
            $_POST['name'] = 'Kurniawan';
            $_POST['password'] = 'acikiwir';

            $this->userController->postRegister();

            $this->expectOutputRegex("[Location: /users/login]");
        }


        public function testPostRegisterValidationError()
        {

            $_POST['id'] = '';
            $_POST['name'] = 'Kurniawan';
            $_POST['password'] = 'acikiwir';

            $this->userController->postRegister();

            $this->expectOutputRegex("[Register]");
            $this->expectOutputRegex("[id]");
            $this->expectOutputRegex("[name]");
            $this->expectOutputRegex("[password]");
            $this->expectOutputRegex("[Register new User]");
            $this->expectOutputRegex("[id,nama,password tidak boleh kosong]");
        }

        public function testRegisterDuplicate()
        {
            $user = new User();
            $user->id = 'Hr';
            $user->nama = 'heru';
            $user->password = 'acikiwir';

            $this->userRepository->save($user);

            $_POST['id'] = 'Hr';
            $_POST['name'] = 'heru';
            $_POST['password'] = 'acikiwir';

            $this->userController->postRegister();

            $this->expectOutputRegex("[Register]");
            $this->expectOutputRegex("[id]");
            $this->expectOutputRegex("[name]");
            $this->expectOutputRegex("[password]");
            $this->expectOutputRegex("[Register new User]");
            $this->expectOutputRegex("[User id sudah digunakan]");

        }

        public function  testLogin()
        {
            $this->userController->login();
            $this->expectOutputRegex("[Login user]");
            $this->expectOutputRegex("[id]");
            $this->expectOutputRegex("[name]");
            $this->expectOutputRegex("[password]");
        }

        public function  testLoginSuccess()
        {
            $user = new User();
            $user->id = 'Kr';
            $user->nama = 'Kurniawan';
            $user->password = password_hash('Kr',PASSWORD_BCRYPT);
            $this->userRepository->save($user);

            $_POST['id'] = 'Kr';
            $_POST['password']= 'Kr';
            $this->userController->postLogin();

            $this->expectOutputRegex('[Location: /]');

        }

        public function testLoginValidationError()
        {
            $_POST['id'] = '';
            $_POST['name'] = 'Kurniawan';
            $_POST['password'] = 'acikiwir';

            $this->userController->postLogin();

            $this->expectOutputRegex("[Login user]");
            $this->expectOutputRegex("[id]");
            $this->expectOutputRegex("[password]");
            $this->expectOutputRegex("[id atau password tidak boleh kosong]");
        }

        public function testLoginNotFound()
        {
            $_POST['id'] = '404';
            $_POST['password'] = 'notfound';

            $this->userController->postLogin();

            $this->expectOutputRegex("[Login user]");
            $this->expectOutputRegex("[id]");
            $this->expectOutputRegex("[password]");
            $this->expectOutputRegex("[id atau password salah]");
        }

        public function testLoginWrongPassword()
        {
            $user = new User();
            $user->id = 'Kr';
            $user->nama = 'Kurniawan';
            $user->password = password_hash('Kr',PASSWORD_BCRYPT);
            $this->userRepository->save($user);

            $_POST['id'] = 'Kr';
            $_POST['name'] = 'Kurniawan';
            $_POST['password'] = 'wrong';

            $this->userController->postLogin();

            $this->expectOutputRegex("[Login user]");
            $this->expectOutputRegex("[id]");
            $this->expectOutputRegex("[password]");
            $this->expectOutputRegex("[id atau password salah]");
        }


    }

}
