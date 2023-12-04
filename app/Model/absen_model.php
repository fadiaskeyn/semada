<?php

namespace dfdiag\Belajar\PHP\MVC\Model;
namespace dfdiag\Belajar\PHP\MVC\Model\murid_model;

use PDO;
use PDOException;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Storage;

class absen_model
{
    private $database;
    private $conn;

    public function __construct()
    {
        // Konfigurasi Firebase
        $serviceAccount = ServiceAccount::fromJsonFile(DIR . '../../../../asset/semada.json');

        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();

        $this->database = $firebase->getDatabase();

        // Konfigurasi database MySQL
        $this->conn = new PDO("mysql:host=localhost:3306;dbname=semada2", "root", "");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAbsensiData($userId)
    {
        // Ambil data absensi dari Firebase
        $absensiDataFirebase = $this->database->getReference("absen/{$userId}")->getValue();

        // Ambil data absensi dari MySQL
        $sql = "SELECT bukti FROM absen WHERE noinduk = :noinduk";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':noinduk', $userId, PDO::PARAM_STR);
            $stmt->execute();

            $bukti = $stmt->fetchColumn();

            // Gabungkan data absensi dari Firebase dan MySQL
            $absensiData = array_merge($absensiDataFirebase, ['bukti' => $bukti]);

            return $absensiData;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return null;
    }

    public function getAbsensiDataWithImageAndDetails($userId)
    {
        // $absensiData = $this->getAbsensiData($userId);

        // Tambahkan kode untuk mengambil data detail
        $muridData = $this->murid_model->getMuridById($userId);

        // Gabungkan data detail ke data absensi
        $absensiData['noinduk'] = $muridData['noinduk'];
        $absensiData['nama'] = $muridData['nama'];
        $absensiData['kelas'] = $muridData['kelas'];
        $absensiData['status'] = $muridData['status'];

        return $absensiData;
    }
}

