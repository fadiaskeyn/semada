<?php

namespace dfdiag\Belajar\PHP\MVC\Model;

use PDO;
use PDOException;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class AbsensiModel
{
    private $database;

    public function __construct()
    {
        // Konfigurasi Firebase
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/../../../../asset/semada.json');

        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        
        $this->database = $firebase->getDatabase();
    }

    public function getAbsensiData($userId)
    {
        // Ambil data absensi dari Firebase berdasarkan user ID
        $absensiReference = $this->database->getReference("absensi/$userId");
        $absensiData = $absensiReference->getValue();

        return $absensiData;
    }

    public function setAbsensiData($userId, $absensiData)
    {
        // Simpan data absensi ke Firebase
        $this->database->getReference("absensi/$userId")->set($absensiData);
    }
}
