<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Data Murid</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../../../asset/css/style.css" rel="stylesheet">
  </head>
  <body class="bg-[#F3EEEA]">
    <!-- start navbar -->
    <nav class="bg-white shadow-md">
      <div class="max-w-screen px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-90 items-center justify-between">
          <div class="flex flex-1 items-stretch justify-start">
            <div class="flex items-center">
              <img class="w-14" src="../../../../asset/assets/icon/logosmada.png" alt="logo smada" />
            </div>
          </div>
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <div class="relative ml-3 justify-end">
              <div class="flex justify-center items-center gap-2 text-xl font-semibold">
                <span>Admin</span>
                <button type="button"
                  class="relative flex rounded-full bg-green-400">
                  <img class="w-10 rounded-full" src="../../../../asset/assets/icon/user.png" alt="profileUser" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </nav>
    <!-- end navbar -->
    <div class="flex flex-row h-screen">
      <div class="grow w-4/12">
        <!-- Start Sidebar -->
        <div class="flex flex-col justify-between bg-white m-7 w-900 h-full rounded-lg text-xl p-4 overflow-auto">
          <div>
            <ul>
              <li class="mb-4 bg-gray-200 rounded-md font-semibold py-1 shadow 
                hover:bg-green-500 hover:text-white">
                <a href="dashboard.html" class="ml-4 w-full inline-block">Dashboard</a>
              </li>
              <li class="mb-4 text-white bg-[#1CC642] rounded-md font-semibold py-1 shadow
                hover:bg-green-500 hover:text-gray-200">
                <span class="cursor-pointer ml-4 w-full inline-block">Data Murid</span>
              </li>
              <li class="mb-4 bg-gray-200 rounded-md font-semibold py-1 shadow
                hover:bg-green-500 hover:text-white">
                <a href="pelanggaran_siswa.html" class="ml-4 w-full inline-block">Pelanggaran</a>
              </li>
              <li class="mb-4 bg-gray-200 rounded-md font-semibold py-1 flex items-center shadow
                hover:bg-green-500 hover:text-white">
                <a href="absen_murid.html" class="ml-4 w-full inline-block">Absen Murid</a>
              </li>
              <li class="mb-4 bg-gray-200 rounded-md font-semibold py-1 shadow
                hover:bg-green-500 hover:text-white">
                <a href="permohonan_izin.html" class="ml-4 w-full inline-block">Permohonan Izin Murid</a>
              </li>
              <li class="mb-4 bg-gray-200 rounded-md font-semibold py-1 shadow
                hover:bg-green-500 hover:text-white">
                <a href="rekap_pelanggar.html" class="ml-4 w-full inline-block">Rekap Pelanggaran</a>
              </li>
              <li class="mb-4 bg-gray-200 rounded-md font-semibold py-1 shadow
                hover:bg-green-500 hover:text-white">
                <a href="rekap_absen.html" class="ml-4 w-full inline-block">Rekap Absen</a>
              </li>
              <li class="mb-4 bg-gray-200 rounded-md font-semibold py-1 shadow
                hover:bg-green-500 hover:text-white">
                <a href="profile.html" class="ml-4 w-full inline-block">Profile</a>
              </li>
            </ul>
          </div>
          <div 
            onclick="logout()"
            class="flex justify-center items-center mx-auto mb-32 bg-green-500 w-40 rounded-full text-white h-10">
            <img src="../../../../asset/assets/icon/icon_keluar.png" alt="logout">
            <button type="" class="p-4">
              keluar
            </button>
          </div>
        </div>
        <!-- End Sidebar -->
        <!-- MODAL SIDEBAR -->
        <!-- @logout -->
        <div 
          onclick="exitLogout()"
          id="modalLogout"
          class="fixed bg-black w-screen h-screen bg-opacity-50 top-0 left-0 
          justify-center items-center opacity-0 hidden transition-opacity duration-200 backdrop-blur-sm shadow z-50">
          <div 
            onclick="event.stopImmediatePropagation()"
            class="rounded-lg text-center bg-green-100 w-96 h-36">
            <h1 class="p-4">Apakah anda yakin keluar ?</h1>
            <div class="flex justify-evenly mt-3">
            <form action="/users/logout" method="GET">
              <button type="submit" class="bg-green-500 text-white text-lg w-20 h-7 rounded-full shadow
                hover:bg-green-600">Ya</button>
            </form>
              <button 
                onclick="exitLogout()"
                type="" 
                class="bg-red-500 text-white text-lg w-20 h-7 rounded-full shadow hover:bg-red-600">Tidak</button>
            </div>
          </div>
        </div>

      </div>
      <div class="flex flex-col w-full  mt-8 mr-16 rounded-lg bg-white h-full overflow-hidden">
        <!-- START CONTENT -->
        <div class="flex justify-center items-center bg-[#575757] text-center font-bold text-white text-2xl">
          <h1 class="p-4">Data Murid</h1>
            </div>
            <div class="flex flex-col h-full w-full p-5">
          <div>
            <button 
              id="btnTambahSiswa"
              class="flex justify-center items-center bg-green-500 rounded-full text-white font-semibold h-10 w-48">
              <span class="text-3xl">+ 
              <a href="/admin/data_murid/tambah" class="text-xl hover:text-inherit">Tambah Siswa</a>
              </span>
            </button>
          </div> 
          <!-- modal tambahsiswa start -->
          <div 
              onclick="closeEdit()"
              id="formEdit"
              class="fixed w-screen h-screen bg-black bg-opacity-50 top-0 left-0 justify-center items-center transition-opacity duration-200 opacity-0 hidden">
              <div 
                class="bg-[#E8FDED] mx-auto w-[40rem] mt-16 overflow-hidden rounded-lg">
                <div 
                  onclick="closeEdit()"
                  class="relative bg-[#1CC642] text-center text-2xl font-bold text-white w-full h-12 flex items-center justify-center">
                  <h1>Edit Data Murid</h1>
                  <span class="absolute right-8 hover:text-red-800 hover:cursor-pointer">X</span>
                </div>
                
                <?php if (!empty($model["dataMurid"])): ?>
    <form onclick="event.stopImmediatePropagation()" action="/admin/data_murid/edit" method="post">
        <?php $dataMurid = $model["dataMurid"][0]; // Ambil data murid pertama ?>
        <div class="flex p-4 mb-4">
            <label for="" class="w-36 inline-block">Absen</label>
            <input type="" id="absen" name="absen" value="<?= isset($dataMurid['absen']) ? $dataMurid['absen'] : '' ?>" class="w-96 border-2 border-green-500">
        </div>
        <div class="flex p-4 mb-4">
            <label for="" class="w-36 inline-block">NIS</label>
            <input type="" id="noinduk" name="noinduk" value="<?= isset($dataMurid['noinduk']) ? $dataMurid['noinduk'] : '' ?>" class="w-96 border-2 border-green-500">
        </div>
        <div class="flex p-4 mb-4">
            <label for="" class="w-36 inline-block">Gender</label>
            <input type="" id="gender" name="gender" value="<?= isset($dataMurid['gender']) ? $dataMurid['gender'] : '' ?>" class="w-96 border-2 border-green-500">
        </div>
        <div class="flex p-4 mb-4">
            <label for="" class="w-36 inline-block">Nama</label>
            <input type="" id="nama" name="nama" value="<?= isset($dataMurid['nama']) ? $dataMurid['nama'] : '' ?>" class="w-96 border-2 border-green-500">
        </div>
        <div class="flex p-4 mb-4">
            <label for="" class="w-36 inline-block">Kelas</label>
            <input type="" id="kelas" name="kelas" value="<?= isset($dataMurid['kelas']) ? $dataMurid['kelas'] : '' ?>" class="w-96 border-2 border-green-500">
        </div>
        <div class="flex p-4 mb-4">
            <label for="" class="w-36 inline-block">Password</label>
            <input type="password" id="password" name="password" value="<?= isset($dataMurid['password']) ? $dataMurid['password'] : '' ?>" class="w-96 border-2 border-green-500">
        </div>
        <div class="flex justify-end p-4">
            <button onclick="submitEdit()" type="submit" class="w-36 h-8 bg-green-500 text-white shadow rounded-full">Simpan</button>
        </div>
    </form>
<?php endif; ?>
              </div>
            </div>
          <!-- modal tambahsiswa end -->
          <div class="w-full h-16 flex justify-end items-center">
            <label for="" class="font-semibold text-xl">Cari</label>
            <input id="searchInput" type="search" name="" value="" class="border-2 border-black w-64 h-1/2 ml-4 px-2">
          </div>
          <div class="h-full w-full overflow-auto">
            <table class="py-12 w-full">
              <thead class="border boreder-black sticky top-0 z-50">
                <tr class="text-center bg-gray-200 shadow">
                  <th class="w-[10%] border border-black ">Absen</th>
                  <th class="w-[10%] border border-black ">Nis</th>
                  <th class="w-[10%] border border-black ">Jenis Kelamin</th>
                  <th class="w-[40%] border border-black ">Nama</th>
                  <th class="w-[10%] border border-black ">Kelas</th>
                  <th class="w-[20%] border border-black ">Action</th>
                </tr>
              </thead>
              <?php if (!empty($model["dataMurid"])) : ?>
              <tbody>
                <?php foreach ($model["dataMurid"] as $murid) : ?>
                <tr class="text-center table-row">
                  <td class="border border-black"><?= $murid['absen'] ?> </td>
                  <td class="border border-black"><?= $murid['noinduk'] ?> </td>
                  <td class="border border-black"><?= $murid['gender'] ?> </td>
                  <td class="border border-black"><?= $murid['nama'] ?> </td>
                  <td class="border border-black"><?= $murid['kelas'] ?> </td>
                  <td class="flex border border-black gap-2 p-2">
                    <button onclick="showEdit()" type="" class="bg-green-500 w-20 h-8 text-white rounded-md hover:text-gray-200">Edit</button>
                    <button onclick="showBtnHapus()" type="" class="bg-red-700 w-20 h-8 text-white rounded-md hover:text-gray-200">Hapus</button>
                    <button onclick="showMelanggar()" type="" class="bg-gray-500 w-20 h-8 text-white rounded-md hover:text-gray-200">Melanggar</button>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              <?php endif; ?>
            </table>
            <!-- MODAL ACTION -->
            <!-- start modal tombol Tambah Pelanggaran -->
            <div 
    onclick="closeEdit()"
    id="formEdit"
    class="fixed w-screen h-screen bg-black bg-opacity-50 top-0 left-0 justify-center items-center transition-opacity duration-200 opacity-0 hidden">
    <div 
        class="bg-[#E8FDED] mx-auto w-[40rem] mt-16 overflow-hidden rounded-lg">
        <div 
            onclick="closeEdit()"
            class="relative bg-[#1CC642] text-center text-2xl font-bold text-white w-full h-12 flex items-center justify-center">
            <h1>Edit Pelanggaran</h1>
            <span class="absolute right-8 hover:text-red-800 hover:cursor-pointer" onclick="closeEdit()">X</span>
        </div>
        <?php if (!empty($model["dataPelanggaran"])): ?>
            <form onclick="event.stopImmediatePropagation()" action="/some_action_endpoint" method="post">
                <div class="flex p-4 mb-4">
                    <select name="pilihlanggaran" id="pilihlanggaran" class="w-96 border-2 border-green-500">
                        <optgroup>
                            <?php foreach ($model["dataPelanggaran"] as $dataPelanggaran): ?>
                                <?php
                                    $selected = ($dataPelanggaran['id_pelanggaran'] == $selectedValue) ? 'selected' : '';
                                ?>
                                <option value="<?= $dataPelanggaran['id_pelanggaran'] ?>" <?= $selected ?>
                                    data-id-pelanggaran="<?= $dataPelanggaran['id_pelanggaran'] ?>"
                                    data-nilai-poin="<?= $dataPelanggaran['nilai_poin'] ?>">
                                    <?= $dataPelanggaran['nama'] ?>
                                </option>
                            <?php endforeach ?>
                        </optgroup>
                    </select>
                </div>
                <div class="flex p-4 mb-4">
                    <label for="" class="w-36 inline-block">Catatan untuk Murid: </label>
                    <textarea rows="3" cols="40" class="border-2 border-green-500" name="catatanMurid"></textarea>
                </div>
                <div class="flex justify-end p-4">
                    <button type="button" onclick="submitEdit()" class="w-36 h-8 bg-green-500 text-white shadow rounded-full">Simpan</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>

            <!-- end modal tambah pelanggaran -->


            <!-- start modal tombol hapus-->
            <div 
              onclick="hideBtnHapus()"
              id="btnHapus"
              class="fixed left-0 top-0 bg-black bg-opacity-50 w-screen h-screen justify-center items-center 
              opacity-0 hidden transition-opacity duration-200">
              <div 
                onclick="event.stopImmediatePropagation()"
                class="text-center bg-[#EAFFEF] w-3/12 h-64 rounded-lg shadow">
                <h1 class="mx-auto my-5 py-6 w-80">Apakah anda ingin menghapus pelanggaran ?</h1>
                <div class="flex my-12 justify-evenly items-center">
                  <button type="" class="bg-red-500 w-20 rounded-full text-white text-lg hover:bg-red-600">
                    <!-- TODO DELETE -->
                    <a href="/admin/data_murid/hapus/<?= $murid['noinduk'] ?>">Ya</a>
                    </button>
                  <button 
                    onclick="hideBtnHapus()"
                    type="" class="bg-green-500 w-20 rounded-full text-white text-lg hover:bg-green-600">Tidak</button>
                </div>
              </div>
            </div>
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
            <!-- end modal tombol hapus-->



            <!-- start modal tombol Melanggar -->
            <div 
              onclick="closeMelanggar()"
              id="formMelanggar"
              class="fixed w-screen h-screen bg-black bg-opacity-50 top-0 left-0 justify-center items-center transition-opacity duration-200 opacity-0 hidden">
              <div 
                class="bg-[#E8FDED] mx-auto w-[40rem] mt-16 overflow-hidden rounded-lg">
                <div 
                  onclick="closeMelanggar()"
                  class="relative bg-[#1CC642] text-center text-2xl font-bold text-white w-full h-12 flex items-center justify-center">
                  <h1>Pilih Pelanggaran</h1>
                  <span class="absolute right-8 hover:text-red-800 hover:cursor-pointer">X</span>
                </div>
                <form
                  onclick="event.stopImmediatePropagation()"
                >
                <div class="mb-3">
                  
                
                <?php if (!empty($model["noinduk"])): ?>
<?php if (!empty($model["dataPelanggaran"])): ?>
    <select name="pilihlanggaran" id="pilihlanggaran" class="pilihlanggaran">
        <optgroup>
            <option value="Pilih Pelanggaran" selected disabled>Pilih Pelanggaran</option>
            <?php foreach ($model["dataPelanggaran"] as $dataPelanggaran): ?>
                <?php
                $selected = ($dataPelanggaran['id_pelanggaran'] == $model["noinduk"]) ? 'selected' : '';
                ?>
                <option value="<?= isset($dataPelanggaran['nama']) ? $dataPelanggaran['nama'] : '' ?>"
                    data-id-pelanggaran="<?= isset($dataPelanggaran['id_pelanggaran']) ? $dataPelanggaran['id_pelanggaran'] : '' ?>"
                    data-nilai-poin="<?= isset($dataPelanggaran['nilai_poin']) ? $dataPelanggaran['nilai_poin'] : '' ?>"
                    <?= $selected ?>>
                    <?= isset($dataPelanggaran['nama']) ? $dataPelanggaran['nama'] : '' ?>
                </option>
            <?php endforeach; ?>
        </optgroup>
    </select>
<?php endif; ?>
<?php endif; ?>



<div class="mb-3">
            <label for="pwd" id="nilaiPoinLabel" class="form-label">
                <?= isset($model["dataPelanggaran"]['nilai_poin']) ? $model["dataPelanggaran"]['nilai_poin'] : '' ?>
            </label>
        </div>

        <div class="flex p-4 mb-4">
            <label for="" class="w-36 inline-block">NIS</label>
            <input type="" id="noinduk" name="noinduk" value="<?= isset($dataMurid['noinduk']) ? $dataMurid['noinduk'] : '' ?>" class="w-96 border-2 border-green-500">
        </div>
        <div class="flex p-4 mb-4">
            <label for="" class="w-36 inline-block">ID Pelanggaran</label>
            <input type="" id="noinduk" name="noinduk" value="" class="w-96 border-2 border-green-500">
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
            <!-- end modal tombol Melanggar -->



          </div>
        </div>
        <!-- END CONTENT -->
      </div>
    </div>
    <script src="../../../../asset/js/modal.js"></script>
    <script src="../../../../asset/js/search.js"></script>
    <script src="../../../../asset/js/scripts.js"></script>


     <!-- Show Edit Modal -->
    <script> function showEdit(){
  let show = document.getElementById('formEdit');
  show.classList.remove('hidden');
  show.classList.add('flex');
  setTimeout(()=>{
    show.classList.add('opacity-100');
  },100);
}

</script>
  </body>
</html>