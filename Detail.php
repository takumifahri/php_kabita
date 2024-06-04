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

    <!-- Navbar -->
    <header class="font-poppins shadow fixed top-0 w-full z-10 h-16 bg-white">
        <div class="bg-white relative flex align-items-center flex-row gap-2 lg:gap-5 overflow-hidden px-4 py-4 md:px-36 md:mx-auto md:flex-row md:items-center">
            <a href="dashboard.php" class="flex items-center whitespace-nowrap text-2xl">
                <!-- <span class="mr-2 text-4xl text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M6.925 16.875Q5.2 16.225 4.1 14.713Q3 13.2 3 11.25q0-1.975.938-3.513Q4.875 6.2 6 5.15q1.125-1.05 2.062-1.6L9 3v2.475q0 .625.45 1.062q.45.438 1.075.438q.35 0 .65-.15q.3-.15.5-.425L12 6q.95.55 1.625 1.35t1.025 1.8l-1.675 1.675q-.05-.6-.287-1.175q-.238-.575-.638-1.05q-.35.2-.738.287q-.387.088-.787.088q-1.1 0-1.987-.612Q7.65 7.75 7.25 6.725q-.95.925-1.6 2.062Q5 9.925 5 11.25q0 .775.275 1.462q.275.688.75 1.213q.05-.5.287-.938q.238-.437.588-.787L9 10.1l2.15 2.1q.05.05.1.125t.1.125l-1.425 1.425q-.05-.075-.087-.125q-.038-.05-.088-.1L9 12.925l-.7.7q-.125.125-.212.287q-.088.163-.088.363q0 .3.175.537q.175.238.45.363ZM9 10.1Zm0 0ZM7.4 22L6 20.6L19.6 7L21 8.4L17.4 12H21v2h-5.6l-.5.5l1.5 1.5H21v2h-2.6l2.1 2.1l-1.4 1.4l-2.1-2.1V22h-2v-4.6l-1.5-1.5l-.5.5V22h-2v-3.6Z" />
                    </svg>
                </span> -->
                <span class="hidden lg:block font-bold text-first">Kabita.</span>
                <button type="button" onclick="my_modal_1.showModal()" class="lg:hidden focus:outline-none text-white hover:bg-gray-200 font-medium rounded-md text-sm w-12 aspect-square">
                    <i class="text-black fa-solid fa-arrow-left fa-lg"></i>
                </button>
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
                        <input type="search" id="default-search" class="block w-full pe-2 py-2 h-full ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-first" placeholder="Cari di Kabita" required />
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
            <div class="flex w-auto lg:w-full justify-end items-center gap-3 h-full">
                <div class="flex">
                    <button type="button" onclick="my_modal_1.showModal()" class="focus:outline-none text-white hover:bg-gray-200 font-medium rounded-md text-sm w-12 aspect-square">
                        <i class="text-gray-600 fa-solid fa-bell fa-lg"></i>
                    </button>
                    <button type="button" onclick="my_modal_1.showModal()" class="focus:outline-none text-white hover:bg-gray-200 font-medium rounded-md text-sm w-12  aspect-square">
                        <i class="text-gray-600 fa-solid fa-cart-shopping fa-lg"></i>
                    </button>
                </div>
                <div class="hidden lg:flex items-center gap-2 hover:bg-gray-200 py-1 px-2 rounded-md" onclick="document.location.href ='dashboard_admin.php'">
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
        <section id="detail" class="py-16 lg:px-36 bg-gray-100 mt-16 mx-auto">
            <div class="flex flex-wrap justify-center">
                <div class="flex w-full lg:w-1/3 px-4 rounded-lg transition duration-300 hover:drop-shadow-2xl">
                    <div class="h-45">
                        <img src="image/ayam-goreng.jpg" class="h-45 rounded-lg" />
                    </div>
                </div>
                <div class="flex flex-col w-full lg:w-1/3 mt-4 lg:mt-0 px-4 gap-2 rounded-lg transition duration-300 font-poppins">
                    <div class="flex flex-col">
                        <p class="text-2xl font-bold">
                            Ayam Goreng
                        </p>
                        <div class="flex flex-row lg:flex-col justify-between">
                            <p class="lg:text-3xl font-bold">
                                Rp. 10.000
                            </p>
                            <div class="flex flex-row items-center gap-3">
                                <p>Terjual 100+</p>
                                <p>•</p>
                                <div>
                                    <i class="fa-solid fa-star text-yellow-400"></i> (5 rating)
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>
                        Ayam Goreng Lezat dan Bergizi
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi vitae illum deserunt esse,
                        assumenda tempore ratione eaque earum praesentium nulla ducimus, aliquam nisi consectetur,
                        tempora quas placeat illo? Pariatur, in!
                    </p>
                </div>
                <div class="flex flex-col w-full lg:w-1/3 gap-2 rounded-lg transition duration-300 font-poppins">
                    <!-- Large Screen  -->
                    <div class="px-4 hidden lg:block">
                        <div class="text-2xl font-bold">
                            Atur jumlah
                        </div>
                        <div class="mt-2 flex items-center justify-between">
                            <div class="flex items-center justify-center">
                                <div class="w-8 h-8">
                                    <button class="w-full h-full text-first border-2 border-first rounded-l-lg hover:text-white hover:bg-first">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                </div>
                                <div class="w-8 h-8">                                   
                                    <button class="flex justify-center w-full h-full text-first text-sm px-3 py-1 border-y-2 border-first">
                                        <p class="text-center">10</p>
                                    </button>
                                </div>
                                <div class="w-8 h-8">
                                    <button class="w-full h-full text-first border-2 border-first rounded-r-lg hover:text-white hover:bg-first">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <p>Stok total : 20</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="font-semibold">Subtotal</p>
                            <p class="text-xl font-bold">Rp. 100.000</p>
                        </div>
                    </div>
                    <!-- Modal  -->
                    <dialog id="my_modal" class="modal modal-bottom mx-auto min-h-full max-w-screen-sm lg:hidden">
                        <div class="modal-box bg-white text-black px-4 pt-2 pb-8">
                            <div class="flex flex-wrap">
                                <img src="image/ayam-goreng.jpg" class="flex flex-col w-1/2 rounded-lg" />
                                <div class="flex flex-col w-1/2 pl-4">
                                    <div class="flex justify-end">
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost">✕</button>
                                        </form>
                                    </div>
                                    <div class="mt-auto">
                                        <p class="font-bold text-md">Ayam Goreng</p>
                                        <p class="font-semibold text-md">Rp. 10.000</p>
                                        <p>Stok total : 20</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 flex items-center justify-between">
                                <div class="text-md font-semibold">
                                    Atur jumlah
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center justify-center">
                                        <div class="w-8 h-8">
                                            <button class="w-full h-full text-first text-sm px-3 py-1 border-2 border-first rounded-l-lg hover:text-white hover:bg-first">
                                                <i class="fa-solid fa-minus"></i>
                                            </button>
                                        </div>
                                        <div class="w-8 h-8">
                                            <button class="flex justify-center w-full h-full text-first text-sm px-3 py-1 border-y-2 border-first">
                                                <p class="text-sm text-center">10</p>
                                            </button>
                                        </div>
                                        <div class="w-8 h-8">
                                            <button class="w-full h-full text-first text-sm px-3 py-1 border-2 border-first rounded-r-lg hover:text-white hover:bg-first">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="flex items-center justify-between ">
                                    <p class="font-semibold">Subtotal</p>
                                    <p class="text-md font-bold">Rp. 100.000</p>
                                </div>
                            </div>
                            <div class="relative h-8">

                            </div>
                            <div class="absolute bottom-0 left-0 p-2 w-full flex flex-row lg:flex-col gap-2 items-center justify-center">
                                <button href="" class="bg-first font-poppins font-semibold rounded-lg px-4 py-2 border-2 border-first text-white text-center w-full hover:bg-secondary">
                                    + Keranjang
                                </button>
                                <button href="" class="bg-white font-poppins font-semibold rounded-lg px-4 py-2 border-2 border-first text-first text-center w-full hover:bg-first hover:text-white hover:border-white">
                                    Beli
                                </button>
                            </div>
                        </div>
                    </dialog>
                    <div class="pt-2">
                        <div class="lg:hidden drop-shadow-2xl fixed bottom-0 lg:static w-full bg-white lg:bg-transparent p-2 flex flex-row lg:flex-col gap-2 items-center justify-center">
                            <button href="" onclick="my_modal.showModal()" class="bg-first font-poppins font-semibold rounded-lg px-4 py-2 border-2 border-first text-white text-center w-full hover:bg-secondary">
                                + Keranjang
                            </button>
                            <button href="" onclick="my_modal.showModal()" class="bg-white font-poppins font-semibold rounded-lg px-4 py-2 border-2 border-first text-first text-center w-full hover:bg-first hover:text-white hover:border-white">
                                Beli
                            </button>
                        </div>
                        <div class="hidden lg:flex px-4 flex-row lg:flex-col gap-3 items-center justify-center">
                            <button href="" class="bg-first font-poppins font-semibold rounded-lg px-4 py-2 border-2 border-first text-white text-center w-full hover:bg-secondary">
                                + Keranjang
                            </button>
                            <button href="" class="bg-white font-poppins font-semibold rounded-lg px-4 py-2 border-2 border-first text-first text-center w-full hover:bg-first hover:text-white hover:border-white">
                                Beli
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-0 lg:mt-4 flex flex-col lg:flex-row justify-start gap-5 px-4 font-poppins">
                <div class="flex flex-col">
                    <p class="text-2xl font-semibold">Rating</p>
                    <div class="flex items-center justify-center gap-3">
                        <i class="text-4xl fa-solid fa-star text-yellow-400"></i>
                        <p class="text-5xl">4.0<span class="text-sm">/5.0</span></p>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <p class="font-semibold">100% pembeli merasa puas</p>
                        <p>5 rating • 4 ulasan</p>
                    </div>
                </div>
                <div class="flex flex-1 flex-col gap-3">
                    <p class="text-2xl font-semibold">Ulasan</p>
                    <div class="flex flex-col">
                        <div class="first:pt-0 pt-2 pb-2 border-b-2 last:border-b-0">
                            <div class="flex items-start gap-3">
                                <img class="w-10 rounded-full" src="image/avatar-biru.jpg" alt="">
                                <div>
                                    <div class="flex flex-wrap items-end lg:gap-3 text-md">
                                        <p class="font-semibold">Mochamad Tegar Santoso</p>
                                        <p>2 jam yang lalu</p>
                                    </div>
                                    <div>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p class="text-sm line-clamp-3 lg:line-clamp-none">
                                        enak bgt, bumbunya gurih. Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit. Ratione ducimus quibusdam nihil voluptates molestias perferendis dolorem
                                        laboriosam dicta fugiat est exercitationem, totam quae eius ad fuga consectetur
                                        esse assumenda ea quis quod consequatur. Corrupti culpa deleniti adipisci
                                        veniam? Iusto ex voluptatum distinctio cum, totam quaerat laboriosam sapiente
                                        laudantium, nesciunt inventore quisquam vitae blanditiis ullam. Corporis,
                                        provident laudantium. Quaerat itaque vel deleniti ab cumque repellat vitae
                                        cupiditate eius dolorum amet, suscipit corporis, tenetur aliquid sapiente a,
                                        quis voluptatum voluptates tempore maxime impedit vero. Unde, rem nihil, quas
                                        facere maxime iure, eveniet doloremque temporibus obcaecati totam quam amet esse
                                        atque earum eum?
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="first:pt-0 pt-2 pb-2 border-b-2 last:border-b-0">
                            <div class="flex items-start gap-3">
                                <img class="w-10 rounded-full" src="image/avatar-biru.jpg" alt="">
                                <div>
                                    <div class="flex flex-wrap items-end lg:gap-3 text-md">
                                        <p class="font-semibold">Mochamad Tegar Santoso</p>
                                        <p>2 jam yang lalu</p>
                                    </div>
                                    <div>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p class="text-sm line-clamp-3 lg:line-clamp-none">
                                        enak bgt, bumbunya gurih.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="first:pt-0 pt-2 pb-2 border-b-2 last:border-b-0">
                            <div class="flex items-start gap-3">
                                <img class="w-10 rounded-full" src="image/avatar-biru.jpg" alt="">
                                <div>
                                    <div class="flex flex-wrap items-end lg:gap-3 text-md">
                                        <p class="font-semibold">Mochamad Tegar Santoso</p>
                                        <p>2 jam yang lalu</p>
                                    </div>
                                    <div>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p class="text-sm line-clamp-3 lg:line-clamp-none">
                                        enak bgt, bumbunya gurih.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="first:pt-0 pt-2 pb-2 border-b-2 last:border-b-0">
                            <div class="flex items-start gap-3">
                                <img class="w-10 rounded-full" src="image/avatar-biru.jpg" alt="">
                                <div>
                                    <div class="flex flex-wrap items-end lg:gap-3 text-md">
                                        <p class="font-semibold">Mochamad Tegar Santoso</p>
                                        <p>2 jam yang lalu</p>
                                    </div>
                                    <div>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p class="text-sm line-clamp-3 lg:line-clamp-none">
                                        enak bgt, bumbunya gurih. Lorem, ipsum dolor sit amet consectetur adipisicing
                                        elit. Magni eaque reprehenderit sint, distinctio, est, dolorum obcaecati illo
                                        inventore neque nam qui nisi? Corrupti dignissimos praesentium deserunt
                                        accusantium a quisquam dolor autem quidem quod. A nesciunt unde quas molestiae
                                        perferendis, placeat, labore facilis asperiores repellendus tempora voluptatem
                                        rerum ab in quae!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="first:pt-0 pt-2 pb-2 border-b-2 last:border-b-0">
                            <div class="flex items-start gap-3">
                                <img class="w-10 rounded-full" src="image/avatar-biru.jpg" alt="">
                                <div>
                                    <div class="flex flex-wrap items-end lg:gap-3 text-md">
                                        <p class="font-semibold">Mochamad Tegar Santoso</p>
                                        <p>2 jam yang lalu</p>
                                    </div>
                                    <div>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <!-- <p class="text-sm line-clamp-3 lg:line-clamp-none">
                                        enak bgt, bumbunya gurih.
                                    </p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

</body>

</html>