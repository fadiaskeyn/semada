<?php
namespace dfdiag\Belajar\PHP\MVC\Controller;


use Couchbase\ViewMetaData;
use dfdiag\Belajar\PHP\MVC\App\View;
use dfdiag\Belajar\PHP\MVC\Config\Database;
use dfdiag\Belajar\PHP\MVC\Exception\ValidationException;
use dfdiag\Belajar\PHP\MVC\Model\muridnakal_model;
use dfdiag\Belajar\PHP\MVC\Model\UserLoginRequest;
use dfdiag\Belajar\PHP\MVC\Model\muridnakal_modelmodel;
use dfdiag\Belajar\PHP\MVC\Model\UserRegisterRequest;
use dfdiag\Belajar\PHP\MVC\Repository\UserRepository;
use dfdiag\Belajar\PHP\MVC\Service\UserService;

class muridnakalController{
    private $pelanggaran;
public function __construct(){
    $conn = Database::getConnection();
    $this->pelanggaran = new muridnakal_model($conn);
}

public function getmuridnakal()
    {
        $conn = Database::getConnection();
        $muridnakalModel = new muridnakal_model($conn);
        $datamuridnakal = $muridnakalModel->getmuridnakal(); 
        View::render('admin/murid_nakal/daftar_murid_nakal',
         [
            "title" => 'Daftar dan Jenis Pelanggaran',
            "datamuridnakal" => $datamuridnakal
        ]);
    }

    public function formmelanggar($noinduk)
    {
        $conn = Database::getConnection();
        $muridnakalModel = new muridnakal_model($conn);
        $dataPelanggaran = $muridnakalModel->getDaftarPelanggaran(); 
        // var_dump($dataPelanggaran);
        View::render('admin/murid/data_murid', [
            "title" => 'Tambah Murid yang Melanggar',
            "dataPelanggaran" => $dataPelanggaran,
            "noinduk" => $noinduk
        ]);
    }
    
    public function tambahmuridnakal()
    {
        // Tangkap data yang dikirimkan dari formulir edit
        $data = [
            'noinduk' => $_POST['noinduk'],
            'id_pelanggaran' => $_POST['no_pelanggaran'],
        ];       
        $conn = Database::getConnection();
        $nakalModel = new muridnakal_model($conn);
        $result = $nakalModel->tambahmuridnakal($data);
    
        // Tampilkan pesan berhasil atau gagal
        if ($result > 0) {
            echo "Data Guru berhasil diupdate.";
        } else {
            echo "Gagal mengupdate data Guru.";
        }
    }
    

}