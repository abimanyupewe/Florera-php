// pop up info
document.addEventListener("DOMContentLoaded", function () {
  const popup = document.getElementById("popup-info");
  const closeButton = document.getElementById("close-popup");

  // // buat cuma muncul satu kali saat pertama kali masuk
  // if (!localStorage.getItem('popupDisplayed')) {
  //     popup.classList.remove('hidden');
  //     localStorage.setItem('popupDisplayed', 'true');
  // }

  // Tampilkan pop-up setiap kali halaman di-load
  popup.classList.remove("hidden");

  closeButton.addEventListener("click", function () {
    popup.classList.add("hidden");
  });
});
// pop up info end

// navbar fixed
window.onscroll = function () {
  const header = document.querySelector("header"); // memanggil langsung elementnnya
  const fixedNav = header.offsetTop;

  if (window.scrollY > fixedNav) {
    header.classList.add("navbar-fixed");
  } else {
    header.classList.remove("navbar-fixed");
  }
};
// humburger
const hamburger = document.querySelector("#hamburger"); // via id
const navMenu = document.querySelector("#nav-menu"); // via id

hamburger.addEventListener("click", function () {
  // kalau udah ada kelasnya hilangkan dan kalau belum ada kelasnya tambahin
  hamburger.classList.toggle("hamburger-active");
  // untuk navmenu versi dekstop
  navMenu.classList.toggle("hidden");
});
// nav

// buat efek total project
// window.onload = animateProjectsCount; // Memulai animasi saat halaman dimuat
function animateProjectsCount() {
  const element = document.getElementById("total-projects");
  let startValue = 0; // Memulai dari 0
  const endValue = 25; // Nilai akhir yang diinginkan
  const duration = 10000; // Durasi animasi dalam milidetik (2 detik)
  const stepTime = Math.abs(Math.floor(duration / endValue)); // Waktu per langkah

  const timer = setInterval(() => {
    startValue++;
    element.textContent = `${startValue} L`;
    if (startValue >= endValue) {
      clearInterval(timer); // Menghentikan animasi setelah mencapai nilai akhir
    }
  }, stepTime);
}

window.onload = animateProjectsCount; // Memulai animasi saat halaman dimuat
// efek end

// misi kami
let currentSlide = 0;
const totalSlidesMisi = document.querySelectorAll(
  "#carousel > div > div"
).length;
const carousel = document.querySelector("#carousel > div");
const dots = document.querySelectorAll(".dot");

function updateCarousel() {
  const offset = currentSlide * -100;
  carousel.style.transform = `translateX(${offset}%)`;
  dots.forEach((dot, index) => {
    dot.classList.toggle("bg-green_pastel", index === currentSlide);
    dot.classList.toggle("bg-gray_gw", index !== currentSlide);
  });
}

function nextSlidemisi() {
  currentSlide = (currentSlide + 1) % totalSlidesMisi;
  updateCarousel();
}

function prevSlidemisi() {
  currentSlide = (currentSlide - 1 + totalSlidesMisi) % totalSlidesMisi;
  updateCarousel();
}

function goToSlidemisi(index) {
  currentSlide = index;
  updateCarousel();
}

updateCarousel();

// misi kami end

// documentation
const images = [
  {
    src: "src/assets/images/documentation/doc 1.jpg",
    title: "Proses Pengolahan",
    description:
      "Proses pengolahan bahan organik menjadi pupuk yang berkualitas tinggi dan ramah lingkungan.",
  },
  {
    src: "src/assets/images/documentation/doc 2.jpg",
    title: "Pengepakan Produk",
    description:
      "Produk dikemas dengan aman untuk memastikan kualitas tetap terjaga hingga sampai ke tangan Anda.",
  },
  {
    src: "src/assets/images/documentation/doc 3.jpg",
    title: "Distribusi Produk",
    description:
      "Proses pengiriman produk ke berbagai daerah dengan layanan pengiriman terbaik.",
  },
  {
    src: "src/assets/images/documentation/doc 4.jpg",
    title: "Pemupukan Tanaman",
    description:
      "Pupuk yang kami buat memberikan nutrisi optimal untuk tanaman Anda.",
  },
];

let currentIndex = 0;

function showImage(src, title, description) {
  document.getElementById("mainImage").src = src;
  document.getElementById("imageTitle").innerText = title;
  document.getElementById("imageDescription").innerText = description;
}

function prevImage() {
  currentIndex = (currentIndex - 1 + images.length) % images.length;
  const { src, title, description } = images[currentIndex];
  showImage(src, title, description);
}

function nextImage() {
  currentIndex = (currentIndex + 1) % images.length;
  const { src, title, description } = images[currentIndex];
  showImage(src, title, description);
}
// documentation end

// our team
const sliderTeam = document.getElementById("team-slider");

function nextSlideteam() {
  sliderTeam.scrollBy({ left: 300, behavior: "smooth" });
}

function prevSlideteam() {
  sliderTeam.scrollBy({ left: -300, behavior: "smooth" });
}
// our team

// kursus
const courseSlider = document.getElementById("courseSlider");
const cardWidth = courseSlider.querySelector(".w-72").offsetWidth + 24; // Adjust as necessary

function nextSlideKursus() {
  courseSlider.scrollBy({ left: cardWidth, behavior: "smooth" });
}

function prevSlideKursus() {
  courseSlider.scrollBy({ left: -cardWidth, behavior: "smooth" });
}
// kursus end

// produk
const slider = document.getElementById("productSlider");
let currentPosition = 0;
const cardWidthProduk = 256; // lebar tiap card + margin

document.getElementById("prevBtn").addEventListener("click", () => {
  if (currentPosition > 0) {
    currentPosition--;
    slider.style.transform = `translateX(-${
      currentPosition * cardWidthProduk
    }px)`;
  }
});

document.getElementById("nextBtn").addEventListener("click", () => {
  if (currentPosition < slider.childElementCount - 2) {
    currentPosition++;
    slider.style.transform = `translateX(-${
      currentPosition * cardWidthProduk
    }px)`;
  }
});

function redirectToProduct(productId) {
  window.location.href = `/product/${productId}`;
}
// produk end

// about produk
// arrcordion produk
function toggleAccordion(element) {
  const content = element.nextElementSibling;
  const indicator = element.querySelector(".indicator");

  if (content.classList.contains("hidden")) {
    // Open accordion
    content.classList.remove("hidden");
    indicator.classList.add("rotate-180"); // Rotate icon
  } else {
    // Close accordion
    content.classList.add("hidden");
    indicator.classList.remove("rotate-180"); // Reset icon rotation
  }
}
// arrcordion produk end
function updateProductInfo(selectedProduct) {
  const productImage = document.getElementById("product-image");
  const keunggulanContent = document.getElementById("keunggulan-content");
  const pemakaianContent = document.getElementById("pemakaian-content");

  if (selectedProduct === "250ml") {
    productImage.src = "src/assets/images/products/Produk-250-ml.jpeg";
    keunggulanContent.innerHTML = `
      <p class="py-2">1. Untuk Segala Jenis Tanaman (Bunga, Buah, dan Sayur).</p>
            <p class="py-2">2. TIDAK BERBAU dan Ramah Lingkungan. (100% ORGANIK)</p>
            <p class="py-2">3. Mempercepat pertumbuhan Akar dan Tunas Baru.</p>
            <p class="py-2">4. Mempercepat pertumbuhan Vegetatif dan Generatif sekaligus.</p>
            <p class="py-2">5. Aman digunakan terhadap Semua Tanaman di Semua Musim.</p>
            <p class="py-2">6. Meningkatkan Hasil Panen secara alami dan aman.</p>
            <p class="py-2">7. Mengandung Nutrisi Esensial yang membantu fotosintesis tanaman.</p>
            <p class="py-2">8. Dapat dikombinasikan dengan Pupuk Makro/Mikro kimia.</p>
    `;
    pemakaianContent.innerHTML = `
      <p class="py-2">1. Kocok terlebih dahulu sebelum digunakan.</p>
            <p class="py-2">2. Spray pada belakang permukaan daun dan batang tanaman.</p>
            <p class="py-2">3. Aman di gunakan setiap hari (Rekomendasi pemakaian gunakan 3 atau 4 kali seminggu).</p>
            <p class="py-2">4. Waktu aplikasi paling baik adalah Pagi hari jam 07.00 - 10.00 Pagi atau 16.00 -18.00 Sore.</p>
            <p class="py-2">5. Simpan ditempat kering dan jauhkan dari jangkauan anak-anak.</p>
    `;
  } else if (selectedProduct === "100ml") {
    productImage.src = "src/assets/images/products/Produk-100-ml.jpeg";
    keunggulanContent.innerHTML = `
      <p class="py-2">1. Cocok untuk tanaman hias kecil.</p>
      <p class="py-2">2. Aman digunakan di dalam ruangan.</p>
      <p class="py-2">3. TIDAK BERBAU dan ramah lingkungan.</p>
    `;
    pemakaianContent.innerHTML = `
      <p class="py-2">1. Kocok terlebih dahulu sebelum digunakan.</p>
            <p class="py-2">2. Spray pada belakang permukaan daun dan batang tanaman.</p>
            <p class="py-2">3. Aman di gunakan setiap hari (Rekomendasi pemakaian gunakan 3 atau 4 kali seminggu).</p>
            <p class="py-2">4. Waktu aplikasi paling baik adalah Pagi hari jam 07.00 - 10.00 Pagi atau 16.00 -18.00 Sore.</p>
            <p class="py-2">5. Simpan ditempat kering dan jauhkan dari jangkauan anak-anak.</p>
    `;
  } else if (selectedProduct === "media-tanam") {
    productImage.src = "src/assets/images/brand/media-tanam.jpg";
    keunggulanContent.innerHTML = `
      <p class="py-2">1. Media tanam steril dan siap pakai.</p>
      <p class="py-2">2. Kaya nutrisi dan mendukung pertumbuhan optimal.</p>
      <p class="py-2">3. Dapat digunakan untuk semua jenis tanaman.</p>
    `;
    pemakaianContent.innerHTML = `
      <p class="py-2">1. Gunakan langsung sebagai media tanam.</p>
      <p class="py-2">2. Cocok untuk bibit atau tanaman dewasa.</p>
    `;
  }
}
// about produk end