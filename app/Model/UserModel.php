<?php
namespace dfdiag\Belajar\PHP\MVC\Model;

use PDO;
use PDOException;

class UserModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function login($noinduk, $password)
    {
        try {
            // Sesuaikan dengan struktur dan nama tabel pada database Anda
            $sql = "SELECT * FROM staff WHERE noinduk = ? AND password = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $noinduk, PDO::PARAM_STR);
            $stmt->bindParam(2, $password, PDO::PARAM_STR);
            
            $stmt->execute();

            // Sesuaikan dengan struktur kolom pada tabel guru di database Anda
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        } catch (PDOException $e) {
            // Handle error jika terjadi
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
