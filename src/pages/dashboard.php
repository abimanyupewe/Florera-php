<?php

session_start(); // Mulai sesi

// Cek apakah user sudah login
if (!isset($_SESSION["email"])) {
  // Jika belum login, arahkan ke halaman login
  header("Location: ../login.php");
  exit; // Pastikan exit agar script tidak dilanjutkan
}

// zona waktu
date_default_timezone_set('Asia/Jakarta');

// Ambil jam saat ini
$jam = date('H');

if ($jam >= 5 && $jam < 11) {
  $salam = "Pagi";
} elseif ($jam >= 11 && $jam < 15) {
  $salam = "Siang";
} elseif ($jam >= 15 && $jam < 18) {
  $salam = "Sore";
} else {
  $salam = "Malam";
}

function salam($salam, $username)
{
  return "$salam, $username!";
}


// Ambil email dan username dari session
$username = $_SESSION["username"];
$email = $_SESSION["email"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Florera Dashboard</title>
  <link rel="stylesheet" href="../styles/dashboard.css" />
  <link rel="stylesheet" href="../output.css" />

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />

  <!-- Alpine JS -->
  <script
    defer
    src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!-- payment gateway midtrans -->
  <script
    type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-FblG6tepZtvtlMcr"></script>
</head>

<body class="bg-white font-poppins">
  <!-- Wrapper -->
  <div class="flex h-screen">
    <!-- Sidebar -->
    <div
      id="sidebar"
      class="fixed top-0 z-10 left-0 w-64 h-full bg-green_gw text-white transform -translate-x-full transition-transform duration-300 md:relative md:translate-x-0 md:flex md:flex-col">
      <!-- Profil -->
      <div class="p-4 flex items-center space-x-4 border-b border-slate-400">
        <img
          src="https://via.placeholder.com/50"
          alt="Profile Picture"
          class="w-12 h-12 rounded-full" />
        <div>
          <p class="font-bold text-sm"><?= htmlspecialchars(string: $username); ?></p>
          <p class="text-xs text-green-200"><?= htmlspecialchars(string: $email); ?></p>
        </div>
      </div>

      <ul class="flex flex-col justify-between flex-grow">
        <li
          id="nav-dashboard"
          class="p-4 hover:bg-green-800 cursor-pointer active"
          onclick="setActiveNav('nav-dashboard'); showPage('dashboard')">
          Dashboard
        </li>
        <li
          id="nav-shop"
          class="p-4 hover:bg-green-800 cursor-pointer"
          onclick="setActiveNav('nav-shop'); showPage('shop')">
          Shop
        </li>
        <li
          id="nav-courses"
          class="p-4 hover:bg-green-800 cursor-pointer"
          onclick="setActiveNav('nav-courses'); showPage('courses')">
          Kursus
        </li>
        <li
          id="nav-profil"
          class="p-4 hover:bg-green-800 cursor-pointer"
          onclick="setActiveNav('nav-profil'); showPage('profil')">
          Profil
        </li>

        <!-- Setelan berada di bagian bawah -->
        <li
          id="nav-settings"
          class="p-4 hover:bg-green-800 cursor-pointer mt-auto"
          onclick="setActiveNav('nav-settings'); showPage('settings')">
          Setelan
        </li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 overflow-y-auto">
      <!-- Header -->
      <div
        x-data
        class="bg-white shadow p-4 w-full md:w-8 fixed flex justify-between items-center">
        <a href="../../index.php" class="text-xl font-medium text-green-800 hover:underline">Florera</a>
        <div class="flex space-x-4">
          <input
            type="text"
            placeholder="Cari..."
            class="border w-28 md:w-auto rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-slate-100" />
          <button
            id="cart"
            class="relative flex items-center justify-center w-10 h-10 rounded-full hover:bg-slate-100"
            onclick="showPage('keranjang')">
            <!-- Icon -->
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="2"
              stroke="currentColor"
              class="w-6 h-6">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M3 3h2l.4 2m0 0L7.6 15h8.8l2.2-8H5.4M7.6 15l-.4 2m10.4-2-.4 2M9 20h1m4 0h1m-7 0a1 1 0 100 2 1 1 0 000-2zm6 0a1 1 0 100 2 1 1 0 000-2z" />
            </svg>
            <!-- Notification Badge -->
            <span
              x-show="$store.cart.quantity"
              x-text="$store.cart.quantity"
              id="cart-badge"
              class="absolute top-0 right-0 w-4 h-4 bg-red-500 text-xs text-white rounded-full flex items-center justify-center">
            </span>
          </button>
        </div>
        <!-- Hamburger Button -->
        <button
          id="hamburger"
          class="block md:hidden focus:outline-none"
          onclick="toggleSidebar()">
          <span
            class="block w-6 h-0.5 bg-black my-1 transition-transform duration-300"></span>
          <span
            class="block w-6 h-0.5 bg-black my-1 transition-transform duration-300"></span>
          <span
            class="block w-6 h-0.5 bg-black my-1 transition-transform duration-300"></span>
        </button>
      </div>

      <!-- Content -->
      <div class="p-4 mt-20">
        <div id="content">
          <!-- dashboard page -->
          <div id="dashboard" class="page">
            <div>
              <!-- Welcome Banner -->
              <div
                class="bg-green_gw text-white p-4 rounded-md shadow-md mb-6">
                <h2 class="text-xl md:text-2xl font-medium">Hai, Selamat <?= salam($salam, $username); ?></h2>
                <p class="text-sm font-light md:text-base">
                  Lihat perkembangan kursus dan promo terbaru di sini.
                </p>
              </div>

              <!-- Statistik Singkat -->
              <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                <div
                  class="bg-white border p-4 rounded-lg shadow-md text-center">
                  <h3 class="text-xl font-medium text-slate-500">
                    Kursus Diikuti
                  </h3>
                  <p class="text-2xl text-green_gw font-bold">0</p>
                </div>
                <div
                  class="bg-white border p-4 rounded-lg shadow-md text-center">
                  <h3 class="text-xl font-medium text-slate-500">Pesanan</h3>
                  <p class="text-2xl text-green_gw font-bold">0</p>
                </div>
                <div
                  class="bg-white border p-4 rounded-lg shadow-md text-center">
                  <h3 class="text-xl font-medium text-slate-500">
                    Poin Reward
                  </h3>
                  <p class="text-2xl text-green_gw font-bold">0</p>
                </div>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Promo Produk -->
                <div class="bg-green-100 p-4 rounded-md shadow-md">
                  <h3 class="text-lg font-semibold mb-2">Promo Spesial</h3>
                  <p class="text-gray-700">
                    Diskon hingga 50% untuk produk Pupuk Organik!
                  </p>
                  <a href="#" class="text-green-500 font-bold hover:underline">Belanja Sekarang</a>
                </div>

                <!-- Kursus Sedang Diikuti -->
                <div class="bg-white p-4 rounded-lg shadow-md border">
                  <h3 class="text-xl font-medium text-slate-800 mb-4">
                    Kursus Sedang Diikuti
                  </h3>
                  <p class="text-center text-slate-400">Belum ada data!</p>
                </div>
                <!-- <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Kursus Sedang Diikuti</h3>
                    <ul class="space-y-2">
                      <li class="flex items-center justify-between">
                        <span>Pemangkasan Tanaman</span>
                        <a href="#" class="text-green-500 hover:underline">Lanjutkan</a>
                      </li>
                      <li class="flex items-center justify-between">
                        <span>Merawat Tanaman Bunga</span>
                        <a href="#" class="text-green-500 hover:underline">Lanjutkan</a>
                      </li>
                    </ul>
                  </div> -->
              </div>
            </div>
          </div>
          <!-- shop page -->
          <div id="shop" class="page hidden px-4" x-data="produk">
            <!-- Shop Section -->
            <!-- Banner -->
            <div
              class="bg-green-800 text-white h-40 content-center p-6 rounded-md mb-6 text-center shadow-md">
              <h2 class="text-xl md:text-2xl font-bold mb-2">
                Diskon Spesial 50%!
              </h2>
              <p class="text-base md:text-lg">
                Belanja sekarang dan nikmati diskon hingga 50% untuk semua
                produk.
              </p>
            </div>

            <!-- Products -->
            <div
              id="products"
              class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
              <template x-for="(item, index) in items" x-key="index">
                <!-- Product Card -->
                <div
                  class="bg-white p-4 rounded-lg shadow-md w-full sm:w-64 lg:w-72 cursor-pointer">
                  <img
                    :src="`../assets/images/products/${item.img}`"
                    :alt="item.name"
                    class="rounded-lg w-full h-[450px] lg:h-60 object-cover mb-4" />
                  <h3
                    x-text="item.name"
                    class="text-lg sm:text-xl font-semibold"></h3>
                  <p
                    x-text="item.description"
                    class="text-gray-600 mt-2 text-sm sm:text-base"></p>
                  <p
                    x-text="rupiah(item.price)"
                    class="text-green-500 font-semibold mt-2 text-base sm:text-lg"></p>
                  <!-- Add to Cart Button -->
                  <button
                    @click="$store.cart.add(item)"
                    class="w-full mt-4 bg-green_gw text-white py-2 rounded-lg hover:bg-green-800 transition text-sm sm:text-base">
                    Add to Cart
                  </button>
                </div>
              </template>
            </div>
          </div>
          <!-- shop page end -->

          <!-- kursus page -->
          <div id="courses" class="page hidden">
            <!-- Kursus Section -->
            <div
              id="courses"
              class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              <!-- Card -->
              <div class="bg-white shadow-md rounded-md p-4">
                <img
                  src="https://via.placeholder.com/300x200"
                  alt="Kursus Placeholder"
                  class="w-full h-48 object-cover rounded-md" />
                <div class="mt-4">
                  <h3 class="font-bold text-lg">Kursus 1</h3>
                  <p class="text-gray-600">Deskripsi singkat kursus.</p>
                  <div class="flex items-center text-yellow-500 mt-2">
                    <span>⭐</span>
                    <span class="text-gray-500 ml-2 text-sm">(4.5)</span>
                  </div>
                  <p class="mt-2 text-green-700 font-semibold">Rp 500,000</p>
                  <p class="text-gray-500 text-sm">Mentor: John Doe</p>
                  <a
                    href="Course/course.php"
                    class="mt-4 bg-green-700 text-white px-4 py-2 rounded-md hover:bg-green-800 transition block text-center">
                    Beli Kursus
                  </a>
                </div>
              </div>
              <!-- Card -->
              <div class="bg-white shadow-md rounded-md p-4">
                <!-- Placeholder Image -->
                <img
                  src="https://via.placeholder.com/300x200"
                  alt="Kursus Placeholder"
                  class="w-full h-48 object-cover rounded-md" />
                <!-- Content -->
                <div class="mt-4">
                  <h3 class="font-bold text-lg">Kursus 1</h3>
                  <p class="text-gray-600">Deskripsi singkat kursus.</p>
                  <div class="flex items-center text-yellow-500 mt-2">
                    <!-- Rating (can be replaced with icons if needed) -->
                    <span>⭐</span>
                    <span class="text-gray-500 ml-2 text-sm">(4.5)</span>
                  </div>
                  <p class="mt-2 text-green-700 font-semibold">Rp 500,000</p>
                  <p class="text-gray-500 text-sm">Mentor: John Doe</p>
                  <button
                    class="mt-4 bg-green-700 text-white px-4 py-2 rounded-md hover:bg-green-800 transition block text-center">
                    Beli Kursus
                  </button>
                </div>
              </div>
              <!-- Card -->
              <div class="bg-white shadow-md rounded-md p-4">
                <!-- Placeholder Image -->
                <img
                  src="https://via.placeholder.com/300x200"
                  alt="Kursus Placeholder"
                  class="w-full h-48 object-cover rounded-md" />
                <!-- Content -->
                <div class="mt-4">
                  <h3 class="font-bold text-lg">Kursus 1</h3>
                  <p class="text-gray-600">Deskripsi singkat kursus.</p>
                  <div class="flex items-center text-yellow-500 mt-2">
                    <!-- Rating (can be replaced with icons if needed) -->
                    <span>⭐</span>
                    <span class="text-gray-500 ml-2 text-sm">(4.5)</span>
                  </div>
                  <p class="mt-2 text-green-700 font-semibold">Rp 500,000</p>
                  <p class="text-gray-500 text-sm">Mentor: John Doe</p>
                  <button
                    class="mt-4 bg-green-700 text-white px-4 py-2 rounded-md hover:bg-green-800 transition">
                    Beli Kursus
                  </button>
                </div>
              </div>
              <!-- Card -->
              <div class="bg-white shadow-md rounded-md p-4">
                <!-- Placeholder Image -->
                <img
                  src="https://via.placeholder.com/300x200"
                  alt="Kursus Placeholder"
                  class="w-full h-48 object-cover rounded-md" />
                <!-- Content -->
                <div class="mt-4">
                  <h3 class="font-bold text-lg">Kursus 1</h3>
                  <p class="text-gray-600">Deskripsi singkat kursus.</p>
                  <div class="flex items-center text-yellow-500 mt-2">
                    <!-- Rating (can be replaced with icons if needed) -->
                    <span>⭐</span>
                    <span class="text-gray-500 ml-2 text-sm">(4.5)</span>
                  </div>
                  <p class="mt-2 text-green-700 font-semibold">Rp 500,000</p>
                  <p class="text-gray-500 text-sm">Mentor: John Doe</p>
                  <button
                    class="mt-4 bg-green-700 text-white px-4 py-2 rounded-md hover:bg-green-800 transition">
                    Beli Kursus
                  </button>
                </div>
              </div>
              <!-- Card -->
              <div class="bg-white shadow-md rounded-md p-4">
                <!-- Placeholder Image -->
                <img
                  src="https://via.placeholder.com/300x200"
                  alt="Kursus Placeholder"
                  class="w-full h-48 object-cover rounded-md" />
                <!-- Content -->
                <div class="mt-4">
                  <h3 class="font-bold text-lg">Kursus 1</h3>
                  <p class="text-gray-600">Deskripsi singkat kursus.</p>
                  <div class="flex items-center text-yellow-500 mt-2">
                    <!-- Rating (can be replaced with icons if needed) -->
                    <span>⭐</span>
                    <span class="text-gray-500 ml-2 text-sm">(4.5)</span>
                  </div>
                  <p class="mt-2 text-green-700 font-semibold">Rp 500,000</p>
                  <p class="text-gray-500 text-sm">Mentor: John Doe</p>
                  <button
                    class="mt-4 bg-green-700 text-white px-4 py-2 rounded-md hover:bg-green-800 transition">
                    Beli Kursus
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- kursus page end -->

          <!-- keranjang page -->
          <div id="keranjang" class="page hidden" x-data="produk">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
              <!-- Produk Container -->
              <div class="lg:col-span-2">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                  <template
                    x-for="(item, index) in $store.cart.items"
                    x-keys="index">
                    <!-- Card -->
                    <div
                      class="flex flex-wrap bg-white shadow-md rounded-lg p-4 items-center">
                      <img
                        :src="`../assets/images/products/${item.img}`"
                        :alt="item.name"
                        class="w-24 h-24 object-cover rounded-lg mr-4" />
                      <div class="flex-1">
                        <h2
                          x-text="item.name"
                          class="text-lg font-semibold text-gray-800"></h2>
                        <div class="flex items-center mt-2 text-sm">
                          <p class="text-gray-700 font-medium">
                            Harga : <span x-text="rupiah(item.price)"></span>
                          </p>
                        </div>
                        <div class="flex items-center mt-3 space-x-2 text-sm">
                          <!-- Button - -->
                          <button
                            id="remove"
                            @click="$store.cart.remove(item.id)"
                            class="py-1 px-3 bg-green_gw hover:bg-green-700 text-white rounded-lg">
                            &minus;
                          </button>
                          <!-- Jumlah -->
                          <span
                            x-text="item.quantity"
                            class="px-2 text-gray-800 font-semibold"></span>
                          <!-- Button + -->
                          <button
                            id="add"
                            @click="$store.cart.add(item)"
                            class="py-1 px-3 bg-green_gw hover:bg-green-700 text-white rounded-lg">
                            &plus;
                          </button>
                          <!-- Total -->
                          <p class="text-gray-700 font-medium">
                            <span
                              x-text="rupiah(item.total)"
                              class="ml-4"></span>
                          </p>
                        </div>
                      </div>
                    </div>
                  </template>
                  <h4
                    x-show="!$store.cart.items.length"
                    class="text-center text-gray-600 flex justify-center items-center">
                    Keranjang masih kosong!!
                  </h4>
                </div>
                <div class="mt-6 text-right">
                  <h4
                    x-show="$store.cart.items.length"
                    class="text-lg font-semibold">
                    Total : <span x-text="rupiah($store.cart.total)"></span>
                  </h4>
                </div>
              </div>

              <!-- Form Container -->
              <div
                x-show="$store.cart.items.length"
                class="bg-white form-container shadow-md rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">
                  Informasi Pembeli
                </h2>
                <form
                  id="checkoutForm">
                  <input
                    type="hidden"
                    name="items"
                    x-model="JSON.stringify($store.cart.items)" />
                  <input
                    type="hidden"
                    name="total"
                    x-model="$store.cart.total" />
                  <!-- Nama -->
                  <div class="mb-4">
                    <label
                      for="nama"
                      class="block text-sm font-medium text-gray-700">Nama</label>
                    <input
                      type="text"
                      id="nama"
                      name="nama"
                      autocomplete="off"
                      placeholder="Masukkan nama"
                      class="w-full mt-1 px-4 py-2 border rounded-lg text-gray-800 focus:ring-green-500 focus:border-green-500" />
                  </div>
                  <!-- Email -->
                  <div class="mb-4">
                    <label
                      for="email"
                      class="block text-sm font-medium text-gray-700">Email</label>
                    <input
                      type="email"
                      id="email"
                      name="email"
                      autocomplete="off"
                      placeholder="Masukkan mail"
                      class="w-full mt-1 px-4 py-2 border rounded-lg text-gray-800 focus:ring-green-500 focus:border-green-500" />
                  </div>
                  <!-- Nomor WhatsApp -->
                  <div class="mb-4">
                    <label
                      for="whatsapp"
                      class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                    <input
                      type="number"
                      id="whatsapp"
                      name="whatsapp"
                      autocomplete="off"
                      placeholder="Masukkan nomor WA"
                      class="w-full mt-1 px-4 py-2 border rounded-lg text-gray-800 focus:ring-green-500 focus:border-green-500" />
                  </div>
                  <!-- Alamat -->
                  <div class="mb-4">
                    <label
                      for="alamat"
                      class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea
                      id="alamat"
                      name="alamat"
                      placeholder="Masukkan alamat"
                      rows="4"
                      class="w-full mt-1 px-4 py-2 border rounded-lg text-gray-800 focus:ring-green-500 focus:border-green-500"></textarea>
                  </div>
                  <!-- Kota -->
                  <div class="mb-4">
                    <label
                      for="alamat"
                      class="block text-sm font-medium text-gray-700">Kota</label>
                    <input
                      type="text"
                      id="kota"
                      name="kota"
                      autocomplete="off"
                      placeholder="Masukkan kota Anda"
                      class="w-full mt-1 px-4 py-2 border rounded-lg text-gray-800 focus:ring-green-500 focus:border-green-500" />
                  </div>
                  <!-- Kode pos -->
                  <div class="mb-4">
                    <label
                      for="kode pos"
                      class="block text-sm font-medium text-gray-700">Kode Pos</label>
                    <input
                      type="number"
                      id="kode_pos"
                      name="kode_pos"
                      autocomplete="off"
                      placeholder="Masukkan Kode pos"
                      class="w-full mt-1 px-4 py-2 border rounded-lg text-gray-800 focus:ring-green-500 focus:border-green-500" />
                  </div>
                  <!-- Submit Button -->
                  <button
                    type="submit"
                    id="checkout-button"
                    value="chackout"
                    class="w-full checkout-button disabled py-2 px-4 bg-green_gw text-white font-semibold rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Checkout
                  </button>
                </form>
              </div>
            </div>
          </div>
          <!-- keranjang page end -->
        </div>

        <!-- profile page -->
        <div id="profil" class="page hidden">
          Ini adalah halaman profil
          <!-- Kursus Section -->
          <div id="profil">
            <h2 class="text-2xl font-bold mb-4">Profil</h2>

          </div>
        </div>
        <!-- kursus page end -->

        <!-- settings page -->
        <div id="settings" class="page hidden">
          <!-- Kursus Section -->
          <div id="settings">
            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto">
              <!-- Header -->
              <header class="bg-white shadow py-4 px-6 flex justify-between items-center">
                <h1 class="text-xl font-bold text-gray-700">Setelan</h1>
              </header>

              <!-- Settings Content -->
              <section class="px-6 py-8">
                <!-- Notifications Section -->
                <div id="notifications" class="bg-white rounded-lg shadow-md p-6 mb-8">
                  <h2 class="text-lg font-semibold text-gray-700 mb-4">Notifikasi</h2>
                  <form action="#" method="POST" class="space-y-4">
                    <div>
                      <label class="inline-flex items-center">
                        <input
                          type="checkbox"
                          class="text-green-800 border-gray-300 rounded focus:ring-green-500" />
                        <span class="ml-2 text-gray-700">Aktifkan notifikasi Email</span>
                      </label>
                    </div>
                  </form>
                </div>

                <!-- Logout Section -->
                <div id="logout" class="bg-white rounded-lg shadow-md p-6">
                  <form action="Authentication/logout.php" method="post">
                    <button
                      onclick="window.location.href='logout.php';"
                      class="px-4 py-2 bg-red-400 text-white rounded hover:bg-red-500">
                      Logout
                    </button>
                  </form>
                </div>
              </section>
            </main>
          </div>
        </div>
        <!-- settings page end -->
      </div>
    </div>
  </div>

  <script src="../script/dashboard.js"></script>

  <!-- data produk -->
  <script src="../data/produk.js"></script>
</body>

</html>