<?php

require '../vendor/autoload.php';
// require '../vendor';
use Google\Cloud\Core\ExponentialBackoff;
use Google\Cloud\Storage\StorageClient;

// Ganti path ke file JSON service account Anda
$serviceAccountPath = 'semada.json';

// Ganti dengan nama bucket Anda
$bucketName = 'gs://semada-48ad2.appspot.comx';

// Ganti dengan path gambar di Firebase Storage
$imagePath = 'gs://semada-48ad2.appspot.com/images/image_1701371591448.jpg';

$storage = new StorageClient([
    'keyFilePath' => $serviceAccountPath,
]);

$bucket = $storage->bucket($bucketName);

// Dapatkan URL unduhan gambar
$imageObject = $bucket->object($imagePath);
$imageUrl = $imageObject->signedUrl(new \DateTime('2030-12-31'));

echo 'URL Gambar: ' . $imageUrl;
