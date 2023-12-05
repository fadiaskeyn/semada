<?php if (!empty($model["dataPelanggaran"])): ?>
<?php if (!empty($model["noinduk"])): ?>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card card-primary my-5">
<div class="card-header bg-success">
    <h3 class="card-title text-light">Form pelanggaran</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<form class="quickForm" action="/admin/data_murid/melanggar" method="post">
    <div class="card-body">
        <div class="form-group">
            <select name="pilihlanggaran" id="pilihlanggaran" class="form-select">
                <optgroup>
                    <option value="Pilih Pelanggaran" selected disabled>Pilih Pelanggaran</option>
                    <?php foreach ($model["dataPelanggaran"] as $dataPelanggaran): ?>
                    <option value="<?= isset($dataPelanggaran['nama']) ? $dataPelanggaran['nama'] : '' ?>"
                        data-id-pelanggaran="<?= isset($dataPelanggaran['id_pelanggaran']) ? $dataPelanggaran['id_pelanggaran'] : '' ?>"
                        data-nilai-poin="<?= isset($dataPelanggaran['nilai_poin']) ? $dataPelanggaran['nilai_poin'] : '' ?>">
                        <?= isset($dataPelanggaran['nama']) ? $dataPelanggaran['nama'] : '' ?>
                    </option>

                    <?php endforeach; ?>
                </optgroup>
            </select>

        </div>
        <div class="form-group">
            <label for="pwd" id="nilaiPoinLabel" class="form-label">
                <?= isset($model["dataPelanggaran"]['nilai_poin']) ? $model["dataPelanggaran"]['nilai_poin'] : '' ?>
            </label>
        </div>

        <div class="form-group">
            <label for="noinduk" class="form-label" style="display:none">NIS:</label>
            <input type="text" class="form-control" id="noinduk" name="noinduk" value="<?php echo ($model["noinduk"]) ?>" style="display:none">
        </div>
        <div class="form-group" >
            <label for="no_pelanggaran" class="form-label" style="display:none">ID Pelanggaran:</label>
            <input style="display:none" type="text" class="form-control" id="no_pelanggaran" name="no_pelanggaran" value="">
        </div>

    </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>

<script>
// Store the initial pelanggaran data
var initialPelanggaranData = <?= json_encode($model["dataPelanggaran"]) ?>;

// Add an event listener to the dropdown
document.getElementById('pilihlanggaran').addEventListener('change', function () {
    // Get the selected option
    var selectedOption = this.options[this.selectedIndex];

    // Update the label with style="display:none" value from the selected option
    document.getElementById('nilaiPoinLabel').innerText = selectedOption.getAttribute('data-nilai-poin');

    // Update the value of no_pelanggaran
    document.getElementById('no_pelanggaran').value = selectedOption.getAttribute('data-id-pelanggaran');
});
</script>

<?php endif ?>
<?php endif ?>
