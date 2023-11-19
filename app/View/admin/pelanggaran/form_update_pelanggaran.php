<?php if (!empty($model["dataPelanggaran"])): ?>
    
    <form class="col-md-6" action="/admin/pelanggaran/edit" method="post">
        <?php foreach ($model["dataPelanggaran"] as $dataPelanggaran): ?>
            <div class="mb-3 mt-3">
                <label for="no" class="form-label">No Pelanggaran:</label>
                <input type="text" class="form-control" id="no" name="no" value="<?= isset($dataPelanggaran['id_pelanggaran']) ? $dataPelanggaran['id_pelanggaran'] : '' ?>">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($dataPelanggaran['nama']) ? $dataPelanggaran['nama'] : '' ?>">
            </div>
            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai Poin:</label>
                <input type="text" class="form-control" id="nilai" name="nilai" value="<?= isset($dataPelanggaran['nilai_poin']) ? $dataPelanggaran['nilai_poin'] : '' ?>">
            </div>
            <?php endforeach ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php endif ?>
