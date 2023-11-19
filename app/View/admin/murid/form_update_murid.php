<?php if (!empty($model["dataMurid"])): ?>
    
    <form class="col-md-6" action="/admin/data_murid/edit" method="post">
        <?php foreach ($model["dataMurid"] as $dataMurid): ?>
            <div class="mb-3 mt-3">
                <label for="absen" class="form-label">Absen:</label>
                <input type="text" class="form-control" id="absen" name="absen" value="<?= isset($dataMurid['absen']) ? $dataMurid['absen'] : '' ?>">
            </div>
            <div class="mb-3">
                <label for="noinduk" class="form-label">NIS:</label>
                <input type="text" class="form-control" id="noinduk" name="noinduk" value="<?= isset($dataMurid['noinduk']) ? $dataMurid['noinduk'] : '' ?>">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <input type="text" class="form-control" id="gender" name="gender" value="<?= isset($dataMurid['gender']) ? $dataMurid['gender'] : '' ?>">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($dataMurid['nama']) ? $dataMurid['nama'] : '' ?>">
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas:</label>
                <input type="text" class="form-control" id="kelas" name="kelas" value="<?= isset($dataMurid['kelas']) ? $dataMurid['kelas'] : '' ?>">
            </div>
            <?php endforeach ?>
 

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php endif ?>
