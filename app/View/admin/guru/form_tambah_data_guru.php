<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card card-primary my-5">
        <div class="card-header bg-success">
          <h3 class="card-title text-light">Form Tambah Data Guru</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="quickForm" action="/admin/tambahguru" method="POST">
          <div class="card-body">
            <div class="form-group">
              <label for="email" class="form-label">NIP  </label>
              <input type="text" class="form-control" id=" noinduk" name="noinduk">
            </div>
            <div class="form-group">
              <label for="pwd" class="form-label">Nama  </label>
              <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
              <label for="pwd" class="form-label">Jabatan  </label>
              <input type="text" class="form-control" id="jabatan" name="jabatan">
            </div>
            <div class="form-group">
              <label for="pwd" class="form-label">Alamat  </label>
              <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="form-group">
              <label for="pwd" class="form-label">Gender  </label>
              <input type="text" class="form-control" id="gender" name="gender">
            </div>
            <div class="form-group">
              <label for="pwd" class="form-label"> Level (Pilih Salah Satu) </label>
              <select class="form-control" id="role" name="role">
              <option value="admin">admin</option>
              <option value="guru">guru</option>
              </select>
            </div>
            <div class="form-group">
              <label for="pwd" class="form-label">Password  </label>
              <input type="text" class="form-control" id="password"  name="password">
            </div>
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
