<?php
session_start();
include 'koneksi.php';

$target_dir = "../shared_nfs/"; 
$asli_file_name = basename($_FILES["file_user"]["name"]);
$file_size = $_FILES["file_user"]["size"];
$file_extension = pathinfo($asli_file_name, PATHINFO_EXTENSION);
$unik_file_name = uniqid() . "_" . time() . "." . $file_extension; 
$target_file = $target_dir . $unik_file_name;

// Ambil nama user dari session untuk dicatat di log
$nama_user = isset($_SESSION['username']) ? $_SESSION['username'] : 'Anonim';

if (move_uploaded_file($_FILES["file_user"]["tmp_name"], $target_file)) {
    $nama_aman = mysqli_real_escape_string($conn, $asli_file_name);
    $path_aman = mysqli_real_escape_string($conn, $target_file);

    // 1. Simpan data file
    $query_file = "INSERT INTO files (filename, filepath, filesize) VALUES ('$nama_aman', '$path_aman', '$file_size')";
    
    if (mysqli_query($conn, $query_file)) {
        // 2. PASANG SENSOR LOG DI SINI
        $log_desc = "Pengguna $nama_user mengunggah berkas: $nama_aman";
        mysqli_query($conn, "INSERT INTO system_logs (event_type, description, status) VALUES ('Unggahan Berkas', '$log_desc', 'Kesuksesan')");

        echo "<script>alert('Berhasil! Log aktivitas telah dicatat.'); window.location='index.php';</script>";
    } else {
        echo "Database error: " . mysqli_error($conn);
    }
} else {
    echo "Gagal memindahkan file ke Storage.";
}
?>