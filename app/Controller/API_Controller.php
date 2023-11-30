<?php
namespace dfdiag\Belajar\PHP\MVC\Controller;


use Couchbase\ViewMetaData;
use dfdiag\Belajar\PHP\MVC\App\View;
use dfdiag\Belajar\PHP\MVC\Config\Database;
use dfdiag\Belajar\PHP\MVC\Exception\ValidationException;
use dfdiag\Belajar\PHP\MVC\Model\muridnakal_model;
use dfdiag\Belajar\PHP\MVC\Model\UserLoginRequest;
use dfdiag\Belajar\PHP\MVC\Model\muridnakal_modelmodel;
use dfdiag\Belajar\PHP\MVC\Model\API_model;
use dfdiag\Belajar\PHP\MVC\Model\UserRegisterRequest;
use dfdiag\Belajar\PHP\MVC\Repository\UserRepository;
use dfdiag\Belajar\PHP\MVC\Service\UserService;
class API_Controller
{
    private $API_model;

    public function __construct($conn)
    {
        $this->API_model = new API_model($conn);
    }

    public function apiLogin()
    {
        try {
            $jsonData = file_get_contents("php://input");
            $data = json_decode($jsonData, true);

            $row = $this->login->login($data['email'], $data['password']);
            if ($row) {
                $createToken = $this->token->createToken($row['userId']);
                if ($createToken) {
                    http_response_code(201);
                    $result = array(
                        "status" => "success",
                        "response" => 201
                    );
                }
            } else {
                http_response_code(404);
                $result = array(
                    "status" => "Failed",
                    "response" => 404
                );
            }
            echo json_encode($result);
        } catch (ValidationException $e) {
            http_response_code(404);
            $result = array(
                "status" => "Failed",
                "response" => 404,
                "message" => $e->getMessage()
            );
        }
    }

// public function login()
// {
//     $jsonData = file_get_contents("php://input");
//     $data = json_decode($jsonData, true);

//     // Panggil model untuk memeriksa login
//     $conn = Database::getConnection();
//     $muridnakalModel = new API_model($conn);
//     $dataMurid = $muridnakalModel->loginmurid($username, $password);

//     // Encode data ke format JSON
//     $jsonResponse = json_encode($dataMurid);

//     // Set header untuk menunjukkan bahwa response adalah JSON
//     header('Content-Type: application/json');

//     // Mengembalikan response JSON
//     echo $jsonResponse;
// }



    public function formmelanggar($noinduk)
    {
        $conn = Database::getConnection();
        $muridnakalModel = new muridnakal_model($conn);
        $dataPelanggaran = $muridnakalModel->getDaftarPelanggaran(); 
        View::render('admin/murid/murid_melanggar', [
            "title" => 'Tambah Murid yang Melanggar',
            "dataPelanggaran" => $dataPelanggaran,
            "noinduk" => $noinduk,
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