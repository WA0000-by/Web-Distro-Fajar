<?php
// Koneksi ke database
$host = "localhost"; // sesuaikan dengan host database Anda
$user = "root"; // sesuaikan dengan username database Anda
$password = ""; // sesuaikan dengan password database Anda
$database = "nama_database"; // sesuaikan dengan nama database Anda

// Buat koneksi
$koneksi = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

// Ambil nilai dari formulir
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$nomor_telepon = $_POST['nomor_telepon'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];

// Enkripsi password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Query untuk menyimpan data ke dalam database
$query = "INSERT INTO users (nama_lengkap, email, nomor_telepon, alamat, password) 
          VALUES (?, ?, ?, ?, ?)";

// Persiapkan pernyataan SQL
$stmt = $koneksi->prepare($query);

// Bind parameter ke pernyataan
$stmt->bind_param("sssss", $nama_lengkap, $email, $nomor_telepon, $alamat, $password_hash);

// Eksekusi pernyataan
if ($stmt->execute()) {
    echo "Registrasi berhasil!";
} else {
    echo "Error: " . $query . "<br>" . $koneksi->error;
}

// Tutup pernyataan dan koneksi
$stmt->close();
$koneksi->close();
?>

