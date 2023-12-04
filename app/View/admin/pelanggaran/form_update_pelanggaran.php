<?php if (!empty($model["dataPelanggaran"])): ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-primary my-5">
                <div class="card-header bg-success">
                    <h3 class="card-title text-light">Form Update Data Pelanggaran</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="quickForm" action="/admin/pelanggaran/edit" method="post">
                    <?php foreach ($model["dataPelanggaran"] as $dataPelanggaran): ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($dataPelanggaran['nama']) ? $dataPelanggaran['nama'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="nilai" class="form-label">Nilai Poin:</label>
                            <input type="text" class="form-control" id="nilai" name="nilai" value="<?= isset($dataPelanggaran['nilai_poin']) ? $dataPelanggaran['nilai_poin'] : '' ?>">
                        </div>
                        <!-- /.card-body -->
                        <?php endforeach ?>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
