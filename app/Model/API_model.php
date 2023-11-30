<?php

namespace dfdiag\Belajar\PHP\MVC\Model;
use PDO; 
use PDOException; 
class API_model{
    private \PDO $conn;
    

    public function __construct($conn)
    {
        $conn = Database::getConnection();
        $this->conn = $conn;
    }

    public function loginapi(string $noinduk, string $password)
    {
        $statement = $this->conn->prepare("SELECT * FROM murids WHERE noinduk = ? AND password = ?");
        $statement->execute([$noinduk, $password]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    
//     public function loginmurid($noinduk, $password)
// {
//     // Retrieve POST data
//     $username = isset($_GET['username']) ? $_GET['username'] : null;
//     $password = isset($_GET['password']) ? $_GET['password'] : null;

//     // Check if username and password are provided
//     if ($username != null && $password != null) {
//         // SQL query to check if the user exists using prepared statement
//         $sql = "SELECT * FROM murids WHERE noinduk = '$username' AND password = '$password'";
        
//         // Assuming $conn is your database connection object
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param('ss', $username, $password);
//         $stmt->execute();
//         $result = $stmt->get_result();

//         // Debugging: Print the received data
//         var_dump($noinduk, $password, $result);

//         if ($result->num_rows > 0) {
//             // User exists, login successful
//             $row = $result->fetch_assoc();
//             $response = array(
//                 'success' => true,
//                 'message' => 'Login Berhasil',
//                 'username' => $row['noinduk'],
//                 'name' => $row['nama'],
//                 'kelas' => $row['kelas']
//             );
//         } else {
//             // User does not exist or incorrect credentials
//             $response = array('success' => false, 'message' => 'NIS atau Password salah');
//         }
        
//         // Close the prepared statement
//         $stmt->close();
//     } else {
//         // Username or password not provided
//         $response = array('success' => false, 'message' => 'Username and password are required');
//     }

//     // Return the response
//     return $response;
// }


    
    
  
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
