/* #LOGIN 
@showModalHint
 * */
function hint() {
  let show = document.getElementById('forgetPassword');
  show.classList.add('opacity-100');
  show.classList.remove('opacity-0');
  setTimeout(()=>{
    show.classList.add('flex');
    show.classList.remove('hidden');
  },100);

}
function exitHint() {
  let exit = document.getElementById('forgetPassword');
  exit.classList.remove('opacity-100');
  exit.classList.add('opacity-0');
  setTimeout(()=>{
    exit.classList.remove('flex');
    exit.classList.add('hidden');
  },100);

}
function logout() {
  let show = document.getElementById('modalLogout');
  show.classList.add('opacity-100');
  show.classList.remove('opacity-0');
  setTimeout(()=>{
    show.classList.add('flex');
    show.classList.remove('hidden');
  },100);

}
function exitLogout() {
  let exit = document.getElementById('modalLogout');
  exit.classList.remove('opacity-100');
  exit.classList.add('opacity-0');
  setTimeout(()=>{
    exit.classList.remove('flex');
    exit.classList.add('hidden');
  },100);

}
/* Data Siswa */
/* Modal btn Hapus*/
function showBtnHapus(){
  let hapus = document.getElementById('btnHapus');
  hapus.classList.remove('hidden');
  hapus.classList.add('flex');
  setTimeout(()=>{
    hapus.classList.add('opacity-100');
  },100);
}
function hideBtnHapus(){
  let hapus = document.getElementById('btnHapus');
  hapus.classList.add('opacity-0');
  hapus.classList.remove('opacity-100');
  setTimeout(()=>{
    hapus.classList.add('hidden');
    hapus.classList.remove('flex');
  },100);
}
/* Nofit Berhasil*/
function showNotifSuccess(){
  let success = document.getElementById('successEdit');
  success.classList.remove('hidden');
  success.classList.add('flex');
  setTimeout(()=>{
  },100);
  success.classList.remove('opacity-0');
}
/* Modal btn Hapus*/
function showBtnHapus(){
  let show = document.getElementById('btnHapus');
  show.classList.remove('hidden');
  show.classList.add('flex');
  setTimeout(()=>{
    show.classList.add('opacity-100');
  },100);
}
function hideBtnHapus(){
  let hapus = document.getElementById('btnHapus');
  hapus.classList.add('opacity-0');
  hapus.classList.remove('opacity-100');
  setTimeout(()=>{
    hapus.classList.add('hidden');
    hapus.classList.remove('flex');
  },100);
}

/* Modal Edit Data Murid*/
function showTambahSiswa(){
  let tambah = document.getElementById('tambahSiswa');
  tambah.classList.remove('hidden');
  tambah.classList.add('flex');
  setTimeout(()=>{
    tambah.classList.add('opacity-100');
  },100);
}
function hideTambahSiswa(){
  let tambah = document.getElementById('tambahSiswa');
  tambah.classList.add('opacity-0');
  tambah.classList.remove('opacity-100');
  setTimeout(()=>{
    tambah.classList.add('hidden');
    tambah.classList.remove('flex');
  },100);
}
function closeEdit() {
  let close = document.getElementById('formEdit');
  close.classList.remove('opacity-0');
  close.classList.add('opacity-100');
  setTimeout(() => {
    close.classList.add('hidden');
    close.classList.remove('flex');
  }, 100);
}
function showEdit(){
  let show = document.getElementById('formEdit');
  show.classList.remove('hidden');
  show.classList.add('flex');
  setTimeout(()=>{
    show.classList.add('opacity-100');
  },100);
}
function submitEdit() {
  alert('data berhasil dikirim');
}

function closeMelanggar() {
  let close = document.getElementById('formMelanggar');
  close.classList.remove('opacity-0');
  close.classList.add('opacity-100');
  setTimeout(() => {
    close.classList.add('hidden');
    close.classList.remove('flex');
  }, 100);
}
function showMelanggar(){
  let show = document.getElementById('formMelanggar');
  show.classList.remove('hidden');
  show.classList.add('flex');
  setTimeout(()=>{
    show.classList.add('opacity-100');
  },100);
}
function submitMelanggar() {
  alert('data berhasil dikirim');
  closeEdit();
}

/* Modal btn Hapus Pelanggaran*/
function showBtnHapusPelanggaran(){
  let show = document.getElementById('btnHapusPelanggaran');
  show.classList.remove('hidden');
  show.classList.add('flex');
  setTimeout(()=>{
    show.classList.add('opacity-100');
  },100);
}
function hideBtnHapusPelanggaran(){
  let hapus = document.getElementById('btnHapusPelanggaran');
  hapus.classList.add('opacity-0');
  hapus.classList.remove('opacity-100');
  setTimeout(()=>{
    hapus.classList.add('hidden');
    hapus.classList.remove('flex');
  },100);
}
// Modal Action Edit Pelanggaran
function showEditPelanggaran(){
  let show = document.getElementById('formEditPelanggaran');
  show.classList.remove('hidden');
  show.classList.add('flex');
  setTimeout(()=>{
    show.classList.add('opacity-100');
  },100);
}
function closeEditPelanggaran(){
  let hapus = document.getElementById('formEditPelanggaran');
  hapus.classList.add('opacity-0');
  hapus.classList.remove('opacity-100');
  setTimeout(()=>{
    hapus.classList.add('hidden');
    hapus.classList.remove('flex');
  },100);
}
// Modal Tambah Pelanggaran Baru
function showFormRules(){
  let show = document.getElementById('formRules');
  show.classList.remove('hidden');
  show.classList.add('flex');
  setTimeout(()=>{
    show.classList.add('opacity-100');
  },100);
}
function closeFormAddRules(){
  let hapus = document.getElementById('formRules');
  hapus.classList.add('opacity-0');
  hapus.classList.remove('opacity-100');
  setTimeout(()=>{
    hapus.classList.add('hidden');
    hapus.classList.remove('flex');
  },100);
}

// Modal Permohonan Izin
// method(pesan,limit waktu 3000 = 3detik)
function permissionReceived(msg,duration) {
  var el = document.createElement("div");
  el.setAttribute("style","position:absolute;top:30%;left:50%;background-color:white;color:green;font-size:2rem;font-weight:600;");
  el.innerHTML = msg;
  setTimeout(function(){
    el.parentNode.removeChild(el);
  },duration);
  document.body.appendChild(el);
}
function permissionDenied(msg,duration) {
  var el = document.createElement("div");
  el.setAttribute("style","position:absolute;top:30%;left:50%;background-color:white;color:red;font-size:2rem;font-weight:600;");
  el.innerHTML = msg;
  setTimeout(function(){
    el.parentNode.removeChild(el);
  },duration);
  document.body.appendChild(el);
}
