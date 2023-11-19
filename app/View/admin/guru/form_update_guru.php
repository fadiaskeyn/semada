<?php if (!empty($model["dataGuru"])): ?>
    
    <form class="col-md-6" action="/admin/data_guru/edit" method="post">
        <?php foreach ($model["dataGuru"] as $dataGuru): ?>
            <div class="mb-3 mt-3">
                <label for="noinduk" class="form-label">NIP:</label>
                <input type="text" class="form-control" id="noinduk" name="noinduk" value="<?= isset($dataGuru['noinduk']) ? $dataGuru['noinduk'] : '' ?>">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($dataGuru['nama']) ? $dataGuru['nama'] : '' ?>">
            </div>
            <div class="mb-3">
                <label for="Jabatan" class="form-label">Jabatan:</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= isset($dataGuru['jabatan']) ? $dataGuru['jabatan'] : '' ?>">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= isset($dataGuru['alamat']) ? $dataGuru['alamat'] : '' ?>">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <input type="text" class="form-control" id="gender" name="gender" value="<?= isset($dataGuru['gender']) ? $dataGuru['gender'] : '' ?>">
            </div>
            <?php endforeach ?>
 

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php endif ?>
