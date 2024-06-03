<?php 
// Koneksi ke database
$db_kabita = mysqli_connect("localhost", "root", "", "kabita");

// kita buat function query 
function query($query){
   global $db_kabita;
   $result = mysqli_query($db_kabita, $query);
   // kita siapkan wadah kosong
   $db_mhs = [];
   // untuk fetching nya itu variabel nya harus sama dengan yang ada di htmlnya
   while ($mhs = mysqli_fetch_assoc($result)){
       $db_mhs[] = $mhs;
   }
   return $db_mhs;
   
};

function Add($data){
   global $db_kabita;
   $NIM = htmlspecialchars( $data["NIM"]);
   $Nama = htmlspecialchars( $data["Nama"]);
   $email = htmlspecialchars( $data["email"]);
   $Jurusan = htmlspecialchars( $data["Jurusan"]);
   // $Gambar = htmlspecialchars( $data["Gambar"]);

   // Kita buat fungsi upload gambar
   $Gambar = upload();
   if(!$Gambar) {
       return false;
   }

   $query = "INSERT INTO mahasiswa
               VALUES
               ('', '$NIM', '$Nama', '$email', '$Jurusan', '$Gambar')";

   mysqli_query($db_kabita, $query);

   return mysqli_affected_rows($db_kabita);
}

// Function upload
function upload(){
   $namaFile = $_FILES['gambar']['name'];
   $ukuranfile = $_FILES['gambar']['size'];
   $error = $_FILES['gambar']['error'];
   $tmpName = $_FILES['gambar']['tmp_name'];

   // pengecekan apakah tdk ada gambar di upload
   if($error === 4){
       echo "<script>
               alert('Pilih gambar terlebih dahulu');
           </script>";
       return false; // untuk pembatalan insert data
   
   }

   // pengecekan apakah yang diupload adalah gambar
   $extensionGambarValid = ['jpg', 'jpeg', 'png', 'MOV', 'gif'];
   $extensionGambar = explode('.', $namaFile);
   $extensionGambar = strtolower(end($extensionGambar));

   if(!in_array($extensionGambar, $extensionGambarValid)){
       echo "<script>
               alert('Yang anda upload bukan gambar, tolong cek kejujuran anda!');
           </script>";
       return false;
   }

   // Pengecekan ukuran gambar , Max = 1 MB
   if($ukuranfile > 1000000000){
       echo "<script>
               alert('Ukuran gambar terlalu besar, maksimal 50 MB!');
           </script>";
       return false;
   }

   // Lolos pengecekan, gambar siap di upload
   
   // Generate nama gambar baru

   $namaFileBaru = uniqid();
   $namaFileBaru .= '.';
   $namaFileBaru .= $extensionGambar;

   move_uploaded_file( $tmpName,'img/' . $namaFileBaru );

   return $namaFileBaru;
}

// function hapus
function Delete($id){
   global $db_kabita;
   mysqli_query($db_kabita, "DELETE FROM mahasiswa WHERE id = $id");

   return mysqli_affected_rows($db_kabita);
}

// Function edit
function Edit($data) {
   global $db_kabita;
   $id = $data["id"];
   $NIM = htmlspecialchars( $data["NIM"]);
   $Nama = htmlspecialchars( $data["Nama"]);
   $email = htmlspecialchars( $data["email"]);
   $Jurusan = htmlspecialchars( $data["Jurusan"]);
   $GambarLama = htmlspecialchars( $data["gambarLama"]);

   // Pengecekan gambar lama atau gambar baru
   if($_FILES['gambar']['error'] === 4){
       $Gambar = $GambarLama;
   } else {
       $Gambar = upload();
   }
 

   $query = "UPDATE mahasiswa SET
               NIM = '$NIM',
               Nama = '$Nama',
               email = '$email',
               Jurusan = '$Jurusan',
               Gambar = '$Gambar'
               WHERE id = $id;
               ";
  

   mysqli_query($db_kabita, $query);

   return mysqli_affected_rows($db_kabita);
}

// Function Search
function Search($keyword){

   $query ="SELECT * FROM mahasiswa
           WHERE
          Nama LIKE '%$keyword%'OR
          NIM LIKE '%$keyword%' OR
          email LIKE '%$keyword%' OR
          Jurusan LIKE '%$keyword%'";
   return query($query);
   
   
}


function Register($data){
   global $db_kabita;

   $name = $data["Nama"];
   $username = strtolower(stripslashes($data['Username']));
   $password = mysqli_real_escape_string( $db_kabita ,$data['Password']);
//    $password2 = mysqli_real_escape_string( $db_kabita ,$data['Password2']);
   
   // Pengecekan username sudah ada atau belum
   $pengecekan = mysqli_query($db_kabita, "SELECT username FROM users WHERE username = '$username'");
   if (mysqli_fetch_assoc($pengecekan)){
       echo"
           <script>
               alert('Username sudah terdaftar! silahkan pilih username yang lain ;)');
           </script>
       ";
       return false;
   }
   // Pengecekan confirm password
//    if($password !== $password2){
//        echo"
//            <script>
//                alert('Password tidak sesuai!');
//            </script>
//        ";
//        return false;
//    } else{
//        echo mysqli_error($db_kabita);
//    }
   // enkripsi password
   $password = password_hash($password, PASSWORD_DEFAULT);
   // Password default itu algoritma nya di pilih oleh php itu sendiri
   // var_dump($password); die;

   // tambahkan userbaru ke database
   mysqli_query($db_kabita, "INSERT INTO users VALUES( '','$name', '$username', '$password','','','')");

   // penngecekan gagal atau tidak
   return mysqli_affected_rows($db_kabita);
};
?>



