<?php if (!empty($model["dataGuru"])): ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-primary my-5">
                <div class="card-header bg-success">
                    <h3 class="card-title text-light">Form Update Data Guru</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="quickForm" action="/admin/data_guru/edit" method="post">
                    <div class="card-body">
                        <?php foreach ($model["dataGuru"] as $dataGuru): ?>
                        <div class="form-group">
                            <label for="noinduk" class="form-label">NIP:</label>
                            <input type="text" class="form-control" id="noinduk" name="noinduk" value="<?= isset($dataGuru['noinduk']) ? $dataGuru['noinduk'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($dataGuru['nama']) ? $dataGuru['nama'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="Jabatan" class="form-label">Jabatan:</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= isset($dataGuru['jabatan']) ? $dataGuru['jabatan'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= isset($dataGuru['alamat']) ? $dataGuru['alamat'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="gender" class="form-label">Gender:</label>
                            <input type="text" class="form-control" id="gender" name="gender" value="<?= isset($dataGuru['gender']) ? $dataGuru['gender'] : '' ?>">
                        </div>
                        <?php endforeach ?>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
