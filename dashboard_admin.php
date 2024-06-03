<?php 
    session_start();

    // if(!isset($_SESSION["login"] )){
    // header("Location: index.php");
    // exit; 
    // }

    require'function.php';


    if (isset($_POST["submit"])){
        
        if(Add($_POST) > 0){
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = 'index.php';
                </script>"
            ;
        } else {
            echo "
                <script>
                    alert('Data gagal di tambahkan');
                    document.location.href = 'index.php';
                </script>"
            ;
        };
        
    }

?>

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
    <div class="flex flex-col w-full">
        <div class="h-16">
            <header class="font-poppins shadow fixed top-0 w-full z-10 h-16 bg-white">
                <div
                    class="bg-white relative flex align-items-center flex-row gap-5 overflow-hidden px-4 py-4 md:px-36 md:mx-auto md:flex-row md:items-center">
                    <a href="index.php" class="flex items-center whitespace-nowrap text-2xl">
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
                    <div class="hidden flex flex-row w-full lg:w-96">
                        <form class="w-full mx-auto">
                            <!-- <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only :text-white">Search
                            </label> -->
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <input type="search" id="default-search"
                                    class="block w-full px-2 py-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-first"
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
                        <!-- <div class="flex">
                            <button type="button" onclick="my_modal_1.showModal()"
                                class="focus:outline-none text-white hover:bg-gray-200 font-medium rounded-md text-sm w-12 aspect-square">
                                <i class="text-gray-600 fa-solid fa-bell fa-lg"></i>
                            </button>
                            <button type="button" onclick="my_modal_1.showModal()"
                                class="focus:outline-none text-white hover:bg-gray-200 font-medium rounded-md text-sm w-12  aspect-square">
                                <i class="text-gray-600 fa-solid fa-cart-shopping fa-lg"></i>
                            </button>
                        </div> -->
                        <div class="flex items-center gap-2 hover:bg-gray-200 py-1 px-2 rounded-md">
                            <img class="w-10 rounded-full" src="image/avatar-biru.jpg" alt="">
                            <p class="font-semibold text-nowrap"><?= $_SESSION[$username];?></p>
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
        </div>
        <div class="flex">
            <div class="w-[20rem]">
                <div
                    class="fixed flex h-full w-[20rem] flex-col bg-white bg-clip-border p-4 text-gray-700 shadow-xl shadow-blue-gray-900/5">
                    <!-- <div class="p-4 mb-2">
                        <h5
                            class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            Sidebar
                        </h5>
                    </div> -->
                    <nav class="flex flex-col gap-1 p-2 font-sans text-base font-normal text-blue-gray-700">
                        <div role="button"
                            class="font-poppins flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-gray-200 hover:text-first focus:bg-gray-200 focus:text-first active:bg-gray-200 active:text-first">
                            <div class="grid mr-4 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            Dashboard
                        </div>
                        <div role="button"
                            class="text-first bg-gray-200 font-poppins flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-gray-200 hover:text-first focus:bg-gray-200 focus:text-first active:bg-gray-200 active:text-first">
                            <div class="grid mr-4 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            Data Menu
                        </div>
                        <div role="button"
                            class="font-poppins flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-gray-200 hover:text-first focus:bg-gray-200 focus:text-first active:bg-gray-200 active:text-first">
                            <div class="grid mr-4 place-items-center">
                                <i class="fa-solid fa-money-bill-transfer"></i>
                            </div>
                            Data Transaksi
                        </div>
                        <div role="button"
                            class="font-poppins flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-gray-200 hover:text-first focus:bg-gray-200 focus:text-first active:bg-gray-200 active:text-first">
                            <div class="grid mr-4 place-items-center">
                                <i class="fa-solid fa-comments"></i>
                            </div>
                            Kritik dan Saran
                        </div>
                        <!-- <div role="button"
                            class="flex font-poppins items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-gray-200 hover:text-first focus:bg-gray-200 focus:text-first active:bg-gray-200 active:text-first">
                            <div class="grid mr-4 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M6.912 3a3 3 0 00-2.868 2.118l-2.411 7.838a3 3 0 00-.133.882V18a3 3 0 003 3h15a3 3 0 003-3v-4.162c0-.299-.045-.596-.133-.882l-2.412-7.838A3 3 0 0017.088 3H6.912zm13.823 9.75l-2.213-7.191A1.5 1.5 0 0017.088 4.5H6.912a1.5 1.5 0 00-1.434 1.059L3.265 12.75H6.11a3 3 0 012.684 1.658l.256.513a1.5 1.5 0 001.342.829h3.218a1.5 1.5 0 001.342-.83l.256-.512a3 3 0 012.684-1.658h2.844z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            Transaksi
                            <div class="grid ml-auto place-items-center justify-self-end">
                                <div
                                    class="relative grid items-center px-2 py-1 font-sans text-xs font-bold uppercase rounded-full select-none whitespace-nowrap bg-blue-gray-500/20 text-blue-gray-900">
                                    <span class="">14</span>
                                </div>
                            </div>
                        </div> -->

                        <div role="button" onclick="document.location.href='logout.php'" name="logout"
                            class="font-poppins flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-gray-200 hover:text-first focus:bg-gray-200 focus:text-first active:bg-gray-200 active:text-first">
                            <div class="grid mr-4 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            Log Out
                        </div>
                    </nav>
                </div>
            </div>
            <section id="dashboard"
                class="font-poppins w-full flex flex-col mt-4 px-4 lg:px-36 pt-10 pb-20 bg-gray-100">
                <div class="flex w-full mb-8">
                    <h1 class="text-3xl">Data Menu</h1>
                </div>
                <div class="flex flex-col gap-3 bg-white rounded-md p-8">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="text-sm text-white px-2 py-2 bg-first hover:bg-secondary rounded-md w-32"
                        onclick="modalTambahData.showModal()">Tambah Data</button>
                    <dialog id="modalTambahData" class="modal">
                        <div class="modal-box">
                            <h3 class="font-bold text-lg">Form Tambah Data</h3>
                            <form action="" 
                                class="flex flex-col mt-4 w-full gap-2 rounded-lg transition duration-300 font-poppins">
                                <div class="flex flex-col">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" placeholder="Masukan nama menu"
                                        class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">
                                </div>
                                <div class="flex flex-col">
                                    <label for="tipe">Tipe</label>
                                  
                                    <select name="tipe" id="tipe" class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">
                                        <option value="Pilih" selected disabled>Pilih</option>
                                        <option value="Makanan">Makanan</option>
                                        <option value="Minuman">Minuman</option>
                                    </select>                                    
                                </div>
                                <div class="flex flex-col">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" placeholder="Masukan deskripsi menu"
                                        class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first"></textarea>
                                </div>
                                <div class="flex flex-col">
                                    <label for="harga">Harga</label>
                                    <input type="text" id="harga" placeholder="Masukan nomor harga anda"
                                        class="input-number w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">
                                    <script>
                                        function formatRupiah(angka, prefix) {
                                            var number_string = angka.replace(/[^,\d]/g, '').toString(), //Menghapus huruf
                                                split = number_string.split(','),
                                                sisa = split[0].length % 3,
                                                rupiah = split[0].substr(0, sisa),
                                                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                            if (ribuan) {
                                                separator = sisa ? '.' : '';
                                                rupiah += separator + ribuan.join('.');
                                            }

                                            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                            return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
                                        }


                                        document.querySelectorAll('.input-number').forEach(function (input) {
                                            input.addEventListener('keyup', function (e) {
                                                var nilai = formatRupiah(this.value, '');
                                                this.value = nilai.replace(/^0+/, ''); // Menghapus 0 sebelum angka selain 0
                                            });
                                        });

                                        function formatRupiah(angka, prefix) {
                                            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                                                split = number_string.split(','),
                                                sisa = split[0].length % 3,
                                                rupiah = split[0].substr(0, sisa),
                                                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                            if (ribuan) {
                                                separator = sisa ? '.' : '';
                                                rupiah += separator + ribuan.join('.');
                                            }

                                            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                            return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
                                        }

                                    </script>
                                </div>
                                <div class="flex flex-col">
                                    <label for="stok">Stok</label>
                                    <input type="stok" id="stok" placeholder="Masukan stok"
                                        class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">
                                </div>
                                <div class="flex flex-col">
                                    <label for="gambar">Gambar</label>                                   
                                    <input type="file" id="gambar" placeholder="gambar"
                                        class="w-full rounded-md bg-gray-100 file:mr-5 file:py-1 file:px-3 file:border-none file:w-full file:bg-gray-100 file:text-stone-700 hover:file:cursor-pointer hover:file:bg-red-50 hover:file:text-first focus:outline-none focus:ring focus:ring-first focus-border-first">
                                </div>
                                <div class="flex flex-col mt-2">
                                    <button type="submit"
                                        class="p-2 rounded-md bg-first text-white hover:bg-secondary">Tambah</button>
                                </div>
                            </form>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>

                    <!-- Modal Edit Data  -->
                    <dialog id="modalEditData" class="modal">
                        <div class="modal-box">
                            <h3 class="font-bold text-lg">Form Edit Data</h3>
                            <form action=""
                                class="flex flex-col mt-4 w-full gap-2 rounded-lg transition duration-300 font-poppins">
                                <div class="flex flex-col">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" placeholder="Masukan nama menu"
                                        class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first" value="Ayam Goreng">
                                </div>
                                <div class="flex flex-col">
                                    <label for="tipe">Tipe</label>
                                  
                                    <select name="tipe" id="tipe" class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">
                                        <option value="Pilih" selected disabled>Pilih</option>
                                        <option value="Makanan" selected>Makanan</option>
                                        <option value="Minuman">Minuman</option>
                                    </select>                                    
                                </div>
                                <div class="flex flex-col">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" placeholder="Masukan deskripsi menu"
                                        class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, molestias.</textarea>
                                </div>
                                <div class="flex flex-col">
                                    <label for="harga">Harga</label>
                                    <input type="text" id="harga" placeholder="Masukan nomor harga anda"
                                        class="input-number w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first" value="20000">
                                    <script>
                                        function formatRupiah(angka, prefix) {
                                            var number_string = angka.replace(/[^,\d]/g, '').toString(), //Menghapus huruf
                                                split = number_string.split(','),
                                                sisa = split[0].length % 3,
                                                rupiah = split[0].substr(0, sisa),
                                                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                            if (ribuan) {
                                                separator = sisa ? '.' : '';
                                                rupiah += separator + ribuan.join('.');
                                            }

                                            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                            return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
                                        }


                                        document.querySelectorAll('.input-number').forEach(function (input) {
                                            input.addEventListener('keyup', function (e) {
                                                var nilai = formatRupiah(this.value, '');
                                                this.value = nilai.replace(/^0+/, ''); // Menghapus 0 sebelum angka selain 0
                                            });
                                        });

                                        function formatRupiah(angka, prefix) {
                                            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                                                split = number_string.split(','),
                                                sisa = split[0].length % 3,
                                                rupiah = split[0].substr(0, sisa),
                                                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                            if (ribuan) {
                                                separator = sisa ? '.' : '';
                                                rupiah += separator + ribuan.join('.');
                                            }

                                            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                            return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
                                        }

                                    </script>
                                </div>
                                <div class="flex flex-col">
                                    <label for="stok">Stok</label>
                                    <input type="stok" id="stok" placeholder="Masukan stok"
                                        class="w-full p-2 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-first focus-border-first" value="20">
                                </div>
                                <div class="flex flex-col">
                                    <label for="gambar">Gambar</label> 
                                    <!-- <img class="w-4" src="image/ayam-goreng.jpg" alt="">                                   -->
                                    <input type="file" id="gambar" placeholder="gambar"
                                        class="w-full rounded-md bg-gray-100 file:mr-5 file:py-1 file:px-3 file:border-none file:w-full file:bg-gray-100 file:text-stone-700 hover:file:cursor-pointer hover:file:bg-red-50 hover:file:text-first focus:outline-none focus:ring focus:ring-first focus-border-first">
                                </div>
                                <div class="flex flex-col mt-2">
                                    <button type="submit"
                                        class="p-2 rounded-md bg-first text-white hover:bg-secondary">Tambah</button>
                                </div>
                            </form>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                    <!-- Modal Hapus Data -->
                    <dialog id="modalHapusData" class="modal">
                        <div class="modal-box">
                            <h3 class="font-bold text-lg">Apakah anda yakin ingin menghapus?</h3>
                            <div class="flex items-center justify-center h-[100px]">
                                <i class="inline fa-solid fa-warning fa-2xl text-[100px]"></i>
                            </div>
                            <form action=""
                                class="flex flex-col mt-4 w-full gap-2 rounded-lg transition duration-300 font-poppins">
                                <div class="flex gap-3 w-full">
                                    <button type="submit"
                                        class="w-full p-2 rounded-md border-2 border-first bg-white text-first hover:bg-first hover:text-white">Tidak</button>
                                    <button type="submit"
                                        class="w-full p-2 rounded-md bg-first text-white hover:bg-secondary">Ya</button>
                                </div>
                            </form>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                    <div class="overflow-x-auto">
                        <table class="table border-2">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>#</th>  
                                    <th>Nama</th>
                                    <th class="w-52">Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row 1 -->
                                <tr>
                                    <td>1.</td>
                                    <td>Ayam Goreng</td>
                                    <td class="text-wrap">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas,
                                        molestias.</td>
                                    <td class="text-nowrap">Rp. 20.000</td>
                                    <td>20</td>
                                    <td>
                                        <img class="rounded-lg w-16" src="image/ayam-goreng.jpg" alt="">
                                    </td>
                                    <td>
                                        <button onclick="modalEditData.showModal()" class="w-8 h-8 rounded-md text-white bg-green-600 hover:bg-green-700">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        <button onclick="modalHapusData.showModal(), document.location.href='edit.php'" class="w-8 h-8 rounded-md text-white bg-red-600 hover:bg-red-700">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- row 2 -->
                                <tr>
                                    <td>2.</td>
                                    <td>Es Teh</td>
                                    <td class="text-wrap">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas,
                                        molestias.</td>
                                    <td class="text-nowrap">Rp. 20.000</td>
                                    <td>20</td>
                                    <td>
                                        <img class="rounded-lg w-16" src="image/es-teh.jpg" alt="">
                                    </td>
                                    <td>
                                        <button onclick="modalEditData.showModal()" class="w-8 h-8 rounded-md text-white bg-green-600 hover:bg-green-700">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        <button onclick="modalHapusData.showModal()" class="w-8 h-8 rounded-md text-white bg-red-600 hover:bg-red-700">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- row 3 -->
                                <tr>
                                    <td>3.</td>
                                    <td>Es Jeruk</td>
                                    <td class="text-wrap">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas,
                                        molestias.</td>
                                    <td class="text-nowrap">Rp. 20.000</td>
                                    <td>20</td>
                                    <td>
                                        <img class="rounded-lg w-16" src="image/es-jeruk.jpg" alt="">
                                    </td>
                                    <td>
                                        <button onclick="modalEditData.showModal()" class="w-8 h-8 rounded-md text-white bg-green-600 hover:bg-green-700">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        <button onclick="modalHapusData.showModal()" class="w-8 h-8 rounded-md text-white bg-red-600 hover:bg-red-700">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Main JS  -->
    <script src="js/app.js"></script>

    <!-- Tailwind Config -->
    <script src="js/tailwind.config.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
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