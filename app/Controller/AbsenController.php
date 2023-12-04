<?php

namespace dfdiag\Belajar\PHP\MVC\Controller;

use dfdiag\Belajar\PHP\MVC\Model\AbsensiModel;
use dfdiag\Belajar\PHP\MVC\View\AbsensiView;

class AbsenController
{
    private $absensiModel;
    private $absensiView;

    public function __construct()
    {
        $this->absensiModel = new AbsensiModel();
        $this->absensiView = new AbsensiView();
    }

    public function showAbsensi($userId)
    {
        $absensiData = $this->absensiModel->getAbsensiDataWithImageAndDetails($userId);

        // Cek apakah URL gambar ada
        $buktiUrl = $absensiData['buktiUrl'];
        if (empty($buktiUrl)) {
            $buktiUrl = 'tidak_ada_gambar.png'; // Placeholder image
        }

        $this->absensiView->render('admin/absen_murid', [
            'absensiData' => $absensiData
        ]);
    }
}

