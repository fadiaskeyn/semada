<?php

namespace dfdiag\Belajar\PHP\MVC\Model;
use PDO; 
use PDOException; 

class pelanggaran_model{
   
private \PDO $conn;
    public function __construct(\PDO $conn) {
        $this->conn = $conn;
    }

    public function tampilpelanggaran()
    {
        try {
            $query = "SELECT id_pelanggaran, nama, nilai_poin FROM pelanggaran";
            $statement = $this->conn->query($query);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle error, for example, log or throw an exception
            echo "Error: " . $e->getMessage();
        }
    }
    
  
    public function tambah($data) {
        $query = "INSERT INTO pelanggaran ( id_pelanggaran, nama, nilai_poin) 
                  VALUES (:idpel, :nama, :nilai)";
        $stmt = $this->conn->prepare($query);
    
        if (!$stmt) {
            die('Error preparing statement: ' . $this->conn->error);
        }
        $stmt->bindParam(':idpel', $data['id_pelanggaran']);
        $stmt->bindParam(':nama', $data['nama']); 
        $stmt->bindParam(':nilai', $data['nilai_poin']); 
        $stmt->execute();
    
        if ($stmt->errorInfo()[0] != '00000') {
            die('Error executing statement: ' . implode(' ', $stmt->errorInfo()));
        }
    
        $stmt->closeCursor(); 
    
        return $stmt->rowCount(); 
    }
    
public function getPelanggaranById($no)
{
    try {
        $query = "SELECT id_pelanggaran, nama, nilai_poin FROM pelanggaran WHERE id_pelanggaran = :no";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':no', $no);
        $stmt->execute();

        // Check if any rows are returned
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        } else {
            echo "No record found for noinduk: $no";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    return null;
}

    

    public function updatePelanggaran($data)
    {
        try {
            $query = "UPDATE pelanggaran SET id_pelanggaran = :no, nama = :nama, nilai_poin = :nilai WHERE id_pelanggaran = :no";
            $stmt = $this->conn->prepare($query);

            if (!$stmt) {
                die('Error preparing statement: ' . $this->conn->error);
            }

            $stmt->bindParam(':no', $data['id_pelanggaran']);
            $stmt->bindParam(':nama', $data['nama']);
            $stmt->bindParam(':nilai', $data['nilai_poin']);
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

public function hapusMurid($noinduk)
{
    try {
        $query = "DELETE FROM muridtes WHERE noinduk = :noinduk";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':noinduk', $noinduk);
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
