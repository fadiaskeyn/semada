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
  <h2> TOLONGA TEMPIKNYA </h2>
  <br>            
  <a href="data_murid/tambah" class="btn btn-primary">Tambah Data</a>

  <table class="table table-bordered" name="tabelmurid">
    <thead>
        <tr>
            <th>Absen</th>
            <th>NIS</th>
            <th>Gender</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
  <?php if(!empty($model["dataMurid"])) : ?>
            <?php foreach( $model["dataMurid"] as $murid) : ?>
                <tr>
                    <td><?= $murid['absen'] ?></td>
                    <td><?= $murid['noinduk'] ?></td>
                    <td><?= $murid['gender'] ?></td>
                    <td><?= $murid['nama'] ?></td>
                    <td><?= $murid['kelas'] ?></td>
                    <td>
                    <a href="data_murid/edit/<?= $murid['noinduk'] ?>">Edit</a>
                    <a href="/admin/data_murid/hapus/<?= $murid['noinduk'] ?>" onclick="konfirmasiHapus()">Hapus</a>
                    <a href="/admin/data_murid/melanggar/<?= $murid['noinduk'] ?>">Melanggar</a>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
     <?php endif; ?>
    </tbody>
</table>


</div>

</body>
</html>
