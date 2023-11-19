<?php

namespace dfdiag\Belajar\PHP\MVC\Model;
use PDO; 
use PDOException; 

class guru_model{
   
private \PDO $conn;
    public function __construct(\PDO $conn) {
        $this->conn = $conn;
    }

    public function tampilkanguru()
    {
        try {
            $query = "SELECT noinduk, nama, jabatan, alamat, gender FROM guru";
            $statement = $this->conn->query($query);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle error, for example, log or throw an exception
            echo "Error: " . $e->getMessage();
        }
    }
    
  
    public function tambah($data) {
        $query = "INSERT INTO guru (noinduk, nama, jabatan, alamat, gender, password) 
                  VALUES (:noinduk, :nama, :jabatan, :alamat, :gender, :password)";
        $stmt = $this->conn->prepare($query);
    
        if (!$stmt) {
            die('Error preparing statement: ' . $this->conn->error);
        }
        $stmt->bindParam(':noinduk', $data['noinduk']);
        $stmt->bindParam(':nama', $data['nama']); 
        $stmt->bindParam(':jabatan', $data['jabatan']);
        $stmt->bindParam(':alamat', $data['alamat']);
        $stmt->bindParam(':gender', $data['gender']);
        $stmt->bindParam(':password', $data['password']); 
    
        $stmt->execute();
    
        if ($stmt->errorInfo()[0] != '00000') {
            die('Error executing statement: ' . implode(' ', $stmt->errorInfo()));
        }
    
        $stmt->closeCursor(); 
    
        return $stmt->rowCount(); 
    }
    
public function getGuruById($noinduk)
{
    try {
        $query = "SELECT noinduk, nama, jabatan, alamat, gender FROM guru WHERE noinduk = :noinduk";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':noinduk', $noinduk);
        $stmt->execute();

        // Check if any rows are returned
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        } else {
            echo "No record found for noinduk: $noinduk";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    return null;
}

    

    public function updateGuru($data)
    {
        try {
            $query = "UPDATE guru SET noinduk = :noinduk, nama = :nama, jabatan = :jabatan, alamat = :alamat, gender = :gender WHERE noinduk = :noinduk";
            $stmt = $this->conn->prepare($query);

            if (!$stmt) {
                die('Error preparing statement: ' . $this->conn->error);
            }

            $stmt->bindParam(':noinduk', $data['noinduk']);
            $stmt->bindParam(':nama', $data['nama']);
            $stmt->bindParam(':jabatan', $data['jabatan']);
            $stmt->bindParam(':alamat', $data['alamat']);
            $stmt->bindParam(':gender', $data['gender']);

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

public function hapusGuru($noinduk)
{
    try {
        $query = "DELETE FROM guru WHERE noinduk = :noinduk";
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
