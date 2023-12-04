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
  <h2> Data Guru </h2>
  <br>            
  <a href="data_guru/tambah" class="btn btn-primary">Tambah Data</a>

  <table class="table table-bordered" name="tabelmurid">
    <thead>
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Alamat</th>
            <th>Kelamin</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
  <?php if(!empty($model["dataGuru"])) : ?>
            <?php foreach( $model["dataGuru"] as $guru) : ?>
                <tr>
                    <td><?= $guru['noinduk'] ?></td>
                    <td><?= $guru['nama'] ?></td>
                    <td></td>
                    <td><?= $guru['alamat'] ?></td>
                    <td><?= $guru['gender'] ?></td>
                    <td>
                    <a href="/admin/data_guru/edit/<?= $guru['noinduk'] ?>">Edit</a>
                    <a href="/admin/data_guru/hapus/<?= $guru['noinduk'] ?>" onclick="konfirmasiHapus()">Hapus</a>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
     <?php endif; ?>
    </tbody>
</table>


</div>

</body>
</html>
