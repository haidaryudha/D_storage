<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $query = mysqli_query($conn, "SELECT filename, filepath FROM files WHERE id = $id");
    $data = mysqli_fetch_assoc($query);

    if ($data && file_exists($data['filepath'])) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($data['filename']) . '"');
        header('Content-Length: ' . filesize($data['filepath']));
      
        readfile($data['filepath']);
        exit;
    } else {
        echo "Wah, file tidak ditemukan di Storage (NFS).";
    }
}
?>