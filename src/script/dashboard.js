  // nav
  // menampilkan halaman
  function showPage(pageId) {
    const pages = document.querySelectorAll('.page');
    pages.forEach(page => page.classList.add('hidden'));
    document.getElementById(pageId).classList.remove('hidden');
  }

  // slidebar
  function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const isHidden = sidebar.classList.contains("-translate-x-full");
    sidebar.classList.toggle("-translate-x-full", !isHidden);

    // Animate Hamburger
    const hamburger = document.getElementById("hamburger");
    hamburger.classList.toggle("open");
  }
  // slidebar

  // nav active
  function setActiveNav(navId) {
    // Hapus kelas 'active' dari semua menu
    const navItems = document.querySelectorAll('ul li');
    navItems.forEach((item) => {
      item.classList.remove('active');
    });
  
    // Tambah kelas 'active' pada menu yang diklik
    const activeNav = document.getElementById(navId);
    activeNav.classList.add('active');
  }
  
  // nav end