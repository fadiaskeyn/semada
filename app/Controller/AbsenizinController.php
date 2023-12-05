<?php
namespace dfdiag\Belajar\PHP\MVC\Controller;


use Couchbase\ViewMetaData;
use dfdiag\Belajar\PHP\MVC\App\View;
use dfdiag\Belajar\PHP\MVC\Config\Database;
use dfdiag\Belajar\PHP\MVC\Exception\ValidationException;
use dfdiag\Belajar\PHP\MVC\Model\UserLoginRequest;
use dfdiag\Belajar\PHP\MVC\Model\murid_model;
use dfdiag\Belajar\PHP\MVC\Model\guru_model;
use dfdiag\Belajar\PHP\MVC\Model\absen_model;
use dfdiag\Belajar\PHP\MVC\Model\UserRegisterRequest;
use dfdiag\Belajar\PHP\MVC\Repository\UserRepository;
use dfdiag\Belajar\PHP\MVC\Service\UserService;


class AbsenizinController{

    private $absen;
public function __construct(){
    $conn = Database::getConnection();
    $this->absen = new absen_model($conn);
}
public function tampilkanabsen()
    {
        $conn = Database::getConnection();
        $absenModel = new absen_model($conn);
        $dataAbsen = $absenModel->tampilkanabsen();
        View::render('admin/absen/absen_murid',
         [
            "title" => 'Data Absensi Murid',
            "dataAbsen" => $dataAbsen
        ]);
        // return view(admin.data_murid', ['dataMurid' => $dataMurid]);
    }

}
