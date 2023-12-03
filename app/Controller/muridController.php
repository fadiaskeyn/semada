<?php
namespace dfdiag\Belajar\PHP\MVC\Controller;


use Couchbase\ViewMetaData;
use dfdiag\Belajar\PHP\MVC\App\View;
use dfdiag\Belajar\PHP\MVC\Config\Database;
use dfdiag\Belajar\PHP\MVC\Exception\ValidationException;
use dfdiag\Belajar\PHP\MVC\Model\UserLoginRequest;
use dfdiag\Belajar\PHP\MVC\Model\murid_model;
use dfdiag\Belajar\PHP\MVC\Model\UserRegisterRequest;
use dfdiag\Belajar\PHP\MVC\Repository\UserRepository;
use dfdiag\Belajar\PHP\MVC\Service\UserService;

class muridController{

    private $murid;
public function __construct(){
    $conn = Database::getConnection();
    $this->murid = new murid_model($conn);
}
public function getmurid()
    {
        $conn = Database::getConnection();
        $muridModel = new murid_model($conn);
        $dataMurid = $muridModel->tampilkanmurid();
        View::render('admin/murid/data_murid',
         [
            "title" => 'Data Semua Murid',
            "dataMurid" => $dataMurid
        ]);
        // return view(admin.data_murid', ['dataMurid' => $dataMurid]);
    }

    public function formtambahmurid()
    {
        View::render('admin/murid/form_tambah_data_murid',[
            "title" => 'Form Tambah Data Murid'
        ]);
    }

    public function tambahmurid()
    {
            // // Inisialisasi koneksi database
            // $db = new Database();
            // $conn = $db->getConnection();
            $conn = Database::getConnection();
            $this->murid = new murid_model($conn);
    
            // // Inisialisasi model dengan objek koneksi database
            // $muridModel = new MuridModel($conn);
    
            // Mendapatkan data dari formulir atau input pengguna
            $data = [
                'absen'  => $_POST['absen'],
                'noinduk' => $_POST['noinduk'],
                'gender' => $_POST['gender'],
                'nama'   => $_POST['nama'],
                'kelas'  => $_POST['kelas'],
                'password'    => $_POST['password'],
            ];
    
            // Memanggil fungsi tambah di dalam model
            $this->murid->tambah($data);
    
            // Mengecek hasil eksekusi
            if ($data > 0) {
                echo "<script>alert('Data Berhasil Tambahkan'); window.location.href='/admin/data_murid';</script>";
            exit;
            } else {
                echo "<script>alert('Data Gagal Dihapus'); window.location.href='/admin/data_murid';</script>";
                exit;
            }
        
    }
   public function formupdatemurid($noinduk)
{
    $conn = Database::getConnection();
    $muridModel = new murid_model($conn);
    $dataMurid = $muridModel->getMuridById($noinduk);

    View::render('admin/murid/data_murid', [
        "title" => 'Perbarui Data Murid',
        "dataMurid" => $dataMurid,
    ]);
}

    

    
    public function updateMurid()
    {
        // Tangkap data yang dikirimkan dari formulir edit
        $data = [
            'absen' => $_POST['absen'],
            'noinduk' => $_POST['noinduk'],
            'gender' => $_POST['gender'],
            'nama' => $_POST['nama'],
            'kelas' => $_POST['kelas'],
            'password' => $_POST['password'],
        ];
    
        // Panggil model untuk melakukan update
        $conn = Database::getConnection();
        $muridModel = new murid_model($conn);
        $result = $muridModel->updateMurid($data);
    
        // Tampilkan pesan berhasil atau gagal
        if ($result > 0) {
            echo "Data murid berhasil diupdate.";
        } else {
            echo "Gagal mengupdate data murid.";
        }
    }

    public function hapusMurid($noinduk)
    {
        $conn = Database::getConnection();
        $muridModel = new murid_model($conn);
        $result = $muridModel->hapusMurid($noinduk);
    
        // Tampilkan pesan berhasil atau gagal
        if ($result > 0) {
            echo "<script>alert('Data Berhasil Dihapus'); window.location.href='/admin/data_murid';</script>";
            exit;
        } else {
            echo "Gagal menghapus data murid.";
        }
    }
    
    
    
    

}