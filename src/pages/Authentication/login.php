<?php
// Sesion
session_start();

// ambil conn
require '../../../php/functions/function.php';

// Inisialisasi variabel untuk pesan error
$errorPopup = ''; // Untuk pop-up akun tidak ditemukan
$errorPassword = ''; // Untuk pesan error password salah

if (isset($_POST["login"])) {
  $loginInput = $_POST["email"];  // Ini bisa digunakan untuk email atau username
  $password = $_POST["password"];

  // Cek apakah inputnya adalah email
  if (filter_var($loginInput, FILTER_VALIDATE_EMAIL)) {
    // Jika format input adalah email, lakukan pencarian dengan email
    $query = "SELECT * FROM users WHERE email = '$loginInput'";
  } else {
    // Jika bukan email, cari berdasarkan username
    $query = "SELECT * FROM users WHERE username = '$loginInput'";
  }

  // Query untuk mengecek apakah email atau username ada di database
  $result = mysqli_query($conn, $query);

  // Cek apakah data ditemukan
  if (mysqli_num_rows($result) === 1) { // jika ditemukan 1 baris data
    $row = mysqli_fetch_assoc($result);

    // Verifikasi password
    if (password_verify($password, $row["password"])) {
      // Set session untuk login
      $_SESSION["email"] = $row["email"];
      $_SESSION["username"] = $row["username"];  // Bisa juga set username jika ingin

      // Login berhasil, pindah ke halaman dashboard
      header("Location: ../dashboard.php");
      exit;
    } else {
      // Password salah
      $errorPassword = 'Password yang Anda masukkan salah.';
    }
  } else {
    // Email atau username tidak ditemukan
    $errorPopup = 'Harap membuat akun terlebih dahulu 😊.';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

  <link rel="stylesheet" href="../../output.css" />
  <!-- <link rel="stylesheet" href="../../styles/Authentication/login.css"> -->

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
</head>

<body class="font-poppins h-screen flex m-0">
  <div class="fixed w-full md:w-[70%] h-[200px] md:h-full">
    <!-- Background Image -->
    <img
      src="../../assets/images/documentation/florera.png"
      alt="Florera Background"
      class="absolute inset-0 w-full h-full object-cover" />
    <!-- Logo -->
    <div class="absolute flex top-2 md:top-6 left-2 md:left-6">
      <img
        class="w-20 h-auto"
        src="../../assets/images/logo/logo.png"
        alt="" />
      <a href="../../../index.php" class="font-semibold text-lg text-white block py-6 hover:underline">
        FLORERA
      </a>
    </div>
    <!-- Text -->
    <div class="absolute inset-0 flex flex-col justify-center mt-16 md:mt-0">
      <h1
        class="text-base md:text-3xl font-semibold text-white pr-10 md:pr-60 pl-10">
        "Jadikan
        <span class="text-green-800 bg-slate-100 px-4 rounded-md">Florera Sahabat Terbaik</span>
        dalam Perjalanan berkebun Anda"
      </h1>
      <p class="pl-10">
        <span class="text-sm md:text-lg text-green-800 px-4 py-0.5 bg-slate-100 rounded-md">- Go green 🌱 with Florera -</span>
      </p>
    </div>
  </div>

  <!-- Right Section with Login Form -->
  <div
    class="flex absolute w-[100%] mt-[140px] md:mt-0 md:left-[900px] md:w-[400px] top-10 rounded-xl items-center bg-white">
    <div class="bg-white rounded-xl shadow-md p-8 w-full">
      <h2 class="text-2xl font-bold text-center text-gray-700">
        Selamat datang Flokers
      </h2>
      <p class="text-sm text-center text-gray-500 mb-6">
        Masuk ke akun Florera Anda
      </p>
      <!-- Standard Login Form -->
      <form action="#" method="post">
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-600">Mail Address / username</label>
          <input
            type="text"
            id="email"
            name="email"
            autocomplete="off"
            placeholder="Masukkan Mail/username Anda"
            required
            class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800" />
        </div>
        <div class="mb-4">
          <label
            for="password"
            class="block text-sm font-medium text-gray-600">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Masukkan password Anda"
            required
            class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800" />
          <!-- Menampilkan pesan error jika password salah -->
          <?php if ($errorPassword) : ?>
            <p class="text-red-500 text-sm mt-1"><?= $errorPassword; ?></p>
          <?php endif; ?>
        </div>
        <div class="flex items-center justify-between mb-4">
          <label class="inline-flex items-center">
            <input
              type="checkbox"
              class="text-green-800 border-gray-300 rounded focus:ring-green-500" />
            <span class="ml-2 text-sm text-gray-600">Ingatkan saya</span>
          </label>
          <a href="#" class="text-sm text-green-800 hover:underline">Lupa Password?</a>
        </div>
        <button
          type="submit"
          name="login"
          class="w-full px-4 py-2 font-semibold text-white bg-green_gw rounded-lg hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500">
          Log In
        </button>
      </form>
      <p class="mt-6 text-sm text-center text-gray-500">
        Belum punya akun?
        <a href="register.php" class="text-green-800 hover:underline">Sign Up</a>
      </p>
      <div class="flex items-center my-6">
        <div class="flex-grow border-t border-gray-300"></div>
        <span class="mx-2 text-sm text-gray-500">Atau login dengan</span>
        <div class="flex-grow border-t border-gray-300"></div>
      </div>
      <!-- Google Login Button -->
      <div class="mb-6">
        <button
          type="button"
          class="flex items-center justify-center w-full px-4 py-2 text-gray-600 bg-gray-100 border rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500">
          <img
            src="https://www.svgrepo.com/show/355037/google.svg"
            alt="Google Logo"
            class="w-5 h-5 mr-2" />
          <p>Log in dengan Google</p>
        </button>
      </div>
    </div>
  </div>

  <!-- Pop-up Akun Tidak Ditemukan -->
  <?php if (!empty($errorPopup)) : ?>
    <div id="popup" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
      <div class="bg-white p-6 rounded-md shadow-md w-80">
        <h2 class="text-lg font-bold text-red-500 mb-4">Akun Tidak Ditemukan!</h2>
        <p class="text-gray-700"><?= $errorPopup; ?></p>
        <div class="mt-4 flex justify-between">
          <button
            onclick="window.location.href='register.php';"
            class="bg-green_gw text-white px-4 py-2 rounded hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
            Register
          </button>
          <button
            id="closePopup"
            class="bg-green_gw text-white px-4 py-2 rounded hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
            OK
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <script src="../../script/Authentication/login.js"></script>
</body>

</html>