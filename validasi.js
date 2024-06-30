function validatePassword() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("konfirmasi_password").value;

    // Periksa apakah password dan konfirmasi password sama
    if (password != confirmPassword) {
        alert("Password dan konfirmasi password tidak cocok!");
        return false;
    }

    // Periksa panjang password
    if (password.length < 8) {
        alert("Password harus memiliki setidaknya 8 karakter!");
        return false;
    }

    // Periksa kekuatan password (opsional)
    // Anda dapat menambahkan logika tambahan di sini, seperti memeriksa apakah password mengandung huruf besar, kecil, angka, dan karakter khusus.

    return true;
}
