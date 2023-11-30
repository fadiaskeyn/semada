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
        // Sesuaikan dengan struktur dan nama tabel pada database Anda
        $sql = "SELECT * FROM staff WHERE noinduk = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $noinduk, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Sesuaikan dengan struktur kolom pada tabel guru di database Anda
        $row = $result->fetch_assoc();

        return $row;
    }
}
