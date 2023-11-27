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
  <table class="table table-bordered" name="tabelmurid">
    <thead>
        <tr>
    <th style="display: none;">ID Pelanggaran Murid: </th>
    <th>NIS: </th>
    <th>Nama: </th>
    <th>Kelas: </th>
    <th>Nama Pelanggaran: </th>
    <th>Poin: </th>
    <th>action: </th>
</tr>

    </thead>
    <tbody>
  <?php if(!empty($model["datamuridnakal"])) : ?>
            <?php foreach( $model["datamuridnakal"] as $muridnakal) : ?>
                <tr>
                    <td style="display: none;"><?= $muridnakal['id_pelanggaran_murid'] ?></td>
                    <td><?= $muridnakal['noinduk'] ?></td>
                    <td><?= $muridnakal['nama_murid'] ?></td>
                    <td><?= $muridnakal['kelas'] ?></td>
                    <td><?= $muridnakal['nama_pelanggaran'] ?></td>
                    <td><?= $muridnakal['nilai_poin'] ?></td>
                    <td>
                        <a href="/admin/murid_nakal/hapus/<?= $muridnakal['id_pelanggaran_murid'] ?>" onclick="konfirmasiHapus()">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
     <?php endif; ?>
    </tbody>
</table>
</div>

</body>
</html>
