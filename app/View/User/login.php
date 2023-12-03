<?php
session_start();

$notificationClass = 'opacity-0'; // Class untuk mengatur tampilan notifikasi
$notificationMessage = ''; // Pesan notifikasi

// Cek apakah ada notifikasi yang diberikan
if (isset($_SESSION['notification'])) {
    $notificationClass = $_SESSION['notification']['class'];
    $notificationMessage = $_SESSION['notification']['message'];

    // Hapus notifikasi dari session setelah ditampilkan
    unset($_SESSION['notification']);
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="../../../../asset/css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="flex justify-center items-center h-screen bg-[#DDEEE0]">
        <!-- Notifikasi -->
        <div class="absolute flex <?= $notificationClass; ?> top-8 bg-white border w-60 h-24 rounded-xl items-center shadow ">
            <?= $notificationMessage; ?>
        </div>

        <div class="w-[590px] h-auto p-6 bg-white rounded-[30px] shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)]">
            <img src="../../../../asset/assets/icon/logosmada.png" alt="logosmada" class="w-36 mt-6 mx-auto">
            <h1 class="font-['Arial'] text-2xl block text-center font-semibold w-64 mx-auto"> SMA NEGERI 2 JEMBER</h1>
            <form action="/users/login" method="post">
                <div class="mt-16">
                    <input type="text" id="noinduk" name="noinduk" value="" class="border bg-green-100 rounded-[20px] h-14 w-full font-medium text-base px-6 py-1 focus:outline-none focus:ring-0 focus:border-green-600" placeholder="Enter NIP ..." />
                </div>
                <div class="mt-8">
                    <input type="password" id="password" name="password" class="border bg-green-100 rounded-[20px] h-14 w-full text-base px-6 py-1 focus:outline-none focus:ring-0 focus:border-green-600" placeholder="Enter Password ..." />
                </div>

                <div class="mt-3 p-3 flex justify-between items-center">
                    <div>
                        <input type="checkbox">
                        <label>Remember Me</label>
                    </div>
                    <div>
                    </div>
                </div>
                <div class="mt-5">
                    <button type="submit" name="login" value="" class="border-2 border-green-400 bg-green-400 text-white py-3 w-full rounded-[20px] hover:bg-transparent hover:text-green-700 font-semibold shadow-md">Log In</button>
                </div>
            </form>
        </div>
    </div>
    <script src="../../../asset/js/modal.js"></script>
</body>

</html>