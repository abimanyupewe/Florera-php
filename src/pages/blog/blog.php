<?php
session_start();

require '../../../php/functions/function.php';

$isLoggedIn = isset($_SESSION['username']); // Anggap user_id disimpan saat login
// $userPhoto = $isLoggedIn ? $_SESSION['user']['photo'] : ''; // Ambil foto profil user
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Florera</title>

    <link rel="stylesheet" href="../../output.css" />

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
</head>

<body class="font-poppins m-0">
    <!-- Header Start -->
    <header
        class="bg-green_gw absolute top-0 left-0 w-full flex items-center z-10">
        <div class="container mx-auto sm:px-16 md:px-8 lg:px-12">
            <div class="flex items-center justify-between relative">
                <!-- Element Kiri (Brand) -->
                <div class="flex">
                    <img
                        class="w-20 h-auto"
                        src="src/assets/images/logo/logo.png"
                        alt="" />
                    <a href="../../../index.php" class="font-semibold text-lg text-white block py-6 hover:underline">
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
                                    href="../../../index.php"
                                    class="text-base font-normal text-white py-2 mx-8 flex hover:underline">Home</a>
                            </li>
                            <li class="group">
                                <a
                                    href="../../../index.php#product"
                                    class="text-base font-normal text-white py-2 mx-8 flex hover:underline">Shop</a>
                            </li>
                            <li class="group">
                                <a
                                    href="../../../index.php#course"
                                    class="text-base font-normal text-white py-2 mx-8 flex hover:underline">Course</a>
                            </li>
                            <li class="group">
                                <a
                                    href="../../../index.php#testi"
                                    class="text-base font-normal text-white py-2 mx-8 flex hover:underline">Testimonial
                                </a>
                            </li>
                            <li class="group">
                                <a
                                    href="../../../index.php#blog"
                                    class="text-base font-normal text-white py-2 mx-8 flex hover:underline">Blog
                                </a>
                            </li>
                            <li class="group">
                                <a
                                    href="../../../index.php#about-us"
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
                                            <a href="../../../src/pages/dashboard.php" class="block px-4 py-2 text-green_gw hover:bg-gray-100 hover:rounded-md">Go to Dashboard</a>
                                            <a href="../../../src/pages/logout.php" class="block px-4 py-2 text-green_gw hover:bg-gray-100 hover:rounded-md">Logout</a>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <!-- Login Button -->
                                    <a
                                        href="../../../src/pages/Authentication/login.php"
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

    <!-- script -->
    <script src="src/script/home.js"></script>
</body>

</html>