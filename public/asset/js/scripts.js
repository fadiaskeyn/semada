document.getElementById('btnTambahSiswa').addEventListener('click', function() {
    // Menggunakan Ajax untuk memuat konten modal dari /admin/data_siswa/tambah
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // Memasukkan konten modal ke dalam elemen modal pada halaman /admin/data_siswa
        document.getElementById('modalContainer').innerHTML = this.responseText;

        // Menampilkan modal
        showTambahSiswaModal();
      }
    };
    xhr.open('GET', '/admin/data_siswa/tambah', true);
    xhr.send();
  });

  function showTambahSiswaModal() {
    // Tampilkan modal sesuai dengan mekanisme yang Anda gunakan
  }
