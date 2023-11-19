<?php
namespace dfdiag\Belajar\PHP\MVC\Controller;


use Couchbase\ViewMetaData;
use dfdiag\Belajar\PHP\MVC\App\View;
use dfdiag\Belajar\PHP\MVC\Config\Database;
use dfdiag\Belajar\PHP\MVC\Exception\ValidationException;
use dfdiag\Belajar\PHP\MVC\Model\UserLoginRequest;
use dfdiag\Belajar\PHP\MVC\Model\murid_model;
use dfdiag\Belajar\PHP\MVC\Model\guru_model;
use dfdiag\Belajar\PHP\MVC\Model\UserRegisterRequest;
use dfdiag\Belajar\PHP\MVC\Repository\UserRepository;
use dfdiag\Belajar\PHP\MVC\Service\UserService;


class guruController{

    private $murid;
public function __construct(){
    $conn = Database::getConnection();
    $this->guru = new guru_model($conn);
}
public function getguru()
    {
        $conn = Database::getConnection();
        $guruModel = new guru_model($conn);
        $dataGuru = $guruModel->tampilkanguru();
        View::render('admin/guru/data_guru',
         [
            "title" => 'Data Semua Murid',
            "dataGuru" => $dataGuru
        ]);
        // return view(admin.data_murid', ['dataMurid' => $dataMurid]);
    }

    public function formtambahguru()
    {
        View::render('admin/guru/form_tambah_data_guru',[
            "title" => 'Form Tambah Guru'
        ]);
    }

    public function tambahguru()
    {
            // // Inisialisasi koneksi database
            // $db = new Database();
            // $conn = $db->getConnection();
            $conn = Database::getConnection();
            $this->guru = new guru_model($conn);
    
            // // Inisialisasi model dengan objek koneksi database
            // $muridModel = new MuridModel($conn);
    
            // Mendapatkan data dari formulir atau input pengguna
            $data = [
                'noinduk'  => $_POST['noinduk'],
                'nama' => $_POST['nama'],
                'jabatan' => $_POST['jabatan'],
                'alamat'   => $_POST['alamat'],
                'gender'  => $_POST['gender'],
                'password' => $_POST['password'],
            ];
    
            // Memanggil fungsi tambah di dalam model
            $this->guru->tambah($data);
    
            // Mengecek hasil eksekusi
            if ($data > 0) {
                echo "Data berhasil ditambahkan!";
            } else {
                echo "Gagal menambahkan data.";
            }
        
    }
   public function formupdateguru($noinduk)
{
    $conn = Database::getConnection();
    $guruModel = new guru_model($conn);
    $dataGuru = $guruModel->getGuruById($noinduk);

    View::render('admin/guru/form_update_guru', [
        "title" => 'Perbarui Data Guru',
        "dataGuru" => $dataGuru,
    ]);
}

    

    
    public function updateGuru()
    {
        // Tangkap data yang dikirimkan dari formulir edit
        $data = [
            'noinduk' => $_POST['noinduk'],
            'nama' => $_POST['nama'],
            'jabatan' => $_POST['jabatan'],
            'alamat' => $_POST['alamat'],
            'gender' => $_POST['gender'],
        ];
    
        // Panggil model untuk melakukan update
        $conn = Database::getConnection();
        $guruModel = new guru_model($conn);
        $result = $guruModel->updateGuru($data);
    
        // Tampilkan pesan berhasil atau gagal
        if ($result > 0) {
            echo "Data Guru berhasil diupdate.";
        } else {
            echo "Gagal mengupdate data Guru.";
        }
    }

    public function hapusGuru($noinduk)
    {
        $conn = Database::getConnection();
        $guruModel = new guru_model($conn);
        $result = $guruModel->hapusGuru($noinduk);
    
        // Tampilkan pesan berhasil atau gagal
        if ($result > 0) {
            echo "Data Guru berhasil dihapus.";
        } else {
            echo "Gagal menghapus data Guru.";
        }
    }
    
    

}