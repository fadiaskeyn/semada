<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Absen Murid</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../../../asset/css/style.css" rel="stylesheet">
  </head>
  <body class="bg-[#F3EEEA]">
    <!-- start navbar -->
    <nav class="bg-white shadow-md">
      <div class="max-w-screen px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-20 items-center justify-between">
          <div class="flex flex-1 items-stretch justify-start">
            <div class="flex items-center">
              <img class="w-14" src="../../../../asset/assets/icon/logosmada.png" alt="logo smada" />
            </div>
            <div class="hidden sm:ml-6 sm:block"></div>
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
    </nav>
    <!-- end navbar -->
    <div class="flex flex-row h-screen">
      <div class="grow w-4/12">
        <!-- Start Sidebar -->
        <div class="flex flex-col justify-between bg-white m-7 w-96 h-full rounded-lg text-xl p-4 overflow-auto">
          <div>
            <ul>
              <li
                class="mb-4 bg-gray-200 rounded-md font-semibold py-1 shadow 
                hover:bg-green-500 hover:text-white">
                <a 
                  onclick="alert(':( Sorry We have trouble')"
                  href="" class="ml-4 w-full inline-block">Dashboard</a>
              </li>
              <li class="mb-4 bg-gray-200 rounded-md font-semibold py-1 shadow
                hover:bg-green-500 hover:text-white">
                <a href="./../../admin/data_murid" class="ml-4 w-full inline-block">Data Murid</a>
              </li>
              <li class="mb-4 bg-gray-200 rounded-md font-semibold py-1 shadow
                hover:bg-green-500 hover:text-white">
                <a href="./../pelanggaran" class="ml-4 w-full inline-block">Pelanggaran</a>
              </li>
              <li class="mb-4 text-white bg-[#1CC642] rounded-md font-semibold py-1 flex items-center shadow
                hover:bg-green-500 hover:text-gray-200"">
                <a href="" class="ml-4 w-full inline-block">Absen Murid</a>
                <img src="../../../../asset/assets/icon/Polygon.png" alt="activity" class="mr-4 w-4 h-4">
              </li>
              <li class="mb-4 bg-gray-200 rounded-md font-semibold py-1 shadow
                hover:bg-green-500 hover:text-white">
                <a 
                  onclick="alert(':( Sorry we have trouble')"
                  href="" class="ml-4 w-full inline-block">Permohonan Izin Murid</a>
              </li>
              <li class="mb-4 bg-gray-200 rounded-md font-semibold py-1 shadow
                hover:bg-green-500 hover:text-white">
                <a href="../murid_nakal/daftar_murid_nakal" class="ml-4 w-full inline-block">Rekap Pelanggaran</a>
              </li>
              <li class="mb-4 bg-gray-200 rounded-md font-semibold py-1 shadow
                hover:bg-green-500 hover:text-white">
                <a 
                  onclick="alert(':( Sorry we have trouble')"
                  href="" class="ml-4 w-full inline-block">Rekap Absen</a>
              </li>
              <li 
                onclick="alert(':( Sorry we have trouble')"
                class="mb-4 bg-gray-200 rounded-md font-semibold py-1 shadow
                hover:bg-green-500 hover:text-white">
                <a href="" class="ml-4 w-full inline-block">Profile</a>
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
        <!-- Modal sidebar -->
        <div 
          onclick="exitLogout()"
          id="modalLogout"
          class="fixed bg-black w-screen h-screen bg-opacity-50 top-0 left-0 
          justify-center items-center opacity-0 hidden transition-opacity duration-200 backdrop-blur-sm shadow">
          <div 
            onclick="event.stopImmediatePropagation()"
            class="rounded-lg text-center bg-green-100 w-96 h-36">
            <h1 class="p-4">Apakah anda yakin keluar ?</h1>
            <div class="flex justify-evenly mt-3">
              <button type="" class="bg-green-500 text-white text-lg w-20 h-7 rounded-full shadow
                hover:bg-green-600">Ya</button>
              <button 
                onclick="exitLogout()"
                type="" 
                class="bg-red-500 text-white text-lg w-20 h-7 rounded-full shadow hover:bg-red-600">Tidak</button>
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-col w-full  mt-8 mr-16 rounded-lg bg-white h-full">
        <!-- START CONTENT -->

        <div class="flex justify-center items-center rounded-t-lg h-16 bg-[#575757] text-center font-bold text-white text-2xl">
          Absen Murid
        </div>
        <div class="flex flex-col h-full w-full p-24">
          <div class="w-full h-16 flex justify-end items-center">
            <label for="" class="font-semibold text-xl">cari</label>
            <input id="searchInput" type="search" name="" value="" class="border-2 border-black w-64 h-1/2 ml-4 px-2">

          </div>
          <div class="h-full w-full overflow-auto">
            <table class="py-12 w-full">
              <thead id="tableHeader" class="sticky top-0 z-0">
              <tr>
            <th class="text-center">Nomor Induk</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Kelas</th>
            <th class="text-center text-green-500 font-bold">Status</th>
            <th class="text-center">Bukti</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-center"><?php echo $absensiData['noinduk']; ?></td>
            <td class="text-center"><?php echo $absensiData['nama']; ?></td>
            <td class="text-center"><?php echo $absensiData['kelas']; ?></td>
            <td class="text-center"><?php echo $absensiData['status']; ?></td>
            <td class="text-center">
                <?php if (!empty($buktiUrl)): ?>
                    <img src="<?php echo $buktiUrl; ?>" alt="Bukti Hadir" class="w-24 h-24 rounded-full">
                <?php else: ?>
                    Tidak ada gambar
                <?php endif; ?>
            </td>
        </tr>
              </tbody>
            </table>
            <!-- start modal tombol hapus-->
            <div 
              onclick="hideBtnHapus()"
              id="btnHapus"
              class="fixed left-0 top-0 bg-black bg-opacity-50 w-screen h-screen justify-center items-center 
              opacity-0 hidden transition-opacity duration-200">
              <div 
                onclick="event.stopImmediatePropagation()"
                class="text-center bg-white w-3/12 h-64 rounded-lg shadow">
                <h1 class="text-red-600 font-bold mx-auto my-5 py-6 w-80">Peringatan data berikut akan dihapus secara permanen! setuju atau tidak</h1>
                <div class="flex my-12 justify-evenly items-center">
                  <button type="" class="bg-red-500 w-20 rounded-full text-white text-lg hover:bg-red-600">Setuju</button>
                  <button 
                    onclick="hideBtnHapus()"
                    type="" class="bg-green-500 w-20 rounded-full text-white text-lg hover:bg-green-600">Tidak</button>
                </div>
              </div>
            </div>
            <!-- end modal tombol hapus-->
            <div class="flex flex-row mb-3 p-2 justify-end">
              <button 
                type="submit" 
                class="hidden justify-center items-center w-40 h-10 rounded-xl bg-green-500 text-white"
              >Cetak Absen</button>
            </div>
            <!-- Start Modal Detail Siswa-->
            <div
              onclick="showTambahSiswa()"
              id="tambahSiswa"
              class="fixed top-0 left-0 bg-black w-screen h-screen bg-opacity-50 justify-center items-center 
              transition-opacity hidden opacity-0 duartion-200">
              <div
                class="relative w-1/2 h-4/5 bg-[#EAFFEF] rounded-lg my-10 mx-auto overflow-hidden">
                <div 
                  class="p-2 bg-green-500 text-center font-semibold text-2xl text-white">
                  <h1>Detail Siswa ?nama_siswa</h1>
                  <div class="absolute top-1 right-6 font-semibold text-white text-3xl">
                    <button
                      onclick="hideTambahSiswa()"
                      type="" class="hover:text-gray-200">X</button>
                  </div>
                </div>
                <div 
                  onclick="event.stopImmediatePropagation()"
                  class="p-16 rounded-b-lg">
                  <form>
                    <div class="mb-2 w-full">
                      <label for="" class="font-semibold inline-block w-52">Nis</label>
                      <input type="text" name="" value="" class="border border-green-500 px-2 w-1/2">
                    </div>
                    <div class="mb-2 w-full">
                      <label for="" class="font-semibold inline-block w-52">Nama</label>
                      <input type="text" name="" value="" class="border border-green-500 px-2 w-1/2">
                    </div>
                    <div class="mb-2 w-full">
                      <label for="" class="font-semibold inline-block w-52">Kelas</label>
                      <input type="text" name="" value="" class="border border-green-500 px-2 w-1/2">
                    </div>
                    <div class="mb-2 w-full">
                      <label for="" class="font-semibold inline-block w-52">Jenis Kelamin</label>
                      <input type="text" name="" value="" class="border border-green-500 px-2 w-1/2">
                    </div>
                    <div class="mb-2 w-full">
                      <label for="" class="font-semibold inline-block w-52">Alasan</label>
                      <input type="text" name="" value="" class="inline-block border border-green-500 px-2 w-1/2 h-24">
                    </div>
                    <div class="flex mb-2 w-full">
                      <label for="" class="font-semibold inline-block w-52">Berkas pendukung</label>
                      <a href="https://cdn-cms.pgimgs.com/static/2022/04/Contoh-Surat-Persetujuan-Orang-Tua.pdf" target="_blank" class="flex text-blue-700">
                        <img src="../../../../asset/assets/icon/pdf.png" alt="" class="w-4 mx-1">
                          file_izin_rahmatullah.pdf</a>
                    </div>

                  </form>
                  <div 
                    onclick="showNotifSuccess()"
                    class="mt-6 flex w-full justify-end font-semibold text-white">
                    <button type="" class="mr-6 p-2 bg-green-500 w-32 rounded-full">Simpan</button>
                  </div>
                </div>
              </div>
              <!-- start notif berhasil-->
              <div 
                onclick="showNotifSuccess()"
                id="successEdit"
                class="absolute justify-between p-6 items-center text-green-500 text-xl font-semibold top-40 right-28 border rounded-lg bg-white w-60 h-12 transition-opacity hidden opacity-0 duartion-200">
                <img src="../../../../asset/assets/icon/check.png" alt="" class="w-10">
                <h1> Data Berhasil diperbaharui </h1>
              </div>
              <!-- end notif berhasil-->

            </div>
            <!-- End Modal form tambah siswa-->
          </div>
        </div>

        <!-- END CONTENT -->
      </div>
    </div>
    <script src="../../../../asset/js/modal.js"></script>
    <script src="../../../../asset/js/search.js"></script>
    <script src="../../../../asset/js/scripts.js"></script>
  </body>
</html>
