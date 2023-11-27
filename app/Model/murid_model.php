<?php

namespace dfdiag\Belajar\PHP\MVC\Model;
use PDO; 
use PDOException; 

class murid_model{
   
private \PDO $conn;
    public function __construct(\PDO $conn) {
        $this->conn = $conn;
    }

    public function tampilkanmurid()
    {
        try {
            $query = "SELECT absen, noinduk, gender, nama, kelas FROM murids";
            $statement = $this->conn->query($query);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle error, for example, log or throw an exception
            echo "Error: " . $e->getMessage();
        }
    }
    
  
    public function tambah($data) {
        $query = "INSERT INTO murids (absen, noinduk, gender, nama, kelas, password) 
                  VALUES (:absen, :noinduk, :gender, :nama, :kelas, :password)";
        $stmt = $this->conn->prepare($query);
    
        if (!$stmt) {
            die('Error preparing statement: ' . $this->conn->error);
        }
        $stmt->bindParam(':absen', $data['absen']);
        $stmt->bindParam(':noinduk', $data['noinduk']); 
        $stmt->bindParam(':gender', $data['gender']);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':kelas', $data['kelas']);
        $stmt->bindParam(':password', $data['password']); 
    
        $stmt->execute();
    
        if ($stmt->errorInfo()[0] != '00000') {
            die('Error executing statement: ' . implode(' ', $stmt->errorInfo()));
        }
    
        $stmt->closeCursor(); 
    
        return $stmt->rowCount(); 
    }
    
public function getMuridById($noinduk)
{
    try {
        $query = "SELECT absen, noinduk, gender, nama, kelas FROM murids WHERE noinduk = :noinduk";
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

    

    public function updateMurid($data)
    {
        try {
            $query = "UPDATE murids SET absen = :absen, gender = :gender, nama = :nama, kelas = :kelas WHERE noinduk = :noinduk";
            $stmt = $this->conn->prepare($query);

            if (!$stmt) {
                die('Error preparing statement: ' . $this->conn->error);
            }

            $stmt->bindParam(':absen', $data['absen']);
            $stmt->bindParam(':noinduk', $data['noinduk']);
            $stmt->bindParam(':gender', $data['gender']);
            $stmt->bindParam(':nama', $data['nama']);
            $stmt->bindParam(':kelas', $data['kelas']);

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
        $query = "DELETE FROM murids WHERE noinduk = :noinduk";
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

public function getDaftarPelanggaran()
{
    try {
        $query = "SELECT nilai_poin, nama FROM pelanggaran";
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



    
}
?>
