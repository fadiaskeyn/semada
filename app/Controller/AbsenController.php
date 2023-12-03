<?php

namespace dfdiag\Belajar\PHP\MVC\Controller;

use dfdiag\Belajar\PHP\MVC\App\View;
use dfdiag\Belajar\PHP\MVC\Model\AbsensiModel;

class AbsenController {
    private $absensiModel;

    public function __construct() {
        $this->absensiModel = new AbsensiModel();
    }

    public function showAbsensi($userId) {
        $absensiData = $this->absen_model->getAbsensiData($userId);
    
        // Load view dan kirim data absensi
        View::render('admin/absen_murid', [
            'absensiData' => $absensiData
        ]);
    }

    public function submitAbsensi($userId, $absensiData) {
        $this->absensiModel->setAbsensiData($userId, $absensiData);
    
        // Redirect atau berikan respons sesuai kebutuhan
    }
}
