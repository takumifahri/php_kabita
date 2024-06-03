<?php
// Session Start
session_start();

// Koneksi ke database
require 'function.php';

// Register
if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        echo "
                <script>
                    alert('Selamat datang user!');
                    document.location.href = 'index.php';
                </script>
            ";
    } else {
        mysqli_error($db_kabita);
    }
}


// Login
if (isset($_POST["login"])) {
    $username = $_POST["Username"]; // Store username directly
    $password = $_POST["Password"];

    // Validate username (optional)

    if (!empty($username)) {  // Check if username is not empty
        $_SESSION['username'] = $username;

        $pengecekan = mysqli_query($db_kabita, "SELECT * FROM users WHERE username = '$username'");

        // ... rest of your code using $username
    } else {
        // Handle empty username (display error message)
    }
}


if (isset($error)) {
    echo "
            <script>
                alert('Username / Password Salah!');
            </script>
        ";
}

// Check if user is logged in
if (isset($_SESSION["username"])) {
    echo "<style>#login_button { display: none; }</style>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kabita</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- DaisyUI  -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/f87eaab4e6.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Navbar -->
    <!-- <nav class="bg-red-600 lg:p-4 flex items-center fixed top-0 w-full z-10 h-16">
        <a href="index.html" class="flex grow items-center ml-8 lg:ml-10 cursor-pointer">
            <span class="text-white text-2xl font-poppins font-bold">Kabita</span>
        </a>
        <div class="block lg:hidden">
            <button onclick="toggleMenu()" class="flex items-center rounded text-black-500 hover:text-black-400">
                <i id="navbar-open" class="fa-solid fa-bars text-red-600 mr-8"></i>
                <i id="navbar-close" class="fa-solid fa-xmark hidden text-red-600 mr-2"></i>
            </button>
        </div>
        <div id="navbar" class="block items-center justify-between h-16 lg:flex lg:items-center lg:w-auto hidden">
            <div class="bg-red-600 cursor-pointer h-full flex items-center">
                <a href="#menu"
                    class="text-white px-4 py-3 font-semibold font-poppins border-b-2 border-red-600 hover:border-white">Menu</a>
            </div>
            <div class="bg-red-600 cursor-pointer h-full flex items-center">
                <a href="#kontak"
                    class="text-white px-4 py-3 font-semibold font-poppins border-b-2 border-red-600 hover:border-white">Kontak</a>
            </div>

            <div class="bg-red-600 cursor-pointer h-full flex items-center">
                <a href="#kritik"
                    class="text-white px-4 py-3 font-semibold font-poppins border-b-2 border-red-600 hover:border-white">Kritik
                    &
                    Saran</a>
            </div>
        </div>
    </nav> -->
    <!-- <header class="bg-red-600 lg:p-4 flex items-center fixed top-0 w-full z-10 h-16 font-poppins">
        <div class="relative flex max-w-screen-xl flex-col overflow-hidden px-4 py-4 md:mx-auto md:flex-row md:items-center">
          <a href="#" class="flex items-center whitespace-nowrap text-2xl">
            <span class="mr-2 text-4xl text-blue-600">
              <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M6.925 16.875Q5.2 16.225 4.1 14.713Q3 13.2 3 11.25q0-1.975.938-3.513Q4.875 6.2 6 5.15q1.125-1.05 2.062-1.6L9 3v2.475q0 .625.45 1.062q.45.438 1.075.438q.35 0 .65-.15q.3-.15.5-.425L12 6q.95.55 1.625 1.35t1.025 1.8l-1.675 1.675q-.05-.6-.287-1.175q-.238-.575-.638-1.05q-.35.2-.738.287q-.387.088-.787.088q-1.1 0-1.987-.612Q7.65 7.75 7.25 6.725q-.95.925-1.6 2.062Q5 9.925 5 11.25q0 .775.275 1.462q.275.688.75 1.213q.05-.5.287-.938q.238-.437.588-.787L9 10.1l2.15 2.1q.05.05.1.125t.1.125l-1.425 1.425q-.05-.075-.087-.125q-.038-.05-.088-.1L9 12.925l-.7.7q-.125.125-.212.287q-.088.163-.088.363q0 .3.175.537q.175.238.45.363ZM9 10.1Zm0 0ZM7.4 22L6 20.6L19.6 7L21 8.4L17.4 12H21v2h-5.6l-.5.5l1.5 1.5H21v2h-2.6l2.1 2.1l-1.4 1.4l-2.1-2.1V22h-2v-4.6l-1.5-1.5l-.5.5V22h-2v-3.6Z" /></svg>
            </span>
            <span class="text-white text-2xl font-bold">Kabita</span>
          </a>
          <input type="checkbox" class="peer hidden" id="navbar-open" />
          <label class="absolute top-5 right-7 cursor-pointer md:hidden" for="navbar-open">
            <span class="sr-only">Toggle Navigation</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </label>
          <nav aria-label="Header Navigation" class="bg-red-600 peer-checked:mt-8 peer-checked:max-h-56 flex max-h-0 w-full flex-col items-center justify-between overflow-hidden transition-all md:ml-24 md:max-h-full md:flex-row md:items-start">
            <ul class="flex flex-col items-center space-y-2 md:ml-auto md:flex-row md:space-y-0">
              <li class="text-white md:mr-12 border-b-2 border-red-600 hover:border-white"><a href="#menu">Menu</a></li>
              <li class="text-white md:mr-12 border-b-2 border-red-600 hover:border-white"><a href="#kontak">Kontak</a></li>
              <li class="text-white md:mr-12 border-b-2 border-red-600 hover:border-white"><a href="#kritik">Kritik & Saran</a></li>
              <li class="text-white md:mr-12 hover:text-blue-600">
                <button class="rounded-md border-2 border-blue-600 px-6 py-1 font-medium text-blue-600 transition-colors hover:bg-blue-600 hover:text-white">Login</button>
              </li>
            </ul>
          </nav>
        </div>
      </header> -->

    <header class="shadow fixed top-0 w-full z-10 h-16 bg-first">
        <div class="bg-first relative flex align-items-center flex-col overflow-hidden px-4 py-4 md:px-36 md:mx-auto md:flex-row md:items-center">
            <a href="index.html" class="flex items-center whitespace-nowrap text-2xl">
                <!-- <span class="mr-2 text-4xl text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M6.925 16.875Q5.2 16.225 4.1 14.713Q3 13.2 3 11.25q0-1.975.938-3.513Q4.875 6.2 6 5.15q1.125-1.05 2.062-1.6L9 3v2.475q0 .625.45 1.062q.45.438 1.075.438q.35 0 .65-.15q.3-.15.5-.425L12 6q.95.55 1.625 1.35t1.025 1.8l-1.675 1.675q-.05-.6-.287-1.175q-.238-.575-.638-1.05q-.35.2-.738.287q-.387.088-.787.088q-1.1 0-1.987-.612Q7.65 7.75 7.25 6.725q-.95.925-1.6 2.062Q5 9.925 5 11.25q0 .775.275 1.462q.275.688.75 1.213q.05-.5.287-.938q.238-.437.588-.787L9 10.1l2.15 2.1q.05.05.1.125t.1.125l-1.425 1.425q-.05-.075-.087-.125q-.038-.05-.088-.1L9 12.925l-.7.7q-.125.125-.212.287q-.088.163-.088.363q0 .3.175.537q.175.238.45.363ZM9 10.1Zm0 0ZM7.4 22L6 20.6L19.6 7L21 8.4L17.4 12H21v2h-5.6l-.5.5l1.5 1.5H21v2h-2.6l2.1 2.1l-1.4 1.4l-2.1-2.1V22h-2v-4.6l-1.5-1.5l-.5.5V22h-2v-3.6Z" />
                    </svg>
                </span> -->
                <span class="font-poppins font-bold text-white">Kabita.</span>
                <!-- <img class="w-32 lg:w-44" src="image/logo.png" alt=""> -->
            </a>
            <input type="checkbox" class="peer hidden" id="navbar-open" />
            <label class="absolute top-5 right-8 cursor-pointer md:hidden" for="navbar-open">
                <span class="sr-only">Toggle Navigation</span>
                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg> -->
                <i class="fa-solid fa-bars h-6 w-6 text-white"></i>
            </label>
            <nav aria-label="Header Navigation" class="peer-checked:mt-4 peer-checked:max-h-56 flex max-h-0 w-full flex-col items-center justify-between overflow-hidden transition-all md:ml-24 md:max-h-full md:flex-row md:items-start">
                <ul class="flex flex-col items-center space-y-2 md:ml-auto md:flex-row md:space-y-0 font-poppins font-semibold">
                    <li class="text-white border-b-2 border-first md:mr-12 hover:border-white">
                        <a href="#menu">Menu</a>
                    </li>
                    <li class="text-white border-b-2 border-first md:mr-12 hover:border-white">
                        <a href="#kontak">Kontak</a>
                    </li>
                    <li class="text-white border-b-2 border-first md:mr-12 hover:border-white">
                        <a href="#kritik">Kritik</a>
                    </li>

                    <?php
                    // Check if user is logged in (replace with your actual logic)

                    if (isset($_SESSION['username'])) {
                        // User is logged in, show "Dashboard" button
                        echo '<li class="text-white border-2 border-white md:mr-12 px-4 py-2 hover:bg-secondary hover:border-first focus:bg-secondary focus:border-first">
                <a href="dashboard.php">Dashboard</a>
              </li>';
                    } else {
                        // User is not logged in, show "Login" button
                        echo '<button class="text-white border-2 md:mr-12 px-4 py-2 border-white cursor-pointer hover:bg-secondary hover:border-first focus:bg-secondary focus:border-first"
                id="login_button" onclick="modal_login.showModal()">Login</button>';
                    }
                    ?>
                </ul>
            </nav>

        </div>
    </header>
    <!-- Modal Login  -->
    <dialog id="modal_login" class="modal backdrop-blur-lg">
        <div class="modal-box font-poppins p-0 w-76 lg:w-96 flex flex-col">
            <div class="flex items-center bg-first rounded-t-lg h-24 lg:h-40">
                <h2 class="text-2xl lg:text-5xl font-bold text-center text-white w-full">Login</h2>
            </div>
            <div class="px-8 pt-4 pb-12">
                <form id="loginForm" action="" method="post" class="flex flex-col gap-2">
                    <div class="flex flex-col">
                        <label for="username">Username</label>
                        <input type="text" name="Username" id="username" placeholder="Masukkan username" class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">
                    </div>
                    <div class="flex flex-col">
                        <label for="password">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 right-0 flex items-center px-2">
                                <input class="hidden js-password-toggle" id="toggle" type="checkbox" />
                                <label class="bg-gray-300 hover:bg-gray-400 rounded px-2 py-1 text-sm text-gray-600 font-mono cursor-pointer js-password-label" for="toggle"><i class="fa-solid fa-eye"></i></label>
                            </div>
                            <input type="password" name="Password" id="password" placeholder="Masukkan password" class="js-password w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">
                        </div>
                        <a href="" class="mt-1 text-sm text-first hover:text-secondary">Lupa password?</a>
                        <div class="flex flex-col mt-2">
                            <button type="submit" name="login" class="p-2 rounded-md bg-first text-white hover:bg-secondary">Login</button>
                        </div>
                    </div>
                </form>
                <div class="divider">atau masuk dengan</div>
                <button class="mt-2 flex justify-center items-center gap-2 w-full border-2 rounded-md py-1 text-black hover:bg-gray-100 hover:text-secondary" onclick="modal_register.showModal()">
                    <svg class="w-8 aspect-square" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Capa_1" style="enable-background:new 0 0 150 150;" version="1.1" viewBox="0 0 150 150" xml:space="preserve">
                        <style type="text/css">
                            .st0 {
                                fill: #1A73E8;
                            }

                            .st1 {
                                fill: #EA4335;
                            }

                            .st2 {
                                fill: #4285F4;
                            }

                            .st3 {
                                fill: #FBBC04;
                            }

                            .st4 {
                                fill: #34A853;
                            }

                            .st5 {
                                fill: #4CAF50;
                            }

                            .st6 {
                                fill: #1E88E5;
                            }

                            .st7 {
                                fill: #E53935;
                            }

                            .st8 {
                                fill: #C62828;
                            }

                            .st9 {
                                fill: #FBC02D;
                            }

                            .st10 {
                                fill: #1565C0;
                            }

                            .st11 {
                                fill: #2E7D32;
                            }

                            .st12 {
                                fill: #F6B704;
                            }

                            .st13 {
                                fill: #E54335;
                            }

                            .st14 {
                                fill: #4280EF;
                            }

                            .st15 {
                                fill: #34A353;
                            }

                            .st16 {
                                clip-path: url(#SVGID_2_);
                            }

                            .st17 {
                                fill: #188038;
                            }

                            .st18 {
                                opacity: 0.2;
                                fill: #FFFFFF;
                                enable-background: new;
                            }

                            .st19 {
                                opacity: 0.3;
                                fill: #0D652D;
                                enable-background: new;
                            }

                            .st20 {
                                clip-path: url(#SVGID_4_);
                            }

                            .st21 {
                                opacity: 0.3;
                                fill: url(#_45_shadow_1_);
                                enable-background: new;
                            }

                            .st22 {
                                clip-path: url(#SVGID_6_);
                            }

                            .st23 {
                                fill: #FA7B17;
                            }

                            .st24 {
                                opacity: 0.3;
                                fill: #174EA6;
                                enable-background: new;
                            }

                            .st25 {
                                opacity: 0.3;
                                fill: #A50E0E;
                                enable-background: new;
                            }

                            .st26 {
                                opacity: 0.3;
                                fill: #E37400;
                                enable-background: new;
                            }

                            .st27 {
                                fill: url(#Finish_mask_1_);
                            }

                            .st28 {
                                fill: #FFFFFF;
                            }

                            .st29 {
                                fill: #0C9D58;
                            }

                            .st30 {
                                opacity: 0.2;
                                fill: #004D40;
                                enable-background: new;
                            }

                            .st31 {
                                opacity: 0.2;
                                fill: #3E2723;
                                enable-background: new;
                            }

                            .st32 {
                                fill: #FFC107;
                            }

                            .st33 {
                                opacity: 0.2;
                                fill: #1A237E;
                                enable-background: new;
                            }

                            .st34 {
                                opacity: 0.2;
                            }

                            .st35 {
                                fill: #1A237E;
                            }

                            .st36 {
                                fill: url(#SVGID_7_);
                            }

                            .st37 {
                                fill: #FBBC05;
                            }

                            .st38 {
                                clip-path: url(#SVGID_9_);
                                fill: #E53935;
                            }

                            .st39 {
                                clip-path: url(#SVGID_11_);
                                fill: #FBC02D;
                            }

                            .st40 {
                                clip-path: url(#SVGID_13_);
                                fill: #E53935;
                            }

                            .st41 {
                                clip-path: url(#SVGID_15_);
                                fill: #FBC02D;
                            }
                        </style>
                        <g>
                            <path class="st14" d="M120,76.1c0-3.1-0.3-6.3-0.8-9.3H75.9v17.7h24.8c-1,5.7-4.3,10.7-9.2,13.9l14.8,11.5   C115,101.8,120,90,120,76.1L120,76.1z" />
                            <path class="st15" d="M75.9,120.9c12.4,0,22.8-4.1,30.4-11.1L91.5,98.4c-4.1,2.8-9.4,4.4-15.6,4.4c-12,0-22.1-8.1-25.8-18.9   L34.9,95.6C42.7,111.1,58.5,120.9,75.9,120.9z" />
                            <path class="st12" d="M50.1,83.8c-1.9-5.7-1.9-11.9,0-17.6L34.9,54.4c-6.5,13-6.5,28.3,0,41.2L50.1,83.8z" />
                            <path class="st13" d="M75.9,47.3c6.5-0.1,12.9,2.4,17.6,6.9L106.6,41C98.3,33.2,87.3,29,75.9,29.1c-17.4,0-33.2,9.8-41,25.3   l15.2,11.8C53.8,55.3,63.9,47.3,75.9,47.3z" />
                        </g>
                    </svg> Google
                </button>
                <div class="mt-2 text-center">
                    Belum punya akun? <form method="dialog" class="inline">
                        <button class="text-first hover:text-secondary" onclick="modal_register.showModal()">Daftar!</button>
                    </form>
                </div>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <!-- Modal Register  -->
    <dialog id="modal_register" class="modal backdrop-blur-lg">
        <div class="modal-box font-poppins p-0 w-76 lg:w-96 flex flex-col">
            <div class="flex items-center bg-first rounded-t-lg h-24 lg:h-40">
                <h2 class="text-2xl lg:text-5xl font-bold text-center text-white w-full">Daftar</h2>
            </div>
            <div class="px-8 pt-4 pb-12">
                <form id="loginForm" action="" method="post" class="flex flex-col gap-2">
                    <div class="flex flex-col">
                        <label for="nama">Nama</label>
                        <input type="text" name="Nama" id="nama" placeholder="Masukkan nama" class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">
                    </div>
                    <div class="flex flex-col">
                        <label for="username">Username</label>
                        <input type="text" name="Username" id="username" placeholder="Masukkan username" class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">
                    </div>
                    <div class="flex flex-col">
                        <label for="password">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 right-0 flex items-center px-2">
                                <input class="hidden js-password-toggle" id="toggle" type="checkbox" />
                                <label class="bg-gray-300 hover:bg-gray-400 rounded px-2 py-1 text-sm text-gray-600 font-mono cursor-pointer js-password-label" for="toggle"><i class="fa-solid fa-eye"></i></label>
                            </div>
                            <input type="password" name="Password" id="password" placeholder="Masukkan password" class="js-password w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">
                        </div>
                        <div class="flex flex-col mt-4">
                            <button type="submit" name="register" class="p-2 rounded-md bg-first text-white hover:bg-secondary">Daftar</button>
                        </div>
                    </div>
                </form>
                <div class="divider">atau daftar dengan</div>
                <button class="mt-2 flex justify-center items-center gap-2 w-full border-2 rounded-md py-1 text-black hover:bg-gray-100 hover:text-secondary" onclick="modal_register.showModal()">
                    <svg class="w-8 aspect-square" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Capa_1" style="enable-background:new 0 0 150 150;" version="1.1" viewBox="0 0 150 150" xml:space="preserve">
                        <style type="text/css">
                            .st0 {
                                fill: #1A73E8;
                            }

                            .st1 {
                                fill: #EA4335;
                            }

                            .st2 {
                                fill: #4285F4;
                            }

                            .st3 {
                                fill: #FBBC04;
                            }

                            .st4 {
                                fill: #34A853;
                            }

                            .st5 {
                                fill: #4CAF50;
                            }

                            .st6 {
                                fill: #1E88E5;
                            }

                            .st7 {
                                fill: #E53935;
                            }

                            .st8 {
                                fill: #C62828;
                            }

                            .st9 {
                                fill: #FBC02D;
                            }

                            .st10 {
                                fill: #1565C0;
                            }

                            .st11 {
                                fill: #2E7D32;
                            }

                            .st12 {
                                fill: #F6B704;
                            }

                            .st13 {
                                fill: #E54335;
                            }

                            .st14 {
                                fill: #4280EF;
                            }

                            .st15 {
                                fill: #34A353;
                            }

                            .st16 {
                                clip-path: url(#SVGID_2_);
                            }

                            .st17 {
                                fill: #188038;
                            }

                            .st18 {
                                opacity: 0.2;
                                fill: #FFFFFF;
                                enable-background: new;
                            }

                            .st19 {
                                opacity: 0.3;
                                fill: #0D652D;
                                enable-background: new;
                            }

                            .st20 {
                                clip-path: url(#SVGID_4_);
                            }

                            .st21 {
                                opacity: 0.3;
                                fill: url(#_45_shadow_1_);
                                enable-background: new;
                            }

                            .st22 {
                                clip-path: url(#SVGID_6_);
                            }

                            .st23 {
                                fill: #FA7B17;
                            }

                            .st24 {
                                opacity: 0.3;
                                fill: #174EA6;
                                enable-background: new;
                            }

                            .st25 {
                                opacity: 0.3;
                                fill: #A50E0E;
                                enable-background: new;
                            }

                            .st26 {
                                opacity: 0.3;
                                fill: #E37400;
                                enable-background: new;
                            }

                            .st27 {
                                fill: url(#Finish_mask_1_);
                            }

                            .st28 {
                                fill: #FFFFFF;
                            }

                            .st29 {
                                fill: #0C9D58;
                            }

                            .st30 {
                                opacity: 0.2;
                                fill: #004D40;
                                enable-background: new;
                            }

                            .st31 {
                                opacity: 0.2;
                                fill: #3E2723;
                                enable-background: new;
                            }

                            .st32 {
                                fill: #FFC107;
                            }

                            .st33 {
                                opacity: 0.2;
                                fill: #1A237E;
                                enable-background: new;
                            }

                            .st34 {
                                opacity: 0.2;
                            }

                            .st35 {
                                fill: #1A237E;
                            }

                            .st36 {
                                fill: url(#SVGID_7_);
                            }

                            .st37 {
                                fill: #FBBC05;
                            }

                            .st38 {
                                clip-path: url(#SVGID_9_);
                                fill: #E53935;
                            }

                            .st39 {
                                clip-path: url(#SVGID_11_);
                                fill: #FBC02D;
                            }

                            .st40 {
                                clip-path: url(#SVGID_13_);
                                fill: #E53935;
                            }

                            .st41 {
                                clip-path: url(#SVGID_15_);
                                fill: #FBC02D;
                            }
                        </style>
                        <g>
                            <path class="st14" d="M120,76.1c0-3.1-0.3-6.3-0.8-9.3H75.9v17.7h24.8c-1,5.7-4.3,10.7-9.2,13.9l14.8,11.5   C115,101.8,120,90,120,76.1L120,76.1z" />
                            <path class="st15" d="M75.9,120.9c12.4,0,22.8-4.1,30.4-11.1L91.5,98.4c-4.1,2.8-9.4,4.4-15.6,4.4c-12,0-22.1-8.1-25.8-18.9   L34.9,95.6C42.7,111.1,58.5,120.9,75.9,120.9z" />
                            <path class="st12" d="M50.1,83.8c-1.9-5.7-1.9-11.9,0-17.6L34.9,54.4c-6.5,13-6.5,28.3,0,41.2L50.1,83.8z" />
                            <path class="st13" d="M75.9,47.3c6.5-0.1,12.9,2.4,17.6,6.9L106.6,41C98.3,33.2,87.3,29,75.9,29.1c-17.4,0-33.2,9.8-41,25.3   l15.2,11.8C53.8,55.3,63.9,47.3,75.9,47.3z" />
                        </g>
                    </svg> Google
                </button>
                <div class="mt-2 text-center">
                    Sudah punya akun? <form method="dialog" class="inline">
                        <button class="text-first hover:text-secondary" onclick="modal_login.showModal()">Login!</button>
                    </form>
                </div>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <!-- <dialog id="modal_login" class="modal">
        <div class="modal-box font-poppins px-8 py-12 w-96 flex flex-col gap-3">
            <h3 class="font-bold text-lg md:text-2xl lg:text-3xl text-center">Login</h3>
            <form action="" class="flex flex-col gap-3">
                <div class="flex flex-col">
                    <label for="username">Username</label>
                    <input type="text" id="username" placeholder="Masukkan username"
                        class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">
                </div>
                <div class="flex flex-col">
                    <label for="password">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 right-0 flex items-center px-2">
                            <input class="hidden js-password-toggle" id="toggle" type="checkbox" />
                            <label
                                class="bg-gray-300 hover:bg-gray-400 rounded px-2 py-1 text-sm text-gray-600 font-mono cursor-pointer js-password-label"
                                for="toggle"><i class="fa-solid fa-eye"></i></label>
                        </div>
                        <input type="password" id="password" placeholder="Masukkan password"
                            class="js-password w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">                    
                    </div>
                    <a href="" class="text-sm text-first hover:text-secondary">Lupa password?</a>
                    <script>
                        const passwordToggle = document.querySelector('.js-password-toggle')
                        passwordToggle.addEventListener('change', function () {
                            const password = document.querySelector('.js-password'),
                                passwordLabel = document.querySelector('.js-password-label')

                            if (password.type === 'password') {
                                password.type = 'text'
                                passwordLabel.innerHTML = '<i class="fa-solid fa-eye-slash"></i>'
                            } else {
                                password.type = 'password'
                                passwordLabel.innerHTML = '<i class="fa-solid fa-eye"></i>'
                            }

                            password.focus()
                        })
                    </script>
                </div>
                <div class="flex flex-col">
                    <button type="submit" class="p-2 rounded-md bg-first text-white hover:bg-secondary">Login</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog> -->


    <main>
        <!-- Hero -->
        <section id="hero">
            <div class="bg-cover bg-center h-screen relative" style="background-image: url('image/indonesian-food.jpg');">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="absolute inset-0 flex flex-col justify-center items-center text-center">
                    <h1 class="text-white px-4 text-2xl lg:text-5xl font-poppins font-bold mb-2">Warung Kabita.
                    </h1>
                    <h1 class="text-white px-4 text-lg lg:text-2xl font-poppins mb-6">Bukan anak IPB kalau belum
                        makan di Kabita
                    </h1>
                    <!-- <a href="#"
                    class="bg-red-500 hover:bg-white hover:border hover:border-red-500 text-white hover:text-red-500 font-poppins font-semibold py-3 px-8 rounded-full hover:bg-red-600 transition duration-300">Login
                    / Register
                </a> -->
                </div>
            </div>
        </section>

        <!-- Know About Us -->
        <section class="px-4 lg:px-40 py-20 bg-gray-100">
            <div class="container mx-auto flex flex-col lg:flex-row gap-5 items-start justify-center">
                <img class="w-full lg:w-72" src="image/tentang.png" alt="">
                <div>
                    <h2 class="text-xl lg:text-5xl font-poppins font-bold mb-2 lg:mb-6">Warung <span class="text-red-600">Kabita.</span>
                    </h2>
                    <p class="text-sm lg:text-lg text-justify font-poppins text-gray-700">
                        Kedai Warung Kabita merupakan kedai warung makan sunda yang memiliki harga yang sangat murah
                        sehingga sudah menjadi langganan untuk para mahasiswa vokasi IPB, anak kos, serta
                        pengunjung-pengunjung yang menginginkan makan enak dengan harga yang terjangkau. Kedai warung
                        kabita
                        sendiri sudah ter-standarisasi dengan sertifikat halal oleh sebab itu para konsumen tidak perlu
                        mengkhawatirkan masalah halal, bersih, dan kenyamanan.

                        Kedai warung kabita sendiri sudah berdiri dari tahun 1998, sehingga sudah tidak heran jika anak
                        IPB
                        tahu kedai warung ini. Sebab dari angkatan per angkatan, mereka sudah memasarkan kedai warung
                        ini.
                        Warung Kedai Kabita sudah banyak mengalami perpindahan lahan, hingga terakhir bertetap di Jl.
                        Lodaya
                        2 hingga saat ini.
                    </p>
                </div>
            </div>
        </section>

        <!-- Best Seller -->
        <section id="best-seller" class="px-4 lg:px-36 py-20 bg-first">
            <div class="container mx-auto text-center">
                <h2 class="text-xl lg:text-5xl text-center font-poppins font-bold mb-8 text-white">Best Seller</h2>

                <!-- Accordion Horizontal

            <div class="flex justify-center">
                <div class="w-32 h-16  mx-2 flex items-center justify-center">
                    <p class="text-red-500 border-b border-b-4 w-full py-2 border-red-500 cursor-pointer">All</p>
                </div>
                <div class="w-32 h-16  mx-2 flex items-center justify-center cursor-pointer">
                    <p class="border-b border-b-4 w-full py-2">Buah Tropis</p>
                </div>
                <div class="w-32 h-16  mx-2 flex items-center justify-center cursor-pointer">
                    <p class="border-b border-b-4 w-full py-2">Buah Sub-Tropis</p>
                </div>
            </div> -->

                <!-- Card -->
                <div class="grid grid-cols-2 lg:flex lg:flex-wrap lg:justify-center gap-2 lg:gap-5">
                    <a href="detail.html" class="flex flex-col w-full lg:w-60 bg-white rounded-lg shadow-md transition-transform duration-300 transform border-2 border-white hover:bg-gray-100 hover:scale-105">
                        <img src="image/ayam-goreng.jpg" alt="Ayam Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ayam Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-primary rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>
                    <a href="detail.html" class="flex flex-col w-full lg:w-60 bg-white rounded-lg shadow-md transition-transform duration-300 transform border-2 border-white hover:bg-gray-100 hover:scale-105">
                        <img src="image/ayam-goreng.jpg" alt="Ayam Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ayam Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-primary rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>
                    <a href="detail.html" class="flex flex-col w-full lg:w-60 bg-white rounded-lg shadow-md transition-transform duration-300 transform border-2 border-white hover:bg-gray-100 hover:scale-105">
                        <img src="image/ayam-goreng.jpg" alt="Ayam Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ayam Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-primary rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>
                    <a href="detail.html" class="flex flex-col w-full lg:w-60 bg-white rounded-lg shadow-md transition-transform duration-300 transform border-2 border-white hover:bg-gray-100 hover:scale-105">
                        <img src="image/ayam-goreng.jpg" alt="Ayam Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ayam Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-primary rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Menu -->
        <section id="menu" class="px-4 lg:px-36 py-20 bg-gray-100">
            <div class="container mx-auto text-center">
                <h2 class="text-xl lg:text-5xl text-center font-poppins font-bold mb-8">Menu</h2>

                <!-- Accordion Horizontal -->
                <div class="flex justify-center font-poppins mb-4">
                    <div class="w-32 h-16  mx-2 flex items-center justify-center cursor-pointer">
                        <button class="w-full py-2 border-b-4 border-first hover:text-first focus:border-first focus:text-first focus:border-first text-first">
                            All</button>
                    </div>
                    <div class="w-32 h-16  mx-2 flex items-center justify-center cursor-pointer">
                        <button class="w-full py-2 border-b-4 border-gray-100  hover:text-first focus:border-first focus:text-first focus:border-first ">
                            Makanan
                        </button>
                    </div>
                    <div class="w-32 h-16  mx-2 flex items-center justify-center cursor-pointer">
                        <button class="w-full py-2 border-b-4 border-gray-100  hover:text-first focus:border-first focus:text-first focus:border-first ">
                            Minuman
                        </button>
                    </div>
                </div>

                <!-- Card -->
                <div class="grid grid-cols-2 lg:flex lg:flex-wrap lg:justify-center gap-2 lg:gap-5">
                    <a href="detail.html" class="flex flex-col w-full lg:w-60 bg-white rounded-lg shadow-md transition-transform duration-300 transform border-2 border-white hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/ayam-goreng.jpg" alt="Ayam Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ayam Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-primary rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>
                    <a href="detail.html" class="flex flex-col w-full lg:w-60 bg-white rounded-lg shadow-md transition-transform duration-300 transform border-2 border-white hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/ayam-goreng.jpg" alt="Ayam Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ayam Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-primary rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>
                    <a href="detail.html" class="flex flex-col w-full lg:w-60 bg-white rounded-lg shadow-md transition-transform duration-300 transform border-2 border-white hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/ayam-goreng.jpg" alt="Ayam Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ayam Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-primary rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>
                    <a href="detail.html" class="flex flex-col w-full lg:w-60 bg-white rounded-lg shadow-md transition-transform duration-300 transform border-2 border-white hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/ayam-goreng.jpg" alt="Ayam Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ayam Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-primary rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>
                    <a href="detail.html" class="flex flex-col w-full lg:w-60 bg-white rounded-lg shadow-md transition-transform duration-300 transform border-2 border-white hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/ayam-goreng.jpg" alt="Ayam Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ayam Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-primary rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>
                    <a href="detail.html" class="flex flex-col w-full lg:w-60 bg-white rounded-lg shadow-md transition-transform duration-300 transform border-2 border-white hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/ayam-goreng.jpg" alt="Ayam Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ayam Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-primary rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>
                    <a href="detail.html" class="flex flex-col w-full lg:w-60 bg-white rounded-lg shadow-md transition-transform duration-300 transform border-2 border-white hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/ayam-goreng.jpg" alt="Ayam Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ayam Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-primary rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>
                    <a href="detail.html" class="flex flex-col w-full lg:w-60 bg-white rounded-lg shadow-md transition-transform duration-300 transform border-2 border-white hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/ayam-goreng.jpg" alt="Ayam Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ayam Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-primary rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- <section id="kontak" class="px-4 py-20 bg-first">
            <div
                class="flex flex-col justify-center bg-white rounded-lg w-full lg:w-1/2 mx-auto font-poppins shadow-2xl">
                <div class="flex items-center bg-white rounded-t-lg h-40">
                    <h2 class="text-xl lg:text-5xl font-bold text-center text-black w-full">Kontak</h2>
                </div>
                <div class="w-full flex flex-wrap px-8 lg:px-8 pb-10 lg:pb-16 pt-10 bg-gray-100 rounded-b-lg">
                    <div class="flex flex-col w-full lg:w-1/2 transition duration-300 hover:drop-shadow-2xl">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d990.8655974168457!2d106.808518!3d-6.589305!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c57776d4956d%3A0x7d23c109e11fa013!2sWarung%20Makan%20Kabita!5e0!3m2!1sid!2sid!4v1716653576602!5m2!1sid!2sid"
                            class="flex flex-col w-full lg:h-full rounded-lg" style="border:0;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <form action=""
                        class="flex flex-col mt-8 lg:mt-0 w-full lg:w-1/2 lg:ps-4 gap-2 rounded-lg transition duration-300 font-poppins">
                        <h2 class="text-xl lg:text-2xl font-bold text-center w-full">Hubungi Kami</h2>
                        <div class="flex flex-col">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" placeholder="Masukan nama anda"
                                class="w-full p-2 rounded-md bg-white focus:outline-none focus:ring focus:ring-first focus-border-first">
                        </div>
                        <div class="flex flex-col">
                            <label for="telepon">No. Telepon</label>
                            <input type="text" id="telepon" placeholder="Masukan nomor telepon anda"
                                class="w-full p-2 rounded-md bg-white focus:outline-none focus:ring focus:ring-first focus-border-first">
                            <script>
                                function formatAngka(angka) {
                                    var number_string = angka.replace(/[^,\d]/g, '').toString(); //Menghapus huruf                            
                                    return number_string;
                                }

                                const teleponInput = document.getElementById('telepon');
                                teleponInput.addEventListener("keyup", function (e) {
                                    e.target.value = formatAngka(e.target.value);
                                });
                            </script>
                        </div>
                        <div class="flex flex-col">
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="Masukan email anda"
                                class="w-full p-2 rounded-md bg-white focus:outline-none focus:ring focus:ring-first focus-border-first">
                        </div>
                        <div class="flex flex-col">
                            <label for="subjek">Subjek</label>
                            <input type="text" id="subjek" placeholder="Subjek"
                                class="w-full p-2 rounded-md bg-white focus:outline-none focus:ring focus:ring-first focus-border-first">
                        </div>
                        <div class="flex flex-col">
                            <label for="pesan">Pesan</label>
                            <textarea name="" id="pesan" placeholder="Pesan anda"
                                class="w-full p-2 rounded-md bg-white focus:outline-none focus:ring focus:ring-first focus-border-first"></textarea>
                        </div>
                        <div class="flex flex-col mt-4 lg:mt-auto">
                            <button type="submit"
                                class="p-2 rounded-md bg-first text-white hover:bg-secondary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </section> -->

        <section id="kontak" class="px-4 py-20 bg-gray-100">
            <div class="flex flex-col gap-10 justify-center bg-white rounded-lg w-full lg:w-1/2 mx-auto font-poppins">
                <div class="flex items-center bg-first rounded-t-lg h-40">
                    <h2 class="text-xl lg:text-5xl font-bold text-center text-white w-full">Kontak</h2>
                </div>
                <div class="w-full flex flex-wrap px-8 lg:px-8 pb-10 lg:pb-16">
                    <div class="flex flex-col w-full lg:w-1/2 transition duration-300 hover:drop-shadow-2xl">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d990.8655974168457!2d106.808518!3d-6.589305!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c57776d4956d%3A0x7d23c109e11fa013!2sWarung%20Makan%20Kabita!5e0!3m2!1sid!2sid!4v1716653576602!5m2!1sid!2sid" class="flex flex-col w-full lg:h-full rounded-lg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <form action="" class="flex flex-col mt-8 lg:mt-0 w-full lg:w-1/2 lg:ps-4 gap-2 rounded-lg transition duration-300 font-poppins">
                        <h2 class="text-xl lg:text-2xl font-bold text-center w-full">Hubungi Kami</h2>
                        <div class="flex flex-col">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" placeholder="Masukan nama anda" class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">
                        </div>
                        <div class="flex flex-col">
                            <label for="telepon">No. Telepon</label>
                            <input type="text" id="telepon" placeholder="Masukan nomor telepon anda" class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">
                            <script>
                                function formatAngka(angka) {
                                    var number_string = angka.replace(/[^,\d]/g, '').toString(); //Menghapus huruf                            
                                    return number_string;
                                }

                                const teleponInput = document.getElementById('telepon');
                                teleponInput.addEventListener("keyup", function(e) {
                                    e.target.value = formatAngka(e.target.value);
                                });
                            </script>
                        </div>
                        <div class="flex flex-col">
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="Masukan email anda" class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">
                        </div>
                        <div class="flex flex-col">
                            <label for="subjek">Subjek</label>
                            <input type="text" id="subjek" placeholder="Subjek" class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">
                        </div>
                        <div class="flex flex-col">
                            <label for="pesan">Pesan</label>
                            <textarea name="" id="pesan" placeholder="Pesan anda" class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first"></textarea>
                        </div>
                        <div class="flex flex-col mt-4 lg:mt-auto">
                            <button type="submit" class="p-2 rounded-md bg-first text-white hover:bg-secondary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section id="kritik" class="px-4 pt-20 pb-40 bg-gray-100">
            <div class="flex flex-col gap-10 justify-center bg-white rounded-lg w-full lg:w-1/2 mx-auto font-poppins">
                <div class="flex items-center bg-first rounded-t-lg h-40">
                    <h2 class="text-xl lg:text-5xl font-bold text-center text-white w-full">Kritik & Saran</h2>
                </div>
                <form action="" class="w-full flex flex-col gap-5 px-8 lg:px-8 pb-10 lg:pb-16">
                    <div class="flex flex-col">
                        <label for="puas">Apakah anda puas dengan makanannya?</label>
                        <select name="" id="puas" class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">
                            <option value="" disabled selected>Pilih</option>
                            <option value="Tidak Puas">Tidak Puas</option>
                            <option value="Puas">Puas</option>
                            <option value="Sangat Puas">Sangat Puas</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label for="saran">Berikan kritik & saran untuk mengembangkan website kami!</label>
                        <textarea name="" id="saran" placeholder="Kritik & Saran" class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first"></textarea>
                    </div>
                    <div class="flex flex-col">
                        <button type="submit" class="p-2 rounded-md bg-first text-white hover:bg-secondary">Kirim</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer class="px-4 py-8 bg-[#820300] text-white">
        <div class="container mx-auto flex flex-wrap">
            <!-- Kolom Pertama -->
            <div class="w-full lg:w-1/2 lg:pr-4">
                <h3 class="text-4xl font-poppins font-bold mb-4">Warung Kabita.</h3>
                <p class="font-poppins text-white text-justify mb-4">
                    Selamat datang di Kedai Warung Kabita, tempat makan favorit para mahasiswa vokasi IPB dan pengunjung
                    lainnya yang menginginkan cita rasa autentik dengan harga terjangkau. Kami hadir untuk memastikan
                    pengalaman makan yang tak terlupakan bagi setiap
                    pelanggan kami.
                </p>
            </div>
            <!-- Kolom Kedua -->
            <div class="w-full h-52 lg:h-auto lg:w-1/2 lg:pl-4">
                <h3 class="text-xl font-poppins font-bold mb-4">Hubungi Kami</h3>
                <div class="flex gap-3 items-center mb-4">
                    <i class="fa-solid fa-phone w-4"></i>
                    <span class="font-poppins">+62 89670522489</span>
                </div>
                <div class="flex gap-3 items-center mb-4">
                    <i class="fa-solid fa-envelope w-4"></i>
                    <span class="font-poppins">warungkabita@gmail.com</span>
                </div>
                <div class="flex gap-3 items-center mb-4">
                    <i class="fa-solid fa-location-dot w-4"></i>
                    <span class="font-poppins">Jl. Lodaya No. 2, Kota Bogor, Indonesia</span>
                </div>
                <!-- <div id="lokasi" class="flex flex-col items-center mt-2">
                    <h2 class="text-xl font-poppins font-bold mb-2 text-start w-full">Lokasi</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d990.8655974168457!2d106.808518!3d-6.589305!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c57776d4956d%3A0x7d23c109e11fa013!2sWarung%20Makan%20Kabita!5e0!3m2!1sid!2sid!4v1716653576602!5m2!1sid!2sid"
                        class="w-full" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div> -->
            </div>
        </div>
    </footer>

    <!-- Main JS  -->
    <script src="js/app.js"></script>

    <!-- Tailwind Config -->
    <script src="js/tailwind.config.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sections = document.querySelectorAll("section");
            // const navDivs = document.querySelectorAll("nav div div");
            // const navLinks = document.querySelectorAll("nav div div a");
            const navLinks = document.querySelectorAll("header div nav ul li a");

            window.addEventListener("scroll", handleNavbar);

            function handleNavbar() {
                // let current = "";

                // sections.forEach(section => {
                //     const sectionTop = section.offsetTop;
                //     if (pageYOffset >= sectionTop - 50) {
                //         current = section.getAttribute("id");
                //     }
                // });

                // navDivs.forEach(div => {
                //     div.classList.remove("border-red-600");
                // });

                // navLinks.forEach(link => {
                //     if (link.getAttribute("href").includes(current)) {
                //         link.parentElement.classList.add("border-red-600");
                //     }
                // });

                let current = "";

                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    if (pageYOffset >= sectionTop - 50) {
                        current = section.getAttribute("id");
                    }
                });

                navLinks.forEach(link => {
                    // link.classList.remove("border-white");
                    link.parentElement.classList.remove("border-white");
                    if (link.getAttribute("href").includes(current)) {
                        // link.classList.add("border-white");
                        link.parentElement.classList.add("border-white");
                    }
                });
            }
        });
    </script>

</body>

</html>