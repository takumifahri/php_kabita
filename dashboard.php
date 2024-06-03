<?php
session_start();

require 'function.php';


// $namaUser = query("SELECT nama FROM users");
// if(isset($_SESSION["login"])){
//     echo '<script>document.getElementById("login_button").style.display = "none";</script>';
// }

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Hello, " . $username . "!";
} else {
    // Handle case where user is not logged in
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
    <header class="font-poppins shadow fixed top-0 w-full z-10 h-16 bg-white">
        <div class="bg-white relative flex align-items-center flex-row gap-5 overflow-hidden px-4 py-4 md:px-36 md:mx-auto md:flex-row md:items-center">
            <a onclick="document.location.href ='dashboard.php'" class="cursor-pointer flex items-center whitespace-nowrap text-2xl">
                <!-- <span class="mr-2 text-4xl text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M6.925 16.875Q5.2 16.225 4.1 14.713Q3 13.2 3 11.25q0-1.975.938-3.513Q4.875 6.2 6 5.15q1.125-1.05 2.062-1.6L9 3v2.475q0 .625.45 1.062q.45.438 1.075.438q.35 0 .65-.15q.3-.15.5-.425L12 6q.95.55 1.625 1.35t1.025 1.8l-1.675 1.675q-.05-.6-.287-1.175q-.238-.575-.638-1.05q-.35.2-.738.287q-.387.088-.787.088q-1.1 0-1.987-.612Q7.65 7.75 7.25 6.725q-.95.925-1.6 2.062Q5 9.925 5 11.25q0 .775.275 1.462q.275.688.75 1.213q.05-.5.287-.938q.238-.437.588-.787L9 10.1l2.15 2.1q.05.05.1.125t.1.125l-1.425 1.425q-.05-.075-.087-.125q-.038-.05-.088-.1L9 12.925l-.7.7q-.125.125-.212.287q-.088.163-.088.363q0 .3.175.537q.175.238.45.363ZM9 10.1Zm0 0ZM7.4 22L6 20.6L19.6 7L21 8.4L17.4 12H21v2h-5.6l-.5.5l1.5 1.5H21v2h-2.6l2.1 2.1l-1.4 1.4l-2.1-2.1V22h-2v-4.6l-1.5-1.5l-.5.5V22h-2v-3.6Z" />
                    </svg>
                </span> -->
                <span class="font-bold text-first">Kabita.</span>
                <!-- <img class="w-32 lg:w-44" src="image/logo.png" alt=""> -->
            </a>
            <div class="flex flex-row w-full lg:w-96">
                <form class="w-full mx-auto">
                    <!-- <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only :text-white">Search
                    </label> -->
                    <div class="relative h-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full pe-2 py-2 h-full ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-first"
                            placeholder="Cari di Kabita" required />
                        <!-- <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 :bg-blue-600 :hover:bg-blue-700 :focus:ring-blue-800">Search</button> -->
                    </div>
                </form>
            </div>

            <!-- <input type="checkbox" class="peer hidden" id="navbar-open" />
            <label class="absolute top-5 right-8 cursor-pointer md:hidden" for="navbar-open">
                <span class="sr-only">Toggle Navigation</span>
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg> 
                <i class="fa-solid fa-bars h-6 w-6 text-white"></i>
            </label> -->
            <div class="hidden lg:flex w-full justify-end items-center gap-3 h-full">
                <div class="flex">
                    <button type="button" onclick="my_modal_1.showModal()" class="focus:outline-none text-white hover:bg-gray-200 font-medium rounded-md text-sm w-12 aspect-square">
                        <i class="text-gray-600 fa-solid fa-bell fa-lg"></i>
                    </button>
                    <button type="button" onclick="my_modal_1.showModal()" class="focus:outline-none text-white hover:bg-gray-200 font-medium rounded-md text-sm w-12  aspect-square">
                        <i class="text-gray-600 fa-solid fa-cart-shopping fa-lg"></i>
                    </button>
                </div>
                <div class="flex items-center gap-2 hover:bg-gray-200 py-1 px-2 rounded-md" onclick="document.location.href ='dashboard_admin.php'">
                    <img class="w-10 rounded-full" src="image/avatar-biru.jpg" alt="">
                    <p class="font-semibold text-nowrap"><?= $_SESSION['username']; ?></p>
                </div>
            </div>
            <!-- <nav aria-label="Header Navigation"
                class="peer-checked:mt-4 peer-checked:max-h-56 flex max-h-0 w-full flex-col items-center justify-between overflow-hidden transition-all md:ml-24 md:max-h-full md:flex-row md:items-start">
                <ul
                    class="flex flex-col items-center space-y-2 md:ml-auto md:flex-row md:space-y-0 font-semibold">
                    <li class="text-white border-b-2 border-first md:mr-12 hover:border-white">
                        <a href="#menu">Menu</a>
                    </li>
                    <li class="text-white border-b-2 border-first md:mr-12 hover:border-white">
                        <a href="#kontak">Kontak</a>
                    </li>
                    <li class="text-white border-b-2 border-first md:mr-12 hover:border-white">
                        <a href="#kritik">Kritik</a>
                    </li>
                    <button
                        class="text-white border-2 border-first md:mr-12 px-4 py-2 border-white cursor-pointer hover:bg-secondary hover:border-first focus:bg-secondary focus:border-first"
                        onclick="modal_login.showModal()">Login</button>
                </ul>
            </nav> -->
        </div>
    </header>

    <main>
        <!-- Menu -->
        <section id="menu" class="mt-4 px-4 lg:px-36 py-20 bg-gray-100">
            <div class="container mx-auto text-center">
                <div class="w-full carousel rounded-box">
                    <div class="carousel-item w-full">
                        <a href="detail_jumat_berkah.html">
                            <img src="image/dashboard-slider.png" class="w-full" alt="Tailwind CSS Carousel component" />
                        </a>
                    </div>
                    <div class="carousel-item w-full">
                        <img src="image/dashboard-slider.png" class="w-full" alt="Tailwind CSS Carousel component" />
                    </div>
                    <div class="carousel-item w-full">
                        <img src="image/dashboard-slider.png" class="w-full" alt="Tailwind CSS Carousel component" />
                    </div>
                    <div class="carousel-item w-full">
                        <img src="image/dashboard-slider.png" class="w-full" alt="Tailwind CSS Carousel component" />
                    </div>
                    <div class="carousel-item w-full">
                        <img src="image/dashboard-slider.png" class="w-full" alt="Tailwind CSS Carousel component" />
                    </div>
                    <div class="carousel-item w-full">
                        <img src="image/dashboard-slider.png" class="w-full" alt="Tailwind CSS Carousel component" />
                    </div>
                    <div class="carousel-item w-full">
                        <img src="image/dashboard-slider.png" class="w-full" alt="Tailwind CSS Carousel component" />
                    </div>
                </div>
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
                <div class="grid grid-cols-2 lg:grid-cols-6 gap-2 lg:justify-center">
                    <a href="detail.php" class="flex flex-col w-full lg:w-full bg-white rounded-lg shadow-md transition-transform duration-300 transform hover:border-2 hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/ayam-goreng.jpg" alt="Ayam Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ayam Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-first rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>

                    <a href="detail.php" class="flex flex-col w-full lg:w-full bg-white rounded-lg shadow-md transition-transform duration-300 transform hover:border-2 hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/es-jeruk.jpg" alt="Es Jeruk" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Es Jeruk</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 7.000</div>
                        <div class="mt-auto">
                            <button class="bg-first rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>

                    <a href="detail.php" class="flex flex-col w-full lg:w-full bg-white rounded-lg shadow-md transition-transform duration-300 transform hover:border-2 hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/nasi.jpg" alt="Nasi" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Nasi</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 3.000</div>
                        <div class="mt-auto">
                            <button class="bg-first rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>

                    <a href="detail.php" class="flex flex-col w-full lg:w-full bg-white rounded-lg shadow-md transition-transform duration-300 transform hover:border-2 hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/es-teh.jpg" alt="Es teh" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Es teh</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 5.000</div>
                        <div class="mt-auto">
                            <button class="bg-first rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>

                    <a href="detail.php" class="flex flex-col w-full lg:w-full bg-white rounded-lg shadow-md transition-transform duration-300 transform hover:border-2 hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/ikan goreng.jpg" alt="Ikan Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ikan Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-first rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>

                    <a href="detail.php" class="flex flex-col w-full lg:w-full bg-white rounded-lg shadow-md transition-transform duration-300 transform hover:border-2 hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/ayam-goreng.jpg" alt="Ayam Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ayam Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-first rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>

                    <a href="detail.php" class="flex flex-col w-full lg:w-full bg-white rounded-lg shadow-md transition-transform duration-300 transform hover:border-2 hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/es-jeruk.jpg" alt="Es Jeruk" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Es Jeruk</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 7.000</div>
                        <div class="mt-auto">
                            <button class="bg-first rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>

                    <a href="detail.php" class="flex flex-col w-full lg:w-full bg-white rounded-lg shadow-md transition-transform duration-300 transform hover:border-2 hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/nasi.jpg" alt="Nasi" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Nasi</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 3.000</div>
                        <div class="mt-auto">
                            <button class="bg-first rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>

                    <a href="detail.php" class="flex flex-col w-full lg:w-full bg-white rounded-lg shadow-md transition-transform duration-300 transform hover:border-2 hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/es-teh.jpg" alt="Es teh" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Es teh</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 5.000</div>
                        <div class="mt-auto">
                            <button class="bg-first rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>

                    <a href="detail.php" class="flex flex-col w-full lg:w-full bg-white rounded-lg shadow-md transition-transform duration-300 transform hover:border-2 hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/ikan goreng.jpg" alt="Ikan Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ikan Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-first rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>

                    <a href="detail.php" class="flex flex-col w-full lg:w-full bg-white rounded-lg shadow-md transition-transform duration-300 transform hover:border-2 hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/ayam-goreng.jpg" alt="Ayam Goreng" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Ayam Goreng</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 10.000</div>
                        <div class="mt-auto">
                            <button class="bg-first rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>

                    <a href="detail.php" class="flex flex-col w-full lg:w-full bg-white rounded-lg shadow-md transition-transform duration-300 transform hover:border-2 hover:border-first hover:-translate-y-1 delay-100">
                        <img src="image/es-jeruk.jpg" alt="Es Jeruk" class="w-full object-cover mb-2 rounded-t-lg">
                        <h3 class="text-sm lg:text-lg font-poppins font-semibold">Es Jeruk</h3>
                        <div class="flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <div class="font-poppins text-gray-600">4.5</div>
                        </div>
                        <div class="font-poppins text-gray-700 mb-2">Rp 7.000</div>
                        <div class="mt-auto">
                            <button class="bg-first rounded-md px-4 py-1 font-poppins text-white mb-4 hover:bg-secondary">Beli</button>
                        </div>
                    </a>

                </div>
            </div>
        </section>

        <div class="pt-2">
            <div class="lg:hidden drop-shadow-2xl fixed bottom-0 lg:static w-full bg-white lg:bg-transparent p-2 flex flex-row lg:flex-col gap-2 items-center justify-center">
                <!-- <button href="" onclick="my_modal.showModal()"
                    class="bg-first font-poppins font-semibold rounded-lg px-4 py-2 border-2 border-first text-white text-center w-full hover:bg-secondary">
                    <i class="fa-solid fa-cart-shopping"></i>
                </button>
                <button href="" onclick="my_modal.showModal()"
                    class="bg-white font-poppins font-semibold rounded-lg px-4 py-2 border-2 border-first text-first text-center w-full hover:bg-first hover:text-white hover:border-white">
                    Beli
                </button> -->
                <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
                    <button data-tooltip-target="tooltip-home" type="button" class="inline-flex flex-col items-center justify-center px-5 rounded-s-md hover:bg-gray-100 dark:hover:bg-gray-800 group">
                        <!-- <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg> -->
                        <i class="fa-solid fa-home text-gray-500 dark:text-gray-400 group-hover:text-first dark:group-hover:text-first"></i>
                        <span class="sr-only">Home</span>
                    </button>
                    <div id="tooltip-home" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Home
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button data-tooltip-target="tooltip-wallet" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-100 dark:hover:bg-gray-800 group">
                        <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-first dark:group-hover:text-first" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M11.074 4 8.442.408A.95.95 0 0 0 7.014.254L2.926 4h8.148ZM9 13v-1a4 4 0 0 1 4-4h6V6a1 1 0 0 0-1-1H1a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1v-2h-6a4 4 0 0 1-4-4Z" />
                            <path d="M19 10h-6a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1Zm-4.5 3.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM12.62 4h2.78L12.539.41a1.086 1.086 0 1 0-1.7 1.352L12.62 4Z" />
                        </svg>
                        <span class="sr-only">Wallet</span>
                    </button>
                    <div id="tooltip-wallet" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Wallet
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div class="flex items-center justify-center">
                        <button data-tooltip-target="tooltip-new" type="button" class="inline-flex items-center justify-center w-10 h-10 font-medium bg-first rounded-full group focus:ring-4 focus:bg-secondary focus:ring-secondary focus:outline-none dark:focus:ring-secondary">
                            <i class="text-white fa-solid fa-cart-shopping"></i>
                            <span class="sr-only">New item</span>
                        </button>
                    </div>
                    <div id="tooltip-new" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Create new item
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button data-tooltip-target="tooltip-settings" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-first dark:group-hover:text-first" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2" />
                        </svg>
                        <span class="sr-only">Settings</span>
                    </button>
                    <div id="tooltip-settings" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Settings
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button data-tooltip-target="tooltip-profile" type="button" class="inline-flex flex-col items-center justify-center px-5 rounded-e-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-first dark:group-hover:text-first" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                        <span class="sr-only">Profile</span>
                    </button>
                    <div id="tooltip-profile" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Profile
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="px-4 py-8 bg-[#820300] text-white">
            <div class="container mx-auto flex flex-wrap">
                <!-- Kolom Pertama -->
                <div class="w-full lg:w-1/2 lg:pr-4">
                    <h3 class="text-4xl font-poppins font-bold mb-4">Warung Kabita.</h3>
                    <p class="font-poppins text-white text-justify mb-4">
                        Selamat datang di Kedai Warung Kabita, tempat makan favorit para mahasiswa vokasi IPB dan
                        pengunjung
                        lainnya yang menginginkan cita rasa autentik dengan harga terjangkau. Kami hadir untuk
                        memastikan
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