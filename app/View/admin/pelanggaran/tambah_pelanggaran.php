<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card card-primary my-5">
        <div class="card-header bg-success">
          <h3 class="card-title text-light">Form Tambah Data Pelanggaran</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="quickForm" action="/admin/tambahpelanggaran" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="nama" class="form-label">Nama  </label>
              <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group my-4">
              <label for="nilai" class="form-label">Nilai Bobot  </label>
              <input type="text" class="form-control" id="nilai" name="nilai">
            </div>
          </div>
          <div class="card-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
