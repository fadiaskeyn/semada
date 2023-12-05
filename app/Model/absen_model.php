<?php

namespace dfdiag\Belajar\PHP\MVC\Model;
use PDO; 
use PDOException; 

class absen_model{
   
private \PDO $conn;
    public function __construct(\PDO $conn) {
        $this->conn = $conn;
    }

    public function tampilkanabsen()
    {
        try {
            $query = "SELECT m.noinduk, m.nama, m.kelas, a.status
            FROM murids m 
            JOIN absen a ON m.noinduk = a.noinduk
            WHERE a.status IN ('hadir', 'alpa');
            ";

            $statement = $this->conn->query($query);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle error, for example, log or throw an exception
            echo "Error: " . $e->getMessage();
        }
    }
    
  
   

    
}
?>
