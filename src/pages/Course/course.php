<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Course</title>

  <link rel="stylesheet" href="../../output.css" />
  <link rel="stylesheet" href="../../styles/course.css" />

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />

  <!-- icons feather -->
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="font-poppins">
  <!-- Header -->
  <header
    class="flex justify-between items-center bg-white shadow-md p-4 rounded-md">
    <!-- Back Button -->
    <a
      href="../dashboard.php"
      class="flex items-center text-blue-600 hover:underline hover:text-blue-800 transition">
      <i data-feather="arrow-left" class="mr-2 w-6"></i>
      <span>Kembali ke Dashboard</span>
    </a>
    <a href="../../../index.php" class="font-medium hover:underline">Florera</a>
    <!-- btn humburger -->
    <button
      id="hamburger"
      class="block md:hidden focus:outline-none"
      onclick="toggleMenu()">
      <span
        class="block w-6 h-0.5 bg-black my-1 transition-transform duration-300"></span>
      <span
        class="block w-6 h-0.5 bg-black my-1 transition-transform duration-300"></span>
      <span
        class="block w-6 h-0.5 bg-black my-1 transition-transform duration-300"></span>
    </button>
  </header>

  <div class="bg-gray-100 min-h-screen flex">
    <!-- Main Content Area -->
    <div class="flex-1 bg-gray-50 shadow-md p-6">
      <div id="mainContent" class="space-y-4">
        <!-- Default Content -->
        <div id="defaultContent" class="text-center p-4 bg-gray-100 rounded shadow-md">
          <h2 class="text-xl font-bold">Selamat Datang!</h2>
          <p class="text-gray-700">
            Pilih materi dari daftar modul di sidebar untuk mulai belajar.
          </p>
        </div>
        <!-- Default Content end -->
        <!-- courses 1 -->
        <div id="courses1" class="course hidden">
          <h2 class="text-xl font-bold mb-4">Pengenalan Alat dan Bahan</h2>
          <p class="text-gray-700">
            Pengenalan alat dan bahan adalah langkah pertama dalam memulai
            kegiatan berkebun. Dengan mengetahui fungsi alat dan jenis bahan
            yang tepat, proses berkebun akan menjadi lebih efisien dan
            menyenangkan.
          </p>

          <!-- Daftar Alat -->
          <h3 class="text-lg font-semibold mt-4">Alat Berkebun</h3>
          <ul class="list-disc list-inside text-gray-600 space-y-2">
            <li>
              <strong>Cangkul:</strong> Digunakan untuk menggemburkan tanah.
            </li>
            <li>
              <strong>Garpu Tanah:</strong> Membantu dalam mengangkat dan
              memindahkan tanah atau kompos.
            </li>
            <li>
              <strong>Gunting Tanaman:</strong> Untuk memotong ranting, daun,
              atau batang tanaman.
            </li>
            <li>
              <strong>Sprayer:</strong> Alat semprot untuk penyiraman atau
              pemberian pupuk cair.
            </li>
          </ul>

          <!-- Daftar Bahan -->
          <h3 class="text-lg font-semibold mt-4">Bahan yang Dibutuhkan</h3>
          <ul class="list-disc list-inside text-gray-600 space-y-2">
            <li>
              <strong>Tanah:</strong> Media utama untuk menanam tanaman.
              Pastikan tanah subur dan kaya akan nutrisi.
            </li>
            <li>
              <strong>Pupuk Organik:</strong> Membantu menyuburkan tanah
              secara alami.
            </li>
            <li>
              <strong>Benih:</strong> Pilih benih yang sesuai dengan jenis
              tanaman yang ingin Anda tanam.
            </li>
            <li>
              <strong>Mulsa:</strong> Untuk menjaga kelembapan tanah dan
              mengurangi pertumbuhan gulma.
            </li>
          </ul>

          <!-- Tips Penggunaan -->
          <h3 class="text-lg font-semibold mt-4">
            Tips Menggunakan Alat dan Bahan
          </h3>
          <ol class="list-decimal list-inside text-gray-600 space-y-2">
            <li>
              Bersihkan alat berkebun sebelum dan sesudah digunakan untuk
              mencegah penyebaran penyakit tanaman.
            </li>
            <li>
              Gunakan sarung tangan untuk melindungi tangan saat bekerja
              dengan alat atau bahan yang tajam.
            </li>
            <li>Simpan alat di tempat kering agar tidak berkarat.</li>
            <li>
              Gunakan pupuk sesuai dosis yang dianjurkan untuk menghindari
              kerusakan tanaman.
            </li>
          </ol>

          <!-- Gambar Ilustrasi -->
          <div class="mt-6">
            <img
              src="https://example.com/gambar-alat-berkebun.jpg"
              alt="Alat Berkebun"
              class="w-full h-auto rounded-md shadow-md" />
            <p class="text-sm text-gray-500 mt-2">
              Gambar: Contoh alat berkebun yang sering digunakan.
            </p>
          </div>

          <!-- Tombol navigasi -->
          <div class="mt-6 flex justify-between">
            <button
              onclick="navigateCourse('prev', 1)"
              class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded disabled:opacity-50"
              disabled>
              Kembali
            </button>
            <button
              onclick="navigateCourse('next', 1)"
              class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
              Lanjut
            </button>
          </div>
        </div>
        <!-- courses 1 end -->
        <!-- courses 2 -->
        <div id="courses2" class="course hidden">
          <h2 class="text-xl font-bold mb-4">Teknik Dasar Penanaman</h2>
          <p class="text-gray-700">Materi tentang teknik dasar...</p>

          <!-- Tombol navigasi -->
          <div class="mt-6 flex justify-between">
            <button
              onclick="navigateCourse('prev', 2)"
              class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">
              Kembali
            </button>
            <button
              onclick="navigateCourse('next', 2)"
              class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
              Lanjut
            </button>
          </div>
        </div>
        <!-- courses 2 end -->

        <!-- courses 3 -->
        <div id="courses3" class="course hidden">
          <h2 class="text-xl font-bold mb-4">Perawatan Tanaman</h2>
          <p class="text-gray-700">Materi tentang perawatan...</p>

          <!-- Tombol navigasi -->
          <div class="mt-6 flex justify-between">
            <button
              onclick="navigateCourse('prev', 3)"
              class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">
              Kembali
            </button>
            <button
              onclick="navigateCourse('next', 3)"
              class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded"
              disabled>
              Lanjut
            </button>
          </div>
        </div>
        <!-- courses 3 end -->

        <!-- courses 1 -->
        <div id="courses4" class="course hidden">
          <h3 class="text-lg font-semibold">Menyiram dengan Efisien</h3>
          <p class="text-sm sm:text-base">
            Penyiraman yang efisien tidak hanya menghemat air, tetapi juga
            memastikan tanaman mendapatkan kelembapan yang cukup. Berikut
            adalah beberapa tips:
          </p>
          <ul class="list-disc ml-5 text-sm sm:text-base">
            <li>
              Siram tanaman pada pagi atau sore hari untuk mengurangi
              penguapan.
            </li>
            <li>
              Gunakan air secukupnya, pastikan tidak ada genangan yang
              berlebihan.
            </li>
            <li>
              Perhatikan kebutuhan air setiap jenis tanaman, karena tidak
              semua tanaman membutuhkan jumlah air yang sama.
            </li>
          </ul>
        </div>
        <!-- courses 1 end -->

        <!-- courses 2 -->
        <div id="courses5" class="course hidden">
          <h3 class="text-lg font-semibold">Alat Penyiram Tanaman</h3>
          <p class="text-sm sm:text-base">
            Menggunakan alat yang tepat dapat mempermudah proses penyiraman
            dan memastikan distribusi air yang merata. Berikut beberapa alat
            yang bisa digunakan:
          </p>
          <ul class="list-disc ml-5 text-sm sm:text-base">
            <li>
              <b>Sprinkler:</b> Cocok untuk menyiram area yang luas seperti
              taman.
            </li>
            <li>
              <b>Selang Air:</b> Praktis untuk berbagai jenis tanaman di pot
              atau kebun.
            </li>
            <li>
              <b>Botol Penyiram:</b> Ideal untuk tanaman kecil atau dalam
              ruangan.
            </li>
            <li>
              <b>Pengairan Tetes:</b> Efisien untuk tanaman dengan kebutuhan
              air konstan.
            </li>
          </ul>
        </div>
        <!-- courses 2 end -->

        <!-- courses 3 -->
        <div id="courses6" class="course hidden">
          <h3 class="text-lg font-semibold">Frekuensi Penyiraman</h3>
          <p class="text-sm sm:text-base">
            Frekuensi penyiraman bergantung pada jenis tanaman, kondisi cuaca,
            dan media tanam. Berikut adalah panduannya:
          </p>
          <ul class="list-disc ml-5 text-sm sm:text-base">
            <li>
              Tanaman tropis biasanya membutuhkan penyiraman setiap hari,
              terutama di musim panas.
            </li>
            <li>
              Tanaman sukulen atau kaktus membutuhkan penyiraman hanya sekali
              dalam seminggu.
            </li>
            <li>
              Perhatikan tekstur tanah; siram jika tanah mulai terlihat
              kering.
            </li>
            <li>
              Hindari menyiram terlalu sering, karena dapat menyebabkan akar
              membusuk.
            </li>
          </ul>
        </div>
        <!-- courses 3 end -->

        <!-- courses 1 -->
        <div id="courses7" class="course hidden">
          <h3 class="font-semibold text-lg">Jenis-Jenis Pupuk</h3>
          <ul class="list-disc pl-6">
            <li>Pupuk organik: Kompos, pupuk kandang, pupuk hijau.</li>
            <li>Pupuk anorganik: Urea, NPK, ZA.</li>
            <li>
              Pupuk hayati: Mikroorganisme yang membantu meningkatkan
              kesuburan tanah.
            </li>
          </ul>
        </div>
        <!-- courses 1 end -->

        <!-- courses 2 end -->
        <div id="courses8" class="course hidden">
          <h3 class="font-semibold text-lg">Cara Mengaplikasikan Pupuk</h3>
          <ul class="list-disc pl-6">
            <li>Taburkan pupuk secara merata di sekitar akar tanaman.</li>
            <li>Larutkan pupuk dalam air untuk metode penyiraman.</li>
            <li>
              Hindari aplikasi pupuk pada daun, kecuali pupuk daun yang
              dirancang khusus.
            </li>
          </ul>
        </div>
        <!-- courses 2 end -->

        <!-- courses 3 -->
        <div id="courses9" class="course hidden">
          <h3 class="font-semibold text-lg">Waktu Pemupukan</h3>
          <ul class="list-disc pl-6">
            <li>
              Pemupukan awal: Dilakukan saat persiapan lahan atau sebelum
              tanam.
            </li>
            <li>
              Pemupukan tambahan: Dilakukan saat tanaman mulai berbunga atau
              berbuah.
            </li>
            <li>
              Hindari pemupukan saat cuaca terlalu panas untuk menghindari
              penguapan berlebihan.
            </li>
          </ul>
        </div>
        <!-- courses 3 end -->

        <!-- upload praktik -->
        <div id="courses10" class="course hidden pl-4 mt-2">
          <p class="text-gray-600">
            Unggah foto hasil praktik berkebun Anda di sini.
          </p>
          <input
            type="file"
            id="uploadInput"
            class="block mt-2"
            accept="image/*" />
          <button
            onclick="uploadPractice()"
            class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            Unggah
          </button>
          <div id="uploadStatus" class="text-gray-600 mt-2 hidden">
            Foto berhasil diunggah!
          </div>
        </div>
        <!-- upload end -->
      </div>
    </div>

    <!-- Sidebar Menu -->
    <!-- Overlay -->
    <div
      id="overlay"
      class="fixed inset-0 hidden transition-opacity duration-300"
      onclick="closeMenu()"></div>
    <!-- overlay end -->
    <div
      id="sidebarMenu"
      class="hidden lg:block overflow-x-auto fixed top-auto right-0 h-full w-[60%] max-w-sm bg-gray-100 shadow-md p-4 transform translate-x-full transition-transform lg:translate-x-0 lg:static lg:w-1/4 lg:h-auto">
      <h2 class="font-bold text-lg mb-4">Modul Materi</h2>
      <div class="mt-4 mb-4">
        <h3 class="font-bold text-lg mb-2">Progres Belajar</h3>
        <div class="w-full bg-gray-300 rounded-full h-1 lg:h-2">
          <div
            id="progressBar"
            class="bg-green-500 h-1 lg:h-2 rounded-full"
            style="width: 0%"></div>
        </div>
        <div id="progressPercentage" class="text-gray-600 mt-2">0%</div>
      </div>
      <div>
        <h3 class="font-bold text-lg mb-2">Materi</h3>
        <div class="space-y-2">
          <!-- Accordion item 1 -->
          <div class="border border-gray-300 rounded-md">
            <button
              id="accordion1"
              class="w-full text-left font-bold px-4 py-2 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 flex justify-between items-center sm:text-base text-sm"
              onclick="toggleAccordion(this)">
              <span>Dasar-Dasar Berkebun</span>
              <span
                id="mark-accordion1"
                class="hidden text-green-500 font-medium text-right text-xs sm:text-sm">
                Complete
              </span>
            </button>
            <div
              id="content1"
              class="accordion-content hidden px-4 py-2 space-y-2">
              <a
                onclick="completeMaterial('courses1', 'accordion1'); showCourse('courses1')"
                class="hover:underline cursor-pointer flex justify-between items-center sm:text-base text-sm">
                <span>Pengenalan Alat dan Bahan</span>
                <span
                  id="status-courses1"
                  class="text-green-500 hidden text-xs sm:text-sm">
                  &#10004;
                </span>
              </a>
              <a
                onclick="completeMaterial('courses2', 'accordion1'); showCourse('courses2')"
                class="hover:underline cursor-pointer flex justify-between items-center sm:text-base text-sm">
                <span>Teknik Dasar Penanaman</span>
                <span
                  id="status-courses2"
                  class="text-green-500 hidden text-xs sm:text-sm">
                  &#10004;
                </span>
              </a>
              <a
                onclick="completeMaterial('courses3', 'accordion1'); showCourse('courses3')"
                class="hover:underline cursor-pointer flex justify-between items-center sm:text-base text-sm">
                <span>Perawatan Tanaman</span>
                <span
                  id="status-courses3"
                  class="text-green-500 hidden text-xs sm:text-sm">
                  &#10004;
                </span>
              </a>
            </div>
          </div>

          <!-- Accordion item 2 -->
          <div class="border border-gray-300 rounded-md">
            <button
              id="accordion2"
              class="w-full text-left font-bold px-4 py-2 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 flex justify-between items-center sm:text-base text-sm"
              onclick="toggleAccordion(this)">
              Teknik Penyiraman
              <span
                id="mark-accordion2"
                class="hidden text-green-500 font-medium text-right text-xs sm:text-sm">
                Complete
              </span>
            </button>
            <div
              id="content2"
              class="accordion-content hidden px-4 py-2 space-y-2">
              <a
                onclick="completeMaterial('courses4', 'accordion2'); showCourse('courses4')"
                class="hover:underline cursor-pointer flex justify-between items-center sm:text-base text-sm">
                Menyiram dengan Efisien
                <span
                  id="status-courses4"
                  class="text-green-500 hidden text-xs sm:text-sm">
                  &#10004;
                </span>
              </a>
              <a
                onclick="completeMaterial('courses5', 'accordion2'); showCourse('courses5')"
                class="hover:underline cursor-pointer flex justify-between items-center sm:text-base text-sm">Alat Penyiram Tanaman
                <span
                  id="status-courses5"
                  class="text-green-500 hidden text-xs sm:text-sm">
                  &#10004;
                </span></a>
              <a
                onclick="completeMaterial('courses6', 'accordion2'); showCourse('courses6')"
                class="hover:underline cursor-pointer flex justify-between items-center sm:text-base text-sm">Frekuensi Penyiraman
                <span
                  id="status-courses6"
                  class="text-green-500 hidden text-xs sm:text-sm">
                  &#10004;
                </span></a>
            </div>
          </div>

          <!-- Accordion item 3 -->
          <div class="border border-gray-300 rounded-md">
            <button
              id="accordion3"
              class="w-full text-left font-bold px-4 py-2 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 flex justify-between items-center sm:text-base text-sm"
              onclick="toggleAccordion(this)">
              Pemupukan yang Tepat
              <span
                id="mark-accordion3"
                class="hidden text-green-500 font-medium text-right text-xs sm:text-sm">
                Complete
              </span>
            </button>
            <div
              id="content3"
              class="accordion-content hidden px-4 py-2 space-y-2">
              <a
                onclick="completeMaterial('courses7', 'accordion3'); showCourse('courses7')"
                class="hover:underline cursor-pointer flex justify-between items-center sm:text-base text-sm">
                Jenis-Jenis Pupuk
                <span
                  id="status-courses7"
                  class="text-green-500 hidden text-xs sm:text-sm">
                  &#10004;
                </span>
              </a>
              <a
                onclick="completeMaterial('courses8', 'accordion3'); showCourse('courses8')"
                class="hover:underline cursor-pointer flex justify-between items-center sm:text-base text-sm">
                Cara Mengaplikasikan Pupuk
                <span
                  id="status-courses8"
                  class="text-green-500 hidden text-xs sm:text-sm">
                  &#10004;
                </span>
              </a>
              <a
                onclick="completeMaterial('courses9', 'accordion3'); showCourse('courses9')"
                class="hover:underline cursor-pointer flex justify-between items-center sm:text-base text-sm">
                Waktu Pemupukan
                <span
                  id="status-courses9"
                  class="text-green-500 hidden text-xs sm:text-sm">
                  &#10004;
                </span>
              </a>
            </div>
          </div>
          <!-- Accordion item 3 end -->

          <!-- upload foto praktik -->
          <button
            id="uploadPractice"
            onclick="completeMaterial('courses10'); showCourse('courses10')"
            class="w-full text-left font-bold px-4 py-2 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 flex justify-between items-center sm:text-base text-sm">
            <span>Upload Praktik Berkebun</span>
            <span
              id="mark-uploadPractice"
              class="hidden text-green-500 font-medium text-right text-xs sm:text-sm">
              Complete
            </span>
          </button>
          <!-- upload foto praktik end -->

          <!-- download sertif -->
          <div id="certificateSection" class="mt-4 hidden">
            <button
              onclick="downloadCertificate()"
              class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
              Unduh Sertifikat
            </button>
          </div>
          <!-- download sertif end -->
        </div>
      </div>
    </div>
  </div>

  <!-- icons feather -->
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      feather.replace();
    });
  </script>

  <script src="../../script/course.js"></script>
</body>

</html>