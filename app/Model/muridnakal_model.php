<?php

namespace dfdiag\Belajar\PHP\MVC\Model;
use PDO; 
use PDOException; 

class muridnakal_model{
   
private \PDO $conn;
    public function __construct(\PDO $conn) {
        $this->conn = $conn;
    }

    public function getmuridnakal()
    {
        try {
            $query = "SELECT m.noinduk, m.nama AS nama_murid, m.kelas, p.nama AS nama_pelanggaran, p.nilai_poin, pm.id_pelanggaran_murid
            FROM murids m
            JOIN murid_nakal pm ON m.noinduk = pm.noinduk
            JOIN pelanggaran p ON pm.id_pelanggaran = p.id_pelanggaran";
            $statement = $this->conn->query($query);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle error, for example, log or throw an exception
            echo "Error: " . $e->getMessage();
        }
    }
    
  

    public function hapusMuridnakal($id_pelanggaran_murid)
    {
        try {
            $query = "DELETE FROM murid_nakal WHERE id_pelanggaran_murid = :id_pelanggaran_murid";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_pelanggaran_murid', $id_pelanggaran_murid);
            $stmt->execute();
    
            if ($stmt->errorInfo()[0] != '00000') {
                die('Error executing statement: ' . implode(' ', $stmt->errorInfo()));
            }
    
            $stmt->closeCursor();
    
            return $stmt->rowCount();
        } catch (PDOException $e) {
            // Handle error, for example, log or throw an exception
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function getDaftarPelanggaran()
    {
        try {
            $query = "SELECT id_pelanggaran,nilai_poin, nama FROM pelanggaran";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
    
            // Check if any rows are returned
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            } else {
                return [];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return [];
    }
    
    public function tambahmuridnakal($data)
    {
        try {
            $query = "INSERT INTO murid_nakal (noinduk, id_pelanggaran) VALUES (:noinduk, :no_pelanggaran)";
            $stmt = $this->conn->prepare($query);
    
            if (!$stmt) {
                die('Error preparing statement: ' . $this->conn->error);
            }
    
            $stmt->bindParam(':noinduk', $data['noinduk']);
            $stmt->bindParam(':no_pelanggaran', $data['id_pelanggaran']); // Sesuaikan dengan nama kolom di database
            $stmt->execute();
    
            if ($stmt->errorInfo()[0] != '00000') {
                die('Error executing statement: ' . implode(' ', $stmt->errorInfo()));
            }
    
            $stmt->closeCursor();
    
            return $stmt->rowCount();
        } catch (PDOException $e) {
            // Handle error, for example, log or throw an exception
            echo "Error: " . $e->getMessage();
        }
    }
    
    
}
?>
