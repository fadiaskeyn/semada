<?php
namespace dfdiag\Belajar\PHP\MVC\Model;

use PDO;
use PDOException;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class AbsensiModel
{
    private $database;
    private \PDO $conn;

    public function __construct()
    {
        // Konfigurasi Firebase
        $this->conn = $conn;
        $serviceAccount = ServiceAccount::fromJsonFile(DIR . '../../../../asset/semada.json');

        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        
        $this->database = $firebase->getDatabase();
    }

    public function getAbsensiData($userId)
    {
        // Ambil data absensi dari Firebase berdasarkan user ID
        // ...

        // For illustration purposes, let's assume you have a MySQL table named 'images'
        // with a column 'filename'. Adjust the SQL query accordingly.
        $sql = "SELECT bukti FROM absen WHERE noinduk = :noinduk";
        
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=semada2", "semada2", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':noinduk', $userId, PDO::PARAM_STR);
            $stmt->execute();

            $filenames = $stmt->fetchAll(PDO::FETCH_COLUMN);

            // Iterate through filenames and fetch image URLs from Firebase Storage
            $imageUrls = [];
            foreach ($filenames as $filename) {
                $imageReference = $this->database->getReference("images/$filename");
                $imageUrl = $imageReference->getValue(); // Assuming the image URL is stored in Firebase
                $imageUrls[] = $imageUrl;
            }

            // Combine image filenames and URLs into an associative array
            $result = array_combine($filenames, $imageUrls);

            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return null;
    }
}