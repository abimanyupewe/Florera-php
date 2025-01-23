<?php
session_start();

require 'php/functions/function.php';

$isLoggedIn = isset($_SESSION['username']); // Anggap user_id disimpan saat login
// $userPhoto = $isLoggedIn ? $_SESSION['user']['photo'] : ''; // Ambil foto profil user
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- tailwind -->
  <link rel="stylesheet" href="src/output.css" />

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />

  <!-- animation scroll -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- icons feather -->
  <script src="https://unpkg.com/feather-icons"></script>
  <title>Go Green With Florera</title>
</head>

<body class="font-poppins m-0">

  <!-- pop up info -->
  <section>
    <!-- <div id="popup-info" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
      <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full text-center">
        <!-- <h2 class="text-xl font-bold mb-4">Selamat Datang di Florera!</h2>
        <p class="mb-4">Temukan media tanam, pupuk, bibit, dan kursus berkebun terbaik di sini.</p>
        <p>Ikuti sosial media kami</p> -->
    <!-- sosmed -->
    <!-- <div class="flex pt-3 gap-x-2 justify-center mb-4">
          <div class="p-1.5 rounded-full">
            <i data-feather="instagram" class="text-green_gw"></i>
          </div>
          <div class="p-1.5 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0,0,256,256">
              <g fill="#163020" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                <g transform="scale(5.12,5.12)">
                  <path d="M9,4c-2.75042,0 -5,2.24958 -5,5v32c0,2.75042 2.24958,5 5,5h32c2.75042,0 5,-2.24958 5,-5v-32c0,-2.75042 -2.24958,-5 -5,-5zM9,6h32c1.67158,0 3,1.32842 3,3v32c0,1.67158 -1.32842,3 -3,3h-32c-1.67158,0 -3,-1.32842 -3,-3v-32c0,-1.67158 1.32842,-3 3,-3zM26.04297,10c-0.5515,0.00005 -0.99887,0.44655 -1,0.99805c0,0 -0.01098,4.87522 -0.02148,9.76172c-0.0053,2.44325 -0.01168,4.88902 -0.01562,6.73047c-0.00394,1.84145 -0.00586,3.0066 -0.00586,3.10352c0,1.81526 -1.64858,3.29883 -3.52734,3.29883c-1.86379,0 -3.35156,-1.48972 -3.35156,-3.35352c0,-1.86379 1.48777,-3.35156 3.35156,-3.35156c0.06314,0 0.1904,0.02075 0.4082,0.04688c0.28415,0.03406 0.56927,-0.05523 0.78323,-0.24529c0.21396,-0.19006 0.33624,-0.46267 0.33591,-0.74885v-4.20117c-0.00005,-0.528 -0.41054,-0.965 -0.9375,-0.99805c-0.15583,-0.0098 -0.35192,-0.0293 -0.58984,-0.0293c-5.24953,0 -9.52734,4.27782 -9.52734,9.52734c0,5.24953 4.27782,9.52734 9.52734,9.52734c5.24938,0 9.52734,-4.27782 9.52734,-9.52734v-9.04883c1.45461,1.16341 3.26752,1.90039 5.26953,1.90039c0.27306,0 0.53277,-0.01618 0.78125,-0.03906c0.51463,-0.04749 0.90832,-0.47927 0.9082,-0.99609v-4.66992c0.0003,-0.52448 -0.40463,-0.9601 -0.92773,-0.99805c-3.14464,-0.22561 -5.65141,-2.67528 -5.97852,-5.79102c-0.05305,-0.50925 -0.48214,-0.89619 -0.99414,-0.89648zM27.04102,12h2.28125c0.72678,3.2987 3.30447,5.8144 6.63672,6.44531v2.86523c-2.13887,-0.10861 -4.01749,-1.1756 -5.12305,-2.85742c-0.24284,-0.36962 -0.69961,-0.53585 -1.12322,-0.40877c-0.4236,0.12708 -0.71344,0.51729 -0.71272,0.95955v11.53516c0,4.16848 -3.35873,7.52734 -7.52734,7.52734c-4.16848,0 -7.52734,-3.35887 -7.52734,-7.52734c0,-4.00052 3.12077,-7.17588 7.05469,-7.43164v2.17578c-2.71358,0.25252 -4.87891,2.47904 -4.87891,5.25586c0,2.94421 2.40735,5.35352 5.35156,5.35352c2.92924,0 5.52734,-2.30609 5.52734,-5.29883c0,0.04892 0.00186,-1.25818 0.00586,-3.09961c0.0039,-1.84143 0.01037,-4.28722 0.01563,-6.73047c0.0094,-4.3869 0.0177,-7.91447 0.01953,-8.76367z"></path>
                </g>
              </g>
            </svg>
          </div>
        </div> -->
    <!-- <button id="close-popup" class="bg-green_gw text-white px-4 py-2 rounded-lg hover:bg-green-800 transition">
          Mulai Jelajahi
        </button> -->
    <!-- </div> -->
    <!-- </div>  -->
  </section>
  <!-- pop up info end -->

  <!-- pleace holder wa -->
  <section>
    <div id="whatsapp-button" class="fixed bottom-5 right-5 z-20">
      <a
        href="https://wa.me/6285643124688?text=Halo%20Florera!%20Saya%20ingin%20bertanya%20tentang%20produk%20Anda."
        target="_blank"
        class="flex items-center space-x-3 bg-green_gw text-white px-4 py-4 rounded-full shadow-lg hover:bg-green-800 transition duration-300">
        <img
          src="https://img.icons8.com/ios-filled/50/ffffff/whatsapp.png"
          alt="WhatsApp"
          class="w-6 h-6" />
        <span class="font-semibold hidden md:block">Chat kami</span>
      </a>
    </div>
  </section>
  <!-- pleace holder wa -->

  <!-- pop up login dulu 1 -->
  <div id="popupSaran" class="hidden fixed z-50 inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-80">
      <h2 class="text-lg font-semibold mb-4">Hi Flokers.</h2>
      <p class="text-gray-600 mb-6">Anda perlu login atau register untuk mengakses fitur ini 😊.</p>
      <div class="flex justify-evenly">
        <a
          href="src/pages/Authentication/login.php"
          class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-800 transition">
          Login
        </a>
        <a
          href="src/pages/Authentication/register.php"
          class="px-4 py-2 bg-green_gw text-white rounded-lg hover:bg-green-800 transition">
          Register
        </a>
        <button
          id="closePopup"
          class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-600 transition">
          Oke
        </button>
      </div>
    </div>
  </div>
  <!-- pop up login dulu 1 end -->

  <!-- hero section -->
  <section id="hero" class="w-full bg-green_gw">
    <div class="relative">
      <!-- Navigation -->
      <!-- Header Start -->
      <header
        class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
        <div class="container mx-auto sm:px-16 md:px-8 lg:px-12">
          <div class="flex items-center justify-between relative">
            <!-- Element Kiri (Brand) -->
            <div class="flex">
              <img
                class="w-20 h-auto"
                src="src/assets/images/logo/logo.png"
                alt="" />
              <a href="#home" class="font-semibold text-lg text-white block py-6 hover:underline">
                FLORERA
              </a>
            </div>
            <!-- Element Kanan (Navigation) -->
            <div class="flex items-center px-5">
              <!-- Hamburger Menu for Mobile -->
              <button
                id="hamburger"
                name="hamburger"
                type="button"
                class="block absolute right-4 lg:hidden">
                <span
                  class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                <span
                  class="hamburger-line transition duration-300 ease-in-out"></span>
                <span
                  class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
              </button>

              <!-- Navbar for Larger Screens -->
              <nav
                id="nav-menu"
                class="lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none hidden absolute py-5 shadow-lg bg-green_gw opacity-90 rounded-lg max-w-[250px] w-full right-4 top-full">
                <ul class="block lg:flex">
                  <li class="group">
                    <a
                      href="#home"
                      class="text-base font-normal text-white py-2 mx-8 flex hover:underline">Home</a>
                  </li>
                  <li class="group">
                    <a
                      href="#product"
                      class="text-base font-normal text-white py-2 mx-8 flex hover:underline">Shop</a>
                  </li>
                  <li class="group">
                    <a
                      href="#course"
                      class="text-base font-normal text-white py-2 mx-8 flex hover:underline">Course</a>
                  </li>
                  <li class="group">
                    <a
                      href="#testi"
                      class="text-base font-normal text-white py-2 mx-8 flex hover:underline">Testimonial
                    </a>
                  </li>
                  <li class="group">
                    <a
                      href="#blog"
                      class="text-base font-normal text-white py-2 mx-8 flex hover:underline">Blog
                    </a>
                  </li>
                  <li class="group">
                    <a
                      href="#about-us"
                      class="text-base font-normal text-white py-2 mx-8 flex hover:underline">About Us</a>
                  </li>
                  <li class="group lg:hidden">
                    <!-- Conditional Button -->
                    <?php if ($isLoggedIn): ?>
                      <!-- Dashboard Button -->
                      <div class="relative group ml-4">
                        <button class="flex items-center space-x-3 bg-green_pastel px-4 p-0.5 rounded-lg hover:bg-gray-200">
                          <!-- <img
                    src="<?= $userPhoto ?: 'src/assets/default-avatar.png'; ?>"
                    alt="User Photo"
                    class="w-8 h-8 rounded-full object-cover"> -->

                          <span class="text-green_gw font-medium">Dashboard</span>
                          <img
                            src="https://via.placeholder.com/50"
                            alt="Profile Picture"
                            class="w-12 h-12 rounded-full" />
                        </button>
                        <!-- Dropdown Menu -->
                        <div class="absolute hidden group-hover:block bg-white shadow-md rounded-md w-[180px]">
                          <a href="src/pages/dashboard.php" class="block px-4 py-2 text-green_gw hover:bg-gray-100 hover:rounded-md">Go to Dashboard</a>
                          <a href="src/pages/logout.php" class="block px-4 py-2 text-green_gw hover:bg-gray-100 hover:rounded-md">Logout</a>
                        </div>
                      </div>
                    <?php else: ?>
                      <!-- Login Button -->
                      <a
                        href="src/pages/Authentication/login.php"
                        class="text-base font-normal text-white py-2 mx-8 flex group-hover:text-yellow_gw hover:underline">Login</a>

                    <?php endif; ?>
                  </li>
                  <!-- Tambahkan Login ke daftar untuk Mobile -->
                </ul>
              </nav>
            </div>
            <!-- Tombol Cart -->

            <!-- Conditional Button -->
            <?php if ($isLoggedIn): ?>
              <!-- Dashboard Button -->
              <div class="relative group hidden md:block">
                <button class="flex items-center space-x-3 bg-green_pastel px-4 p-0.5 rounded-lg hover:bg-gray-200">
                  <!-- <img
                    src="<?= $userPhoto ?: 'src/assets/default-avatar.png'; ?>"
                    alt="User Photo"
                    class="w-8 h-8 rounded-full object-cover"> -->

                  <span class="text-gray-700 font-medium">Dashboard</span>
                  <img
                    src="https://via.placeholder.com/50"
                    alt="Profile Picture"
                    class="w-12 h-12 rounded-full" />
                </button>
                <!-- Dropdown Menu -->
                <div class="absolute right-0 hidden group-hover:block bg-white shadow-md rounded-md w-[180px]">
                  <a href="src/pages/dashboard.php" class="block px-4 py-2 text-green_gw hover:bg-gray-100 hover:rounded-md">Go to Dashboard</a>
                  <a href="src/pages/Authentication/logout.php" class="block px-4 py-2 text-green_gw hover:bg-gray-100 hover:rounded-md">Logout</a>
                </div>
              </div>
            <?php else: ?>
              <!-- Login Button -->
              <a
                href="src/pages/login.php"
                class="text-base font-semibold bg-green_pastel text-green_gw py-2 rounded-md ml-8 hover:text-white hover:bg-green_pastel hover:opacity-80 transition px-10 hidden md:block">
                Login
              </a>
            <?php endif; ?>
          </div>
        </div>
      </header>
      <!-- Header End -->

      <!-- Hero Section -->
      <section
        class="h-screen w-full flex items-center justify-center bg-cover bg-center padding">
        <div class="flex flex-wrap">
          <div
            class="w-full p-10 md:p-[50px] lg:w-1/2 self-center space-y-4 mt-0 md:mt-0">
            <div class="text-center w-full">
              <h1 class="text-xl md:text-5xl font-bold text-white">
                Dari <span class="text-white bg-green_pastel rounded-md">Alam</span>, Untuk
                <span class="text-white bg-green_pastel rounded-md">Alam</span>.
              </h1>
            </div>
            <div class="text-center md:w-full">
              <p class="font-medium text-white">
                Tumbuhkan Tanaman Sehat dengan Pupuk Organik Berkualitas dari
                Bahan Terbaik untuk Lingkungan yang Lebih Baik
              </p>
            </div>
            <div class="flex space-x-4 justify-center">
              <a
                href="#"
                class="text-base font-semibold bg-green_pastel py-3 px-10 rounded-md text-green_gw hover:shadow-lg hover:bg-green_pastel hover:text-white hover:opacity-80 transition duration-200 ease-in-out">
                Course
              </a>
              <a
                href="#"
                class="text-base font-semibold bg-green_pastel py-3 px-10 rounded-md text-green_gw hover:shadow-lg hover:bg-green_pastel hover:text-white hover:opacity-80 transition duration-200 ease-in-out">
                Shop
              </a>
            </div>
          </div>

          <div
            class="items-center absolute z-20 bottom-[30px] left-1/2 transform w-auto bg-green_pastel rounded-lg shadow-md hover:shadow-lg sm:w-60 sm:p-6 md:flex md:bottom-[40px] md:w-auto md:space-x-10 md:px-10 p-4 px-5 hover:bg-green_pastel hover:opacity-90 text-green_gw hover:text-white">
            <!-- Bagian Total Projects -->
            <div class="text-center">
              <h3 id="total-projects" class="md:text-xl text-lg font-bold">
                0
              </h3>
            </div>
            <div class="text-center">
              <p class="md:text-sm text-xs font-semibold">
                Pupuk organik <br />dihasilkan
              </p>
            </div>
          </div>

          <!-- Bagian kanan: Informasi Utama -->
          <div class="w-full lg:w-1/2">
            <div
              class="mt-4 pl-10 relative lg:mt-9 lg:right-0 w-72 md:w-full sm:w-48">
              <!-- Foto -->
              <img
                src="src/assets/images/background/foto section.png"
                alt="Abimanyu Priyo Widagdo"
                class="ukuran-foto-hero-section mx-auto relative" />
            </div>
          </div>
      </section>
    </div>
  </section>
  <!-- hero section end-->

  <!-- produk kami -->
  <section class="py-10" id="product">
    <div class="container mx-auto px-4">
      <!-- Header and Button -->
      <div data-aos="zoom-in" data-aos-delay="500" class="flex items-center justify-around mb-6 mx-auto md:mx-20">
        <h2 class="text-lg md:text-2xl font-semibold text-gray-700">Produk Kami</h2>
        <!-- Button to Shop Page -->
        <a
          href="<?= $isLoggedIn ? 'src/pages/dashboard.php' : '#' ?>"
          id="goDashboard"
          class="px-6 py-2 bg-green_gw text-white rounded-lg hover:bg-green-800 transition flex items-center space-x-2">
          <i data-feather="shopping-bag"></i>
          <p>Go to Shop</p>
        </a>
      </div>

      <div class="relative max-w-6xl mx-auto overflow-hidden">
        <!-- Slider Cards -->
        <div
          id="productSlider"
          class="flex md:justify-center space-x-4 transition-transform duration-300 overflow-x-auto">
          <!-- Product Card 1 -->
          <div
            data-aos="fade-right" data-aos-delay="500"
            class="bg-white p-4 rounded-lg shadow-md w-60 sm:w-64 md:w-72 cursor-pointer flex-shrink-0">
            <img
              src="src/assets/images/products/Produk-250-ml.jpeg"
              alt="POC 250 ml"
              class="rounded-lg w-full h-60 object-cover mb-4" />
            <h3 class="text-xl font-semibold">Nutrigrow Spray</h3>
            <p class="text-gray-600 mt-2">Pupuk Organik Cair Nutrigrow 250 ml.</p>
            <p class="text-green-500 font-semibold mt-2">Rp 15.000</p>
            <!-- Add to Cart Button -->
            <button
              id="goDashboard"
              onclick="window.location.href='<?= $isLoggedIn ? 'src/pages/dashboard.php' : 'src/pages/Authentication/login.php' ?>';"
              class="w-full mt-4 bg-green_gw text-white py-2 rounded-lg hover:bg-green-800 transition">
              Add to Cart
            </button>
          </div>

          <!-- Product Card 2 -->
          <div
            data-aos="fade-left" data-aos-delay="500"
            class="bg-white p-4 rounded-lg shadow-md w-60 sm:w-64 md:w-72 cursor-pointer flex-shrink-0">
            <img
              src="src/assets/images/products/Produk-100-ml.jpeg"
              alt="POC 100 ml"
              class="rounded-lg w-full h-60 object-cover mb-4" />
            <h3 class="text-xl font-semibold">Nutrigrow Pure</h3>
            <p class="text-gray-600 mt-2">Pupuk Organik Cair Nutrigrow 100 ml.</p>
            <p class="text-green-500 font-semibold mt-2">Rp 25.000</p>
            <!-- Add to Cart Button -->
            <button
              id="goDashboard"
              onclick="window.location.href='<?= $isLoggedIn ? 'src/pages/dashboard.php' : 'src/pages/Authentication/login.php' ?>';"
              class="w-full mt-4 bg-green_gw text-white py-2 rounded-lg hover:bg-green-800 transition">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- produk kami end -->

  <!-- about produk -->
  <section class="w-full mx-auto p-20 flex flex-col md:flex-row items-center justify-center space-y-6 md:space-y-0 md:space-x-20">
    <!-- Image on the Left -->
    <div data-aos="fade-right" data-aos-delay="500" class="w-full md:w-1/3 flex justify-center">
      <img
        id="product-image"
        src="src/assets/images/products/Produk-250-ml.jpeg"
        alt="Produk Tanaman"
        class="w-full h-auto md:h-96 rounded-lg shadow-lg object-cover" />
    </div>

    <!-- Product Information -->
    <div data-aos="zoom-in" data-aos-delay="500" class="w-full md:w-1/3 text-center md:text-left">
      <h2 class="text-2xl font-bold text-blank mb-4">Tentang Produk</h2>
      <p class="text-slate-600 mb-6">
        Produk kami adalah solusi terbaik untuk tanaman Anda. Menyediakan nutrisi yang dibutuhkan untuk pertumbuhan optimal tanaman di berbagai musim.
      </p>

      <!-- Product Filter -->
      <div class="filter mt-6">
        <label for="product-filter" class="block mb-2 text-lg font-semibold">Pilih Produk:</label>
        <select
          id="product-filter"
          class="w-full md:w-3/2 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green_gw"
          onchange="updateProductInfo(this.value)">
          <option value="250ml">Pupuk 250 ml</option>
          <option value="100ml">Pupuk 100 ml</option>
          <option value="media-tanam">Media Tanam</option>
        </select>
      </div>
    </div>

    <!-- Accordion Section -->
    <div data-aos="zoom-in" data-aos-delay="500" class="md:w-2/4 mx-auto">
      <!-- Accordion: Keunggulan -->
      <div class="accordion-item border-b border-t border-gray-300 mt-4">
        <button
          class="accordion-header w-full hover:underline text-left py-4 text-lg font-semibold flex justify-between items-center"
          onclick="toggleAccordion(this)">
          Keunggulan
          <span class="indicator transform transition-transform duration-300">
            <i data-feather="chevron-down"></i>
          </span>
        </button>
        <div id="keunggulan-content" class="accordion-content hidden pl-4 text-slate-600">
          <!-- Default Keunggulan -->
          <p class="py-2">1. Untuk Segala Jenis Tanaman (Bunga, Buah, dan Sayur).</p>
          <p class="py-2">2. TIDAK BERBAU dan Ramah Lingkungan. (100% ORGANIK)</p>
          <p class="py-2">3. Mempercepat pertumbuhan Akar dan Tunas Baru.</p>
          <p class="py-2">4. Mempercepat pertumbuhan Vegetatif dan Generatif sekaligus.</p>
          <p class="py-2">5. Aman digunakan terhadap Semua Tanaman di Semua Musim.</p>
          <p class="py-2">6. Meningkatkan Hasil Panen secara alami dan aman.</p>
          <p class="py-2">7. Mengandung Nutrisi Esensial yang membantu fotosintesis tanaman.</p>
          <p class="py-2">8. Dapat dikombinasikan dengan Pupuk Makro/Mikro kimia.</p>
        </div>
      </div>

      <!-- Accordion: Cara Pemakaian -->
      <div data-aos="zoom-in" data-aos-delay="500" class="accordion-item border-b border-gray-300">
        <button
          class="accordion-header w-full hover:underline text-left py-4 text-lg font-semibold flex justify-between items-center"
          onclick="toggleAccordion(this)">
          Cara Pemakaian
          <span class="indicator transform transition-transform duration-300">
            <i data-feather="chevron-down"></i>
          </span>
        </button>
        <div id="pemakaian-content" class="accordion-content hidden pl-4 text-slate-600">
          <!-- Default Cara Pemakaian -->
          <p class="py-2">1. Kocok terlebih dahulu sebelum digunakan.</p>
          <p class="py-2">2. Spray pada belakang permukaan daun dan batang tanaman.</p>
          <p class="py-2">3. Aman di gunakan setiap hari (Rekomendasi pemakaian gunakan 3 atau 4 kali seminggu).</p>
          <p class="py-2">4. Waktu aplikasi paling baik adalah Pagi hari jam 07.00 - 10.00 Pagi atau 16.00 -18.00 Sore.</p>
          <p class="py-2">5. Simpan ditempat kering dan jauhkan dari jangkauan anak-anak.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- about produk end -->

  <!-- kursus kami -->
  <section class="w-full max-w-5xl mx-auto p-8 text-center" id="course">
    <h2 data-aos="zoom-in" data-aos-delay="500" class="text-3xl font-bold text-gray-800 mb-8">Kursus Kami</h2>

    <!-- Course Slider -->
    <div class="relative px-0 md:px-10">
      <div
        id="courseSlider"
        class="flex overflow-x-auto space-x-6 scroll-smooth">
        <!-- Course Card 1 -->
        <div data-aos="fade-right" data-aos-delay="500" class="bg-white rounded-lg shadow-lg w-72 h-full flex-shrink-0">
          <img
            src="src/assets/images/pexels-greta-hoffman-7728970.jpg"
            alt="Thumbnail Course 1"
            class="w-full h-48 object-cover" />
          <div class="p-4 text-left">
            <h3 class="text-xl font-semibold text-gray-800">
              Urban Farming Dasar
            </h3>
            <p class="text-gray-600 mt-2">
              Pelajari cara memulai urban farming di rumah Anda sendiri. Kursus ini akan membimbing Anda dari awal hingga Anda memiliki kebun keringat sendiri.
            </p>
            <div class="flex items-center mt-3 text-yellow-500">
              <span>★★★★☆</span>
              <span class="text-gray-500 text-sm ml-2">(4.5)</span>
            </div>
            <p class="text-gray-700 mt-2">
              Mentor: <span class="font-medium">Jon</span>
            </p>
            <div class="flex">
              <p class="text-gray-500 font-semibold mt-2" style="text-decoration: line-through;">Rp 250.000</p>
              <p class="text-green-600 font-bold mt-2 ml-2">Gratis</p>
            </div>
            <button
              id="goDashboard"
              onclick="window.location.href='<?= $isLoggedIn ? 'src/pages/dashboard.php' : 'src/pages/Authentication/login.php' ?>';"
              class="bg-green_gw text-white font-semibold w-full py-2 mt-4 rounded-md hover:bg-green-800 transition-colors duration-300">
              Beli
            </button>
          </div>
        </div>

        <!-- Course Card 2 -->
        <div data-aos="zoom-in" data-aos-delay="500" class="bg-white rounded-lg shadow-lg w-72 h-full flex-shrink-0">
          <img
            src="src/assets/images/pexels-greta-hoffman-7728970.jpg"
            alt="Thumbnail Course 2"
            class="w-full h-48 object-cover" />
          <div class="p-4 text-left">
            <h3 class="text-xl font-semibold text-gray-800">
              Teknik Hidroponik untuk Pemula
            </h3>
            <p class="text-gray-600 mt-2">
              Kursus ini akan mengajarkan Anda teknik hidroponik yang efektif untuk menanam sayuran di ruang terbatas.
            </p>
            <div class="flex items-center mt-3 text-yellow-500">
              <span>★★★★☆</span>
              <span class="text-gray-500 text-sm ml-2">(4.7)</span>
            </div>
            <p class="text-gray-700 mt-2">
              Mentor: <span class="font-medium">Lala</span>
            </p>
            <div class="flex">
              <p class="text-gray-500 font-semibold mt-2" style="text-decoration: line-through;">Rp 280.000</p>
              <p class="text-green-600 font-bold mt-2 ml-2">Gratis</p>
            </div>
            <button
              id="goDashboard"
              onclick="window.location.href='<?= $isLoggedIn ? 'src/pages/dashboard.php' : 'src/pages/Authentication/login.php' ?>';"
              class="bg-green_gw text-white font-semibold w-full py-2 mt-4 rounded-md hover:bg-green-800 transition-colors duration-300">
              Beli
            </button>
          </div>
        </div>

        <!-- Course Card 3 -->
        <div data-aos="fade-left" data-aos-delay="500" class="bg-white rounded-lg shadow-lg w-72 h-[200px] flex-shrink-0">
          <img
            src="src/assets/images/pexels-greta-hoffman-7728970.jpg"
            alt="Thumbnail Course 2"
            class="w-full h-48 object-cover" />
          <div class="p-4 text-left">
            <h3 class="text-xl font-semibold text-gray-800">
              Kebun Vertikal: Solusi untuk Ruang Kecil
            </h3>
            <p class="text-gray-600 mt-2">
              Pelajari cara membuat kebun vertikal yang indah dan produktif di rumah Anda.
            </p>
            <div class="flex items-center mt-3 text-yellow-500">
              <span>★★★★☆</span>
              <span class="text-gray-500 text-sm ml-2">(4.7)</span>
            </div>
            <p class="text-gray-700 mt-2">
              Mentor: <span class="font-medium">Andhika</span>
            </p>
            <div class="flex">
              <p class="text-gray-500 font-semibold mt-2" style="text-decoration: line-through;">Rp 280.000</p>
              <p class="text-green-600 font-bold mt-2 ml-2">Gratis</p>
            </div>
            <button
              id="goDashboard"
              onclick="window.location.href='<?= $isLoggedIn ? 'src/pages/dashboard.php' : 'src/pages/Authentication/login.php' ?>';"
              class="bg-green_gw text-white font-semibold w-full py-2 mt-4 rounded-md hover:bg-green-800 transition-colors duration-300">
              Beli
            </button>
          </div>
        </div>
        <!-- Slider Controls -->
        <div class="hidden md:block">
          <button
            onclick="prevSlideKursus()"
            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-200 hover:bg-gray-300 bg-opacity-50 text-white p-2 rounded-full">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 text-gray-500"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          <button
            onclick="nextSlideKursus()"
            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-200 hover:bg-gray-300 bg-opacity-50 text-white p-2 rounded-full">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 text-gray-700"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
      </div>

      <!-- View All Courses Button -->
      <button
        data-aos="zoom-in" data-aos-delay="300"
        id="goDashboard"
        onclick="window.location.href='<?= $isLoggedIn ? 'src/pages/dashboard.php' : '#' ?>';"
        class="bg-green_gw text-white font-semibold px-6 py-3 rounded-md shadow-md hover:bg-green-800 transition-colors duration-300 mt-8">
        Lihat Semua Course
      </button>
  </section>
  <!-- kursus kami end -->

  <!-- testimony -->
  <section class="py-10" id="testi">
    <div class="container mx-auto text-center">
      <h2 data-aos="zoom-in" data-aos-delay="500" class="text-3xl font-bold mb-6 text-gray-800">Apa Kata Mereka?</h2>

      <!-- Carousel Wrapper -->
      <div class="relative overflow-hidden w-full max-w-3xl mx-auto p-10">
        <div id="testimonial-slider" class="flex transition-transform duration-500">
          <!-- Testimonial 1 -->
          <div data-aos="zoom-in" data-aos-delay="700" class="flex-shrink-0 w-full px-6">
            <div class="bg-white p-6 rounded-lg shadow-lg">
              <p class="text-gray-600 mb-4 italic">"Florera sangat membantu saya belajar membuat rangkaian bunga profesional! Instruksinya sangat jelas dan mudah diikuti."</p>
              <h5 class="text-lg font-bold text-gray-800">- Maria S.</h5>
            </div>
          </div>

          <!-- Testimonial 2 -->
          <div data-aos="zoom-in" data-aos-delay="700" class="flex-shrink-0 w-full px-6">
            <div class="bg-white p-6 rounded-lg shadow-lg">
              <p class="text-gray-600 mb-4 italic">"Banyak tips dan trik yang berguna. Saya berhasil membuat bouquet yang indah hanya dalam beberapa hari belajar di Florera!"</p>
              <h5 class="text-lg font-bold text-gray-800">- Andi T.</h5>
            </div>
          </div>

          <!-- Testimonial 3 -->
          <div data-aos="zoom-in" data-aos-delay="700" class="flex-shrink-0 w-full px-6">
            <div class="bg-white p-6 rounded-lg shadow-lg">
              <p class="text-gray-600 mb-4 italic">"Marketplace Florera sangat membantu saya menjual hasil karya rangkaian bunga saya. Benar-benar platform yang luar biasa!"</p>
              <h5 class="text-lg font-bold text-gray-800">- Lisa P.</h5>
            </div>
          </div>
        </div>
      </div>

      <!-- Navigation Dots -->
      <div class="flex justify-center mt-6 space-x-3">
        <button class="w-3 h-3 bg-gray-400 rounded-full" data-slide="0"></button>
        <button class="w-3 h-3 bg-gray-400 rounded-full" data-slide="1"></button>
        <button class="w-3 h-3 bg-gray-400 rounded-full" data-slide="2"></button>
      </div>
    </div>
  </section>
  <!-- testimony end -->

  <!-- blog -->
  <section class="py-10 bg-gray-50" id="blog">
    <div class="container mx-auto px-4">
      <!-- Section Header -->
      <div data-aos="zoom-in" data-aos-delay="500" class="text-center mb-8">
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-700">Blog Kami</h2>
        <p class="text-gray-600 mt-2">Temukan tips berkebun dan informasi tentang produk kami.</p>
      </div>

      <!-- Blog Cards -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Blog Card 1 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img
            src="src/assets/images/pexels-teona-swift-6913453.jpg"
            alt="Tips Berkebun"
            class="w-full h-48 object-cover" />
          <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-800">Tips Berkebun untuk Pemula</h3>
            <p class="text-gray-600 mt-4">
              Pelajari cara memulai kebun Anda sendiri di rumah dengan langkah-langkah sederhana.
            </p>
            <a
              href=""
              class="inline-block mt-4 text-green-500 font-semibold hover:underline">
              Read More →
            </a>
          </div>
        </div>

        <!-- Blog Card 2 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img
            src="src/assets/images/pexels-karolina-grabowska-4750385.jpg"
            alt="Manfaat Pupuk Organik"
            class="w-full h-48 object-cover" />
          <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-800">Manfaat Pupuk Organik Nutrigrow</h3>
            <p class="text-gray-600 mt-4">
              Ketahui bagaimana pupuk organik kami dapat meningkatkan hasil tanaman Anda.
            </p>
            <a
              href="/blog/manfaat-pupuk-organik"
              class="inline-block mt-4 text-green-500 font-semibold hover:underline">
              Read More →
            </a>
          </div>
        </div>

        <!-- Blog Card 3 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img
            src="src/assets/images/pexels-shvetsa-5830935.jpg"
            alt="Cara Merawat Tanaman"
            class="w-full h-48 object-cover" />
          <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-800">Cara Merawat Tanaman dengan Baik</h3>
            <p class="text-gray-600 mt-4">
              Panduan lengkap untuk menjaga tanaman Anda tetap sehat dan subur.
            </p>
            <a
              href="/blog/cara-merawat-tanaman"
              class="inline-block mt-4 text-green-500 font-semibold hover:underline">
              Read More →
            </a>
          </div>
        </div>
      </div>
      <div class="flex justify-center mt-8">
        <button
          data-aos="zoom-in" data-aos-delay="300"
          id="goDashboard"
          onclick="window.location.href='src/pages/dashboard.php';"
          class="bg-green_gw text-white font-semibold px-6 py-3 rounded-md shadow-md hover:bg-green-800 transition-colors duration-300">
          Lihat Semua Blog
        </button>
      </div>
    </div>
  </section>
  <!-- blog end -->

  <!-- about us -->
  <section id="about-us" class="py-16 bg-green_gw">
    <div class="container mx-auto px-6 md:px-12 text-center">
      <h2 data-aos="zoom-in" data-aos-delay="500" class="text-4xl font-semibold text-white mb-6">About Us</h2>
      <p data-aos="zoom-in" data-aos-delay="700" class="text-lg text-gray-200 mb-10 max-w-3xl mx-auto">
        Florera adalah platform bagi pecinta tanaman hias yang ingin memperdalam hobi berkebun dari rumah. Kami menyediakan kursus online, bibit tanaman, media tanam, dan pupuk organik. Mendukung program Kota Malang sebagai Kota Bunga, Florera menjadi wadah belajar, diskusi komunitas, serta mengadakan workshop dan seminar berkebun. Dengan Florera, berkebun lebih mudah dan menyenangkan!
      </p>
    </div>
  </section>
  <!-- about us end -->

  <!-- visi misi -->
  <section id="visi-misi" class="py-16 bg-green_gw">
    <div class="container mx-auto px-6">
      <h2 data-aos="zoom-in" data-aos-delay="500" class="text-3xl font-bold text-center text-white mb-8">Visi & Misi Florera</h2>
      <div class="flex justify-center">
        <!-- Card Visi -->
        <div data-aos="zoom-in" data-aos-delay="500" class="bg-white shadow-lg rounded-lg p-6 max-w-lg w-full justify-items-center">
          <h3 class="text-2xl font-semibold text-green_gw mb-4">Visi</h3>
          <p class="text-gray-600 text-center">
            "Menjadi platform terpercaya yang mendukung penghijauan dan gaya hidup berkelanjutan melalui edukasi berkebun bagi masyarakat."
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- visi misi end -->

  <!-- mision -->
  <section id="infografis" class="pt-16 pb-16 bg-green_gw">
    <div class="flex flex-col items-center">
      <div class="relative w-full mx-auto">
        <!-- Carousel Items -->
        <div id="carousel" class="relative overflow-hidden text-center">
          <h1 data-aos="zoom-in" data-aos-delay="500" class="text-2xl font-semibold pt-6 pb-4 text-white">
            Misi Kami
          </h1>
          <div class="flex transition-transform duration-500 items-center">
            <!-- Slide 1 -->
            <div data-aos="zoom-in" data-aos-delay="700" class="w-full flex-shrink-0 flex justify-center">
              <div class="h-64 w-96 flex items-center justify-center">
                <p class="text-base md:text-lg text-gray_gw">
                  Menyediakan akses mudah untuk belajar berkebun dari rumah melalui kursus online.
                </p>
              </div>
            </div>
            <!-- Slide 2 -->
            <div data-aos="zoom-in" data-aos-delay="700" class="w-full flex-shrink-0 flex justify-center">
              <div class="h-64 w-96 flex items-center justify-center">
                <p class="text-base md:text-lg px-4 text-gray_gw">
                  Memberikan produk berkualitas seperti bibit tanaman, media tanam, dan pupuk organik yang ramah lingkungan.
                </p>
              </div>
            </div>
            <!-- Slide 3 -->
            <div data-aos="zoom-in" data-aos-delay="700" class="w-full flex-shrink-0 flex justify-center">
              <div class="h-64 w-96 flex items-center justify-center">
                <p class="text-base md:text-lg px-4 text-gray_gw">
                  Membangun komunitas pecinta tanaman yang saling berbagi pengetahuan dan pengalaman.
                </p>
              </div>
            </div>
            <!-- Slide 4 -->
            <div data-aos="zoom-in" data-aos-delay="700" class="w-full flex-shrink-0 flex justify-center">
              <div class="h-64 w-96 flex items-center justify-center">
                <p class="text-base md:text-lg px-4 text-gray_gw">
                  Mendukung program Kota Malang sebagai Kota Bunga melalui workshop, seminar, dan kegiatan penghijauan.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="hidden md:block">
          <button
            onclick="prevSlidemisi()"
            class="absolute top-1/2 left-40 transform -translate-y-1/2 bg-gray-200 hover:bg-gray-300 bg-opacity-50 text-white p-2 rounded-full transition duration-200 ease-in-out">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 text-gray-500"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          <button
            onclick="nextSlidemisi()"
            class="absolute top-1/2 right-40 transform -translate-y-1/2 bg-gray-200 hover:bg-gray-300 bg-opacity-50 text-white p-2 rounded-full transition duration-200 ease-in-out">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 text-gray-700"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>

        <!-- Dots Indicator -->
        <div class="flex justify-center mt-4 space-x-2">
          <button
            onclick="goToSlidemisi(0)"
            class="dot w-3 h-3 rounded-full bg-gray_gw"></button>
          <button
            onclick="goToSlidemisi(1)"
            class="dot w-3 h-3 rounded-full bg-gray_gw"></button>
          <button
            onclick="goToSlidemisi(2)"
            class="dot w-3 h-3 rounded-full bg-gray_gw"></button>
        </div>
      </div>
    </div>
  </section>
  <!-- mision end -->

  <!-- proses Documentation produk -->
  <section class="w-full">
    <div class="max-w-5xl mx-auto p-4">
      <div class="pb-10">
        <h1 data-aos="zoom-in" data-aos-delay="500" class="text-2xl font-semibold pt-6 pb-4 text-green_gw text-center">
          Documentation
        </h1>
      </div>
      <div class="relative p-2 rounded-xl shadow-lg flex flex-col md:flex-row">
        <!-- Description Section (Left side) -->
        <div data-aos="zoom-in" data-aos-delay="500" class="w-full md:w-2/3 flex flex-col justify-center px-12">
          <div class="mb-4">
            <h2 id="imageTitle" class="text-xl font-semibold text-gray-800">Produksi pertama</h2>
            <p id="imageDescription" class="text-gray-600 mt-2">
              Proses pengolahan bahan organik menjadi pupuk yang berkualitas tinggi dan ramah lingkungan.
            </p>
          </div>
        </div>

        <!-- Image Section (Right side) -->
        <div data-aos="zoom-in" data-aos-delay="500" class="w-full md:w-2/3 flex flex-col justify-center">
          <div class="w-full overflow-hidden">
            <img
              id="mainImage"
              src="src/assets/images/documentation/doc 1.jpg"
              alt="Documentation Image"
              class="w-full h-96 object-cover rounded-lg"
              onclick="openModal(this.src)" />
          </div>

          <!-- Slider Controls -->
          <button
            onclick="prevImage()"
            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-700 bg-opacity-50 text-white p-2 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          <button
            onclick="nextImage()"
            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-700 bg-opacity-50 text-white p-2 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </section>
  <!-- proses pembuatan produk end -->

  <!-- our team -->
  <section class="py-20">
    <div class="justify-center">
      <div>
        <h1 data-aos="zoom-in" data-aos-delay="500" class="text-2xl font-semibold pt-6 text-green_gw text-center">
          Our Teams
        </h1>
      </div>
      <div
        class="relative px-4 md:px-20 w-full max-w-5xl h-auto mx-auto">
        <!-- Wrapper Slide -->
        <div
          id="team-slider"
          data-aos="zoom-in" data-aos-delay="500"
          class="flex transition-transform duration-500 ease-out space-x-6 md:space-x-14 overflow-x-auto pt-10 pb-24 px-10">
          <!-- Anggota Tim 1 -->
          <div class="relative group w-36 h-36 md:w-60 md:h-60 flex-shrink-0">
            <img
              src="src/assets/images/teams/Yola.jpg"
              alt="Team Member 1"
              class="w-full h-full shadow-lg object-cover rounded-2xl group-hover:scale-110 transition duration-300" />

            <!-- Nama dan bagian di bawah foto -->
            <div class="text-center mt-2 hidden md:block">
              <span class="block text-lg font-semibold">
                Yola Pratika
              </span>
              <span class="block text-slate-700 text-sm">
                Sekretaris
              </span>
            </div>

            <div
              class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 group-hover:scale-110 transition duration-300 rounded-2xl"></div>
            <div
              class="absolute inset-0 flex flex-col justify-center items-start opacity-0 group-hover:opacity-100 group-hover:scale-110 transition duration-300 px-6">
              <span class="text-white text-sm md:text-lg font-semibold">
                Yola Pratika
              </span>
              <span class="text-white text-xs md:text-sm font-medium">
                Sekertaris
              </span>
            </div>
          </div>

          <!-- Anggota Tim 2 -->
          <div class="relative group w-36 h-36 md:w-60 md:h-60 flex-shrink-0">
            <img
              src="src/assets/images/teams/Kent.jpg"
              alt="Team Member 2"
              class="w-full h-full shadow-lg object-cover rounded-2xl group-hover:scale-110 transition duration-300" />

            <div class="text-center mt-2 hidden md:block">
              <span class="block text-lg font-semibold">
                Emmanuel Kent <br>Amadeo
              </span>
              <span class="block text-slate-700 text-sm">
                Ketua
              </span>
            </div>

            <div
              class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 group-hover:scale-110 transition duration-300 rounded-2xl"></div>
            <div
              class="absolute inset-0 flex flex-col justify-center items-start opacity-0 group-hover:opacity-100 group-hover:scale-110 transition duration-300 px-6">
              <span class="text-white text-sm md:text-lg font-semibold">
                Emmanuel Kent Amadeo
              </span>
              <span class="text-white text-xs md:text-sm font-medium">
                Ketua
              </span>
            </div>
          </div>

          <!-- Anggota Tim 3 -->
          <div class="relative group w-36 h-36 md:w-60 md:h-60 flex-shrink-0">
            <img
              src="src/assets/images/teams/Abim.jpg"
              alt="Team Member 3"
              class="w-full h-full shadow-lg object-cover rounded-2xl group-hover:scale-110 transition duration-300" />

            <div class="text-center mt-2 hidden md:block">
              <span class="block text-lg font-semibold">
                Abimanyu Priyo <br>Widagdo
              </span>
              <span class="block text-slate-700 text-sm">
                Designer and Programmer
              </span>
            </div>

            <div
              class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 group-hover:scale-110 transition duration-300 rounded-2xl"></div>
            <div
              class="absolute inset-0 flex flex-col justify-center items-start opacity-0 group-hover:opacity-100 group-hover:scale-110 transition duration-300 px-6">
              <span class="text-white text-sm md:text-lg font-semibold">
                Abimanyu Priyo Widagdo
              </span>
              <span class="text-white text-xs md:text-sm font-medium">
                Designer and Programmer
              </span>
            </div>
          </div>

          <!-- Anggota Tim 4 -->
          <div class="relative group w-36 h-36 md:w-60 md:h-60 flex-shrink-0">
            <img
              src="src/assets/images/teams/Mario.jpg"
              alt="Team Member 4"
              class="w-full h-full shadow-lg object-cover rounded-2xl group-hover:scale-110 transition duration-300" />

            <div class="text-center mt-2 hidden md:block">
              <span class="block text-lg font-semibold">
                Mario Yudha Pratama
              </span>
              <span class="block text-slate-700 text-sm">
                Sosial Media
              </span>
            </div>

            <div
              class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 group-hover:scale-110 transition duration-300 rounded-2xl"></div>
            <div
              class="absolute inset-0 flex flex-col justify-center items-start opacity-0 group-hover:opacity-100 group-hover:scale-110 transition duration-300 px-6">
              <span class="text-white text-sm md:text-lg font-semibold">
                Mario Yudha Pratama
              </span>
              <span class="text-white text-xs md:text-sm font-medium">
                Sosial Media
              </span>
            </div>
          </div>

          <!-- Anggota Tim 5 -->
          <div class="relative group w-36 h-36 md:w-60 md:h-60 flex-shrink-0">
            <img
              src="src/assets/images/teams/Afad.jpg"
              alt="Team Member 5"
              class="w-full h-full shadow-lg object-cover rounded-2xl group-hover:scale-110 transition duration-300" />

            <div class="text-center mt-2 hidden md:block">
              <span class="block text-lg font-semibold">
                Ahmad Fadlillah
              </span>
              <span class="block text-slate-700 text-sm">
                Keuangan
              </span>
            </div>

            <div
              class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 group-hover:scale-110 transition duration-300 rounded-2xl"></div>
            <div
              class="absolute inset-0 flex flex-col justify-center items-start opacity-0 group-hover:opacity-100 group-hover:scale-110 transition duration-300 px-6">
              <span class="text-white text-sm md:text-lg font-semibold">
                Ahmad Fadlillah
              </span>
              <span class="text-white text-xs md:text-sm font-medium">
                Keuangan
              </span>
            </div>
          </div>
        </div>

        <!-- Navigasi Tombol -->
        <div class="hidden md:flex justify-between items-center absolute inset-0">
          <button
            onclick="prevSlideteam()"
            class="absolute left-0 bg-gray-700 bg-opacity-50 text-white p-2 rounded-full transform -translate-y-1/2 top-1/2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 19l-7-7 7-7" />
          </button>
          <button
            onclick="nextSlideteam()"
            class="absolute right-0 bg-gray-700 bg-opacity-50 text-white p-2 rounded-full transform -translate-y-1/2 top-1/2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 5l7 7-7 7" />
          </button>
        </div>
      </div>
    </div>
  </section>
  <!-- our team end -->

  <!-- contact -->
  <section id="contact" class="bg-green_gw pt-12">
    <div class="container mx-auto px-6 lg:px-20">
      <div class="flex flex-wrap lg:flex-nowrap items-start gap-8">
        <!-- Bagian Kiri: Informasi Kontak -->
        <div class="w-full lg:w-1/2 space-y-6">
          <h2 class="text-3xl font-semibold text-white">Lokasi Kami</h2>
          <p class="text-gray-300">
            Lokasi produksi kami.
          </p>
          <!-- Location -->
          <div class="flex items-center gap-4 text-slate-300">
            <i data-feather="map-pin"></i>
            <p class="text-lg font-medium">
              Jl. Mergan Raya, Malang, Jawa Timur
            </p>
          </div>
        </div>

        <!-- Bagian Kanan: Peta -->
        <div class="w-full lg:w-1/2">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1012074.4977837948!2d111.72236584705848!3d-7.7456223294613755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7882a23ca1aa07%3A0x2433c2dc9c986759!2sLOGOS%20STUDY%20CLUB!5e0!3m2!1sid!2sid!4v1732119126313!5m2!1sid!2sid"
            width="100%"
            height="350"
            allowfullscreen=""
            loading="lazy"
            class="rounded-lg shadow-lg"></iframe>
        </div>
      </div>
    </div>
  </section>
  <!-- contact end -->

  <!-- footer -->
  <section class="w-full">
    <div class="flex flex-wrap bg-green_gw px-5 md:px-10 pt-10 pb-4">
      <div
        class="flex flex-col md:flex-row w-full gap-y-5 md:gap-y-0 gap-x-10">
        <!-- navigation (hidden on mobile) -->
        <div class="w-full md:w-auto h-auto p-5 md:p-10 hidden md:block">
          <ul>
            <p class="pb-2 font-semibold text-lg text-white">Navigation</p>
            <li class="pt-2">
              <a
                class="hover:underline hover:text-green-500 text-slate-300"
                href="">Home</a>
            </li>
            <li class="pt-2">
              <a
                class="hover:underline hover:text-green-500 text-slate-300"
                href="">Product</a>
            </li>
            <li class="pt-2">
              <a
                class="hover:underline hover:text-green-500 text-slate-300"
                href="">Course</a>
            </li>
            <li class="pt-2">
              <a
                class="hover:underline hover:text-green-500 text-slate-300"
                href="">Shop</a>
            </li>
            <li class="pt-2">
              <a
                class="hover:underline hover:text-green-500 text-slate-300"
                href="#contact">Contact</a>
            </li>
          </ul>
        </div>

        <!-- support -->
        <div class="w-full md:w-auto h-auto p-5 md:p-10">
          <ul>
            <p class="pb-2 font-semibold text-lg text-white">Support</p>
            <li class="pt-2">
              <a
                class="hover:underline hover:text-green-500 text-slate-300"
                href="https://wa.me/6285643124688?text=Halo%20Florera!%20Saya%20ingin%20bertanya%20tentang%20produk%20Anda."
                target="_blank">Whatsapp</a>
            </li>
          </ul>
        </div>

        <!-- about -->
        <div class="w-full md:w-auto h-auto p-5 md:p-10">
          <ul>
            <p class="pb-2 font-semibold text-lg text-white">Contact</p>
            <li class="pt-2 flex items-center gap-x-2">
              <i data-feather="mail" class="text-slate-300"></i>
              <a
                class="hover:underline hover:text-green-500 text-slate-300"
                href="">florera.id@gmail.com</a>
            </li>
            <li class="pt-2 flex items-center gap-x-2">
              <i data-feather="instagram" class="text-slate-300"></i>
              <a
                class="hover:underline hover:text-green-500 text-slate-300"
                href="https://www.instagram.com/florera.id?igsh=MXMzM3JydXBtMmJ4YQ==">florera.id</a>
            </li>
            <li class="pt-2 flex items-center gap-x-2">
              <i data-feather="phone" class="text-slate-300"></i>
              <a
                class="hover:underline hover:text-green-500 text-slate-300"
                href="">+62 857 2424 2004</a>
            </li>
            <li class="pt-2 flex items-center gap-x-2">
              <i data-feather="map-pin" class="text-slate-300"></i>
              <a
                class="hover:underline hover:text-green-500 text-slate-300"
                href="">Jl. Mergan Jaya, Malang, Jawa Timur</a>
            </li>
          </ul>
        </div>

        <!-- subscribe -->
        <div class="w-full md:w-auto h-auto p-5 md:p-10">
          <ul>
            <p class="pb-2 font-semibold text-lg text-white">
              Subscribe Flokers
            </p>
            <li class="pt-2">
              <div class="w-full">
                <p class="text-slate-300 text-justify">
                  Tetap update dengan tren berkebun terbaru dan produk
                  Florera! Daftar newsletter kami dan dapatkan informasi
                  eksklusif langsung ke email Anda.
                </p>
                <form
                  class="mt-5 mx-auto flex flex-col md:flex-row items-center space-y-4 md:space-y-0">
                  <input
                    type="email"
                    placeholder="Enter your email"
                    class="w-full pl-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                    required />
                  <button
                    type="submit"
                    class="flex md:absolute right-20 w-full md:w-auto px-6 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition duration-200">
                    Subscribe
                  </button>
                </form>
                <!-- sosmed -->
                <div class="flex pt-3 gap-x-2">
                  <div class="p-1.5 rounded-full hover:bg-gray-600 cursor-pointer">
                    <i data-feather="instagram" class="text-slate-300" onclick="window.location.href='https://www.instagram.com/florera.id?igsh=MXMzM3JydXBtMmJ4YQ=='"></i>
                  </div>
                  <div class="p-1.5 rounded-full hover:bg-gray-600 cursor-pointer">
                    <img
                      width="24"
                      height="24"
                      src="https://img.icons8.com/external-dashed-line-kawalan-studio/24/cbd5e1/external-tik-tok-social-media-dashed-line-kawalan-studio.png"
                      alt="TikTok Icon"
                      onclick="window.location.href='https://www.tiktok.com/@florera.id?_t=ZS-8tHMb7HAnsP&_r=1'" />
                  </div>
                  <div class="p-1.5 rounded-full hover:bg-gray-600 cursor-pointer">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      x="0px"
                      y="0px"
                      width="24"
                      height="24"
                      viewBox="0 0 50 50"
                      style="fill: #cbd5e1">
                      <path
                        d="M 25 1 C 19.672869 1 15.604123 5.9531422 15.166016 12 L 5.0585938 12 C 3.9235937 12 2.999376 12.980995 3.0625 14.113281 L 4.7871094 44.285156 C 4.9365844 46.922145 7.1369035 49 9.7773438 49 L 40.222656 49 C 42.863851 49 45.063433 46.921831 45.212891 44.285156 L 46.9375 14.115234 C 47.002643 12.982141 46.076406 12 44.941406 12 L 34.833984 12 C 34.395877 5.9531422 30.327131 1 25 1 z M 25 3 C 29.036936 3 32.408924 6.8867916 32.835938 12 L 17.164062 12 C 17.591075 6.8867916 20.963064 3 25 3 z M 5.0585938 14 L 15.832031 14 A 1.0001 1.0001 0 0 0 16.158203 14 L 33.832031 14 A 1.0001 1.0001 0 0 0 34.158203 14 L 44.941406 14 L 43.216797 44.171875 C 43.126254 45.7692 41.823461 47 40.222656 47 L 9.7773438 47 C 8.177784 47 6.8737281 45.768887 6.7832031 44.171875 L 5.0585938 14.001953 L 5.0585938 14 z M 25.074219 18.001953 C 20.760219 18.001953 17.507812 20.689906 17.507812 24.253906 C 17.507812 28.283906 21.2555 29.653328 24.5625 30.861328 C 28.5665 32.324328 30.998047 33.441516 30.998047 36.603516 C 30.998047 39.045516 28.267156 41.033203 24.910156 41.033203 C 21.155156 41.033203 17.973406 38.291672 17.941406 38.263672 L 16.826172 39.90625 C 17.638172 40.56425 20.921156 43.007812 24.910156 43.007812 C 29.430156 43.007813 32.972703 40.194516 32.970703 36.603516 C 32.970703 31.833516 28.864234 30.330813 25.240234 29.007812 C 21.657234 27.696812 19.480469 26.724906 19.480469 24.253906 C 19.480469 21.775906 21.833219 19.976562 25.074219 19.976562 C 27.235219 19.976562 29.115719 20.794703 30.136719 21.345703 C 30.308719 21.437703 30.761672 21.709906 31.013672 21.878906 L 32.035156 20.216797 C 31.801156 20.064797 28.921219 18.001953 25.074219 18.001953 z"
                        onclick="window.location.href='https://id.shp.ee/2mEvNLn'"></path>
                    </svg>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <!-- copyright -->
      <div
        class="w-full flex-col justify-center items-center text-center pt-10 px-5 text-white">
        <hr class="w-full" />
        <p class="pt-4">Go Green with &copy;Florera 2024</p>
      </div>
    </div>
  </section>

  <!-- footer end -->

  <!-- icons feather -->
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      feather.replace();
    });
  </script>

  <!-- animation aos -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <!-- animation aos end -->

  <!-- script popup saran login -->
  <script>
    const isLoggedIn = <?= json_encode($isLoggedIn); ?>; // PHP ke JavaScript
    const goToShopButton = document.getElementById('goDashboard');
    const loginModal = document.getElementById('popupSaran');

    goToShopButton.addEventListener('click', (event) => {
      if (!isLoggedIn) {
        event.preventDefault(); // Mencegah default klik
        loginModal.classList.remove('hidden');
      }
    });

    const popup = document.getElementById('popupSaran');
    const closePopupButton = document.getElementById('closePopup');

    // Event listener untuk tombol Oke
    closePopupButton.addEventListener('click', () => {
      popup.classList.add('hidden'); // Menyembunyikan pop-up
    });
  </script>
  <!-- script popup saran login end -->

  <!-- script javascript -->
  <script src="src/script/home.js"></script>
  <script src="src/script/slider-testi.js"></script>
</body>

</html>