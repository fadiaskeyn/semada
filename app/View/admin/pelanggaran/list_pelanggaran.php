<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2> Pelanggaran </h2>
  <br>            
  <a href="pelanggaran/tambah" class="btn btn-primary">Tambah Data</a>

  <table class="table table-bordered" name="tabelmurid">
    <thead>
        <tr>
            <th style="display:none">ID Pelanggaran</th>
            <th>Nama Pelanggaran</th>
            <th>Nilai Bobot</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
  <?php if(!empty($model["dataPelanggaran"])) : ?>
            <?php foreach( $model["dataPelanggaran"] as $pelanggaran) : ?>
                <tr>
                    <td style="display:none"><?= $pelanggaran['id_pelanggaran'] ?></td>
                    <td><?= $pelanggaran['nama'] ?></td>
                    <td><?= $pelanggaran['nilai_poin'] ?></td>
                    <td>
                    <a href="pelanggaran/edit/<?= $pelanggaran['id_pelanggaran'] ?>">Edit</a>
                    <a href="/admin/data_murid/hapus/<?= $pelanggaran['id_pelanggaran'] ?>" onclick="konfirmasiHapus()">Hapus</a>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
     <?php endif; ?>
    </tbody>
</table>


</div>

</body>
</html>
