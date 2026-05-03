<?php
session_start();

// Pengecekan Akses: Hanya untuk Role User
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php"); // Diarahkan ke login universal kita tadi
    exit;
}

// Fitur Logout
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header("Location: login.php");
    exit;
}

include 'koneksi.php';
include 'header.php'; // Cukup panggil satu kali di sini
?>

<div class="flex-1 overflow-y-auto p-2">
    <div class="flex justify-between items-center mb-6 px-2">
        <h1 class="text-4xl font-black text-[#1a1a1a] uppercase tracking-tighter">FILE SAYA</h1>
    </div>

    <form action="proses_upload.php" method="POST" enctype="multipart/form-data" id="uploadForm">
        <div id="dropZone" class="neu-border bg-[#e1bee7] rounded-xl p-10 flex flex-col items-center justify-center text-center mb-8 neu-shadow border-dashed" style="border-width: 4px;">
            <div class="w-16 h-16 bg-white text-[#1a1a1a] rounded-xl flex items-center justify-center text-3xl mb-4 neu-border">
                <i class="fa-solid fa-cloud-arrow-up"></i>
            </div>
            <h3 class="text-2xl font-black text-[#1a1a1a] mb-2 uppercase">Seret & Lepaskan Untuk Mengunggah</h3>
            <p class="text-base font-medium text-[#1a1a1a] mb-6 uppercase italic">Mendukung semua jenis file. Maksimal 50MB.</p>
            
            <label class="bg-[#1a1a1a] text-white font-bold px-8 py-3 rounded-lg cursor-pointer neu-shadow-hover" style="box-shadow: 4px 4px 0px #ffde59;">
                <i class="fa-solid fa-folder-open mr-2"></i> PILIH BERKAS
                <input type="file" name="file_user" id="fileInput" class="hidden" required onchange="document.getElementById('uploadForm').submit();">
            </label>
        </div>
    </form>

    <div class="bg-white neu-border rounded-xl overflow-hidden neu-shadow mb-8">
        <table class="w-full text-left">
            <thead class="bg-[#ffde59] border-b-3 border-[#1a1a1a]">
                <tr>
                    <th class="p-4 font-black border-r border-[#1a1a1a]">NAMA BERKAS</th>
                    <th class="p-4 font-black border-r border-[#1a1a1a]">UKURAN</th>
                    <th class="p-4 font-black text-center">AKSI</th>
                </tr>
            </thead>
            <tbody class="font-bold">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM files ORDER BY id DESC");
                while ($row = mysqli_fetch_assoc($query)): 
                    $fileSize = round($row['filesize'] / 1024, 2) . ' KB';
                ?>
                <tr class="border-b border-[#1a1a1a] hover:bg-[#fff9c4]">
                    <td class="p-4 border-r border-[#1a1a1a] flex items-center gap-3">
                        <div class="w-8 h-8 bg-[#bbdefb] neu-border rounded flex items-center justify-center">
                            <i class="fa-solid fa-file"></i>
                        </div>
                        <span class="truncate max-w-xs"><?= htmlspecialchars($row['filename']) ?></span>
                    </td>
                    <td class="p-4 border-r border-[#1a1a1a]"><?= $fileSize ?></td>
                    <td class="p-4 text-center">
                        <a href="download.php?id=<?= $row['id'] ?>" class="bg-[#4ade80] px-4 py-2 rounded border-2 border-[#1a1a1a] neu-shadow-sm font-black uppercase text-xs">
                            UNDUH
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>