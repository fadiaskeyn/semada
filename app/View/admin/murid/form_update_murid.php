<?php if (!empty($model["dataMurid"])): ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card card-primary my-5">
        <div class="card-header bg-success">
          <h3 class="card-title text-light">Form Update Data Murid</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
    <form class="quickForm" action="/admin/data_murid/edit" method="post">
    <div class="card-body">
        <?php foreach ($model["dataMurid"] as $dataMurid): ?>
        <div class="form-group">
            <label for="absen" class="form-label">Absen:</label>
            <input type="text" class="form-control" id="absen" name="absen" value="<?= isset($dataMurid['absen']) ? $dataMurid['absen'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="noinduk" class="form-label">NIS:</label>
            <input type="text" class="form-control" id="noinduk" name="noinduk" value="<?= isset($dataMurid['noinduk']) ? $dataMurid['noinduk'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="gender" class="form-label">Gender:</label>
            <input type="text" class="form-control" id="gender" name="gender" value="<?= isset($dataMurid['gender']) ? $dataMurid['gender'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($dataMurid['nama']) ? $dataMurid['nama'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="kelas" class="form-label">Kelas:</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="<?= isset($dataMurid['kelas']) ? $dataMurid['kelas'] : '' ?>">
        </div>
        <?php endforeach ?>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
</form>
<?php endif ?>
