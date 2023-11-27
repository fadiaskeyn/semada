<form class="col-md-6" action="/admin/tambahmurid" method="post">
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Absen : </label>
    <input type="text" class="form-control" id=" absen" name="absen">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">NIS : </label>
    <input type="text" class="form-control" id="noinduk" name="noinduk">
  </div>
  <select name="gender" id="gender">
  <optgroup label="Pilih Kelamin">
    <option value="L"> Perempuan</option>
    <option value="P">Laki- Laki </option>
  </optgroup>
</select>
  <div class="mb-3">
    <label for="pwd" class="form-label">Nama : </label>
    <input type="text" class="form-control" id="nama" name="nama">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Kelas : </label>
    <input type="text" class="form-control" id="kelas" name="kelas">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password : </label>
    <input type="text" class="form-control" id="password"  name="password">
  </div>
  <div class="form-check mb-3">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>