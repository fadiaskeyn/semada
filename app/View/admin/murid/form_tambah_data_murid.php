<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card card-primary my-5">
        <div class="card-header">
          <h3 class="card-title">Form Tambah Data Murid</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="quickForm" action="/admin/tambahmurid" method="POST">
          <div class="card-body">
            <div class="form-group">
              <label for="email" class="form-label">Absen</label>
              <input type="text" class="form-control" id=" absen" name="absen">
            </div>
            <div class="form-group">
              <label for="pwd" class="form-label">NIS</label>
              <input type="text" class="form-control" id="noinduk" name="noinduk">
            </div>
            <div class="from-group my-4">
              <select name="gender" id="gender"
                class="form-select" aria-label="JenisKelamin">
                <option selected>Jenis Kelamin</option>
                <option value="P">Perempuan</option>
                <option value="L">Laki-Laki</option>
              </select>
            </div>
            <div class="from-group">
              <label for="pwd" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="from-group">
              <label for="pwd" class="form-label">Kelas</label>
              <input type="text" class="form-control" id="kelas" name="kelas">
            </div>
            <div class="from-group">
              <label for="pwd" class="form-label">Password</label>
              <input type="text" class="form-control" id="password"  name="password">
            </div>
            <div class="from-group">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
