<?php
namespace dfdiag\Belajar\PHP\MVC\Controller;


use Couchbase\ViewMetaData;
use dfdiag\Belajar\PHP\MVC\App\View;
use dfdiag\Belajar\PHP\MVC\Config\Database;
use dfdiag\Belajar\PHP\MVC\Exception\ValidationException;
use dfdiag\Belajar\PHP\MVC\Model\UserLoginRequest;
use dfdiag\Belajar\PHP\MVC\Model\murid_model;
use dfdiag\Belajar\PHP\MVC\Model\pelanggaran_model;
use dfdiag\Belajar\PHP\MVC\Model\UserRegisterRequest;
use dfdiag\Belajar\PHP\MVC\Repository\UserRepository;
use dfdiag\Belajar\PHP\MVC\Service\UserService;

class pelanggaranController{

    private $pelanggaran;
public function __construct(){
    $conn = Database::getConnection();
    $this->pelanggaran = new pelanggaran_model($conn);
}
public function getpelanggaran()
    {
        $conn = Database::getConnection();
        $pelanggaranModel = new pelanggaran_model($conn);
        $dataPelanggaran = $pelanggaranModel->tampilpelanggaran();
        View::render('admin/pelanggaran/list_pelanggaran',
         [
            "title" => 'Daftar dan Jenis Pelanggaran',
            "dataPelanggaran" => $dataPelanggaran
        ]);
        // return view(admin.data_murid', ['dataMurid' => $dataMurid]);
    }

    public function formpelanggaran()
    {
        View::render('admin/pelanggaran/tambah_pelanggaran',[
            "title" => 'Form Tambah Data Jenis Pelanggaran'
        ]);
    }

    public function tambahpelanggaran()
    {
            $conn = Database::getConnection();
            $this->pelanggaran = new pelanggaran_model($conn);
            $data = [
                'id_pelanggaran'  => $_POST['idpel'],
                'nama' => $_POST['nama'],
                'nilai_poin' => $_POST['nilai']
            ];
    
            // Memanggil fungsi tambah di dalam model
            $this->pelanggaran->tambah($data);
    
            // Mengecek hasil eksekusi
            if ($data > 0) {
                echo "Data berhasil ditambahkan!";
            } else {
                echo "Gagal menambahkan data.";
            }
        
    }
   public function formupdatepelanggaran($no)
{
    $conn = Database::getConnection();
    $pelanggaranModel = new pelanggaran_model($conn);
    $dataPelanggaran = $pelanggaranModel->getPelanggaranById($no);

    View::render('admin/pelanggaran/form_update_pelanggaran', [
        "title" => 'Perbarui Jenis Pelanggaran',
        "dataPelanggaran" => $dataPelanggaran,
    ]);
}

    

    
    public function updatepelanggaran()
    {
        // Tangkap data yang dikirimkan dari formulir edit
        $data = [
            'id_pelanggaran' => $_POST['no'],
            'nama' => $_POST['nama'],
            'nilai_poin' => $_POST['nilai']
        ];
    
        // Panggil model untuk melakukan update
        $conn = Database::getConnection();
        $pelanggaranModel = new pelanggaran_model($conn);
        $result = $pelanggaranModel->updatePelanggaran($data);
    
        // Tampilkan pesan berhasil atau gagal
        if ($result > 0) {
            echo "Data murid berhasil diupdate.";
        } else {
            echo "Gagal mengupdate data murid.";
        }
    }

    public function hapusPelanggaran($no)
    {
        $conn = Database::getConnection();
        $pelanggaranModel = new pelanggaran_model($conn);
        $result = $pelanggaranModel->hapusPelanggaran($no);
    
        // Tampilkan pesan berhasil atau gagal
        if ($result > 0) {
            echo "Data murid berhasil dihapus.";
        } else {
            echo "Gagal menghapus data murid.";
        }
    }
    
    

}