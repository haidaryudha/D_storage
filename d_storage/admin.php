<?php
session_start();

// Memanggil koneksi database agar variabel $conn bisa digunakan di halaman ini
include 'koneksi.php';

// SATPAM SISTEM: Cek apakah yang masuk benar-benar admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Fitur Logout
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D-Storage Admin Node Monitoring</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f4f0ec; }
        .neu-border { border: 3px solid #1a1a1a; }
        .neu-shadow { box-shadow: 6px 6px 0px #1a1a1a; }
        .neu-shadow-sm { box-shadow: 3px 3px 0px #1a1a1a; }
        .neu-shadow-sm:active { box-shadow: 0px 0px 0px #1a1a1a; transform: translate(3px, 3px); }
    </style>
</head>
<body class="flex h-screen overflow-hidden font-mono">

    <aside class="w-72 bg-[#1a1a1a] text-white flex flex-col justify-between p-4 m-4 rounded-xl neu-shadow border-4 border-white">
        <div>
            <div class="h-16 flex items-center mb-8 bg-[#ffde59] p-3 rounded neu-border neu-shadow-sm">
                <i class="fa-solid fa-server text-[#1a1a1a] text-2xl mr-3"></i>
                <span class="text-2xl font-black tracking-tighter text-[#1a1a1a] uppercase">D-Admin</span>
            </div>

            <nav class="flex flex-col gap-3">
                <a href="#" class="flex items-center gap-3 px-4 py-3 bg-[#4ade80] text-[#1a1a1a] font-black uppercase rounded neu-border neu-shadow-sm">
                    <i class="fa-solid fa-layer-group text-xl"></i> Overview
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-white font-bold hover:bg-gray-800 rounded border-2 border-transparent hover:border-white transition-all">
                    <i class="fa-solid fa-network-wired text-xl"></i> Node Management
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-white font-bold hover:bg-gray-800 rounded border-2 border-transparent hover:border-white transition-all">
                    <i class="fa-solid fa-hard-drive text-xl"></i> Storage Pool
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-white font-bold hover:bg-gray-800 rounded border-2 border-transparent hover:border-white transition-all">
                    <i class="fa-solid fa-users text-xl"></i> Users
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-white font-bold hover:bg-gray-800 rounded border-2 border-transparent hover:border-white transition-all">
                    <i class="fa-solid fa-terminal text-xl"></i> System Logs
                </a>
            </nav>
        </div>

        <a href="admin.php?action=logout" class="flex items-center justify-center gap-2 bg-[#ff6b6b] text-[#1a1a1a] font-black px-4 py-3 rounded neu-border neu-shadow-sm uppercase">
            <i class="fa-solid fa-power-off"></i> Terminate Session
        </a>
    </aside>

    <main class="flex-1 flex flex-col h-screen overflow-y-auto p-4 pl-0">
        
        <header class="flex justify-between items-center bg-white p-4 rounded-xl neu-border neu-shadow mb-6">
            <h1 class="text-3xl font-black text-[#1a1a1a] uppercase tracking-tighter">Distributed Nodes</h1>
            <div class="flex items-center gap-3 bg-[#c8e6c9] px-4 py-2 rounded neu-border">
                <div class="w-3 h-3 bg-green-500 rounded-full border border-black animate-pulse"></div>
                <span class="font-black text-[#1a1a1a] uppercase text-sm">All Systems Online</span>
            </div>
        </header>

        <div class="bg-[#bbdefb] p-4 rounded-xl neu-border neu-shadow mb-6 flex items-center gap-3">
            <i class="fa-solid fa-circle-info text-2xl text-[#1a1a1a]"></i>
            <span class="font-bold text-[#1a1a1a]">Tip: Use the failover buttons below to test your distributed system's resilience.</span>
        </div>

        <div class="grid grid-cols-4 gap-6 mb-8">
            <div class="bg-[#e1bee7] p-5 rounded-xl neu-border neu-shadow flex flex-col justify-between">
                <div>
                    <h2 class="font-black text-[#1a1a1a] text-lg uppercase leading-tight">HAProxy - VM1</h2>
                    <p class="text-sm font-bold text-gray-700 mb-4">Load Balancing</p>
                    <div class="flex justify-between items-end mb-4 border-b-2 border-[#1a1a1a] pb-2">
                        <span class="font-bold">Uptime:</span>
                        <span class="text-2xl font-black text-green-700">99.98%</span>
                    </div>
                </div>
                <button class="w-full bg-[#ffde59] text-[#1a1a1a] font-black py-2 rounded neu-border neu-shadow-sm transition-transform">
                    <i class="fa-solid fa-bolt mr-1"></i> FAILOVER
                </button>
            </div>

            <div class="bg-white p-5 rounded-xl neu-border neu-shadow flex flex-col justify-between">
                <div>
                    <h2 class="font-black text-[#1a1a1a] text-lg uppercase leading-tight">Nginx/PHP - VM2</h2>
                    <p class="text-sm font-bold text-gray-700 mb-4">Web Server 1</p>
                    <div class="flex justify-between items-end mb-4 border-b-2 border-[#1a1a1a] pb-2">
                        <span class="font-bold">Uptime:</span>
                        <span class="text-2xl font-black text-green-700">99.95%</span>
                    </div>
                </div>
                <button class="w-full bg-[#ffde59] text-[#1a1a1a] font-black py-2 rounded neu-border neu-shadow-sm transition-transform">
                    <i class="fa-solid fa-bolt mr-1"></i> FAILOVER
                </button>
            </div>

            <div class="bg-white p-5 rounded-xl neu-border neu-shadow flex flex-col justify-between">
                <div>
                    <h2 class="font-black text-[#1a1a1a] text-lg uppercase leading-tight">Nginx/PHP - VM3</h2>
                    <p class="text-sm font-bold text-gray-700 mb-4">Web Server 2</p>
                    <div class="flex justify-between items-end mb-4 border-b-2 border-[#1a1a1a] pb-2">
                        <span class="font-bold">Uptime:</span>
                        <span class="text-2xl font-black text-green-700">99.97%</span>
                    </div>
                </div>
                <button class="w-full bg-[#ffde59] text-[#1a1a1a] font-black py-2 rounded neu-border neu-shadow-sm transition-transform">
                    <i class="fa-solid fa-bolt mr-1"></i> FAILOVER
                </button>
            </div>

            <div class="bg-[#ffccbc] p-5 rounded-xl neu-border neu-shadow flex flex-col justify-between">
                <div>
                    <h2 class="font-black text-[#1a1a1a] text-lg uppercase leading-tight">NFS/MySQL - VM4</h2>
                    <p class="text-sm font-bold text-gray-700 mb-4">Storage & DB</p>
                    <div class="flex justify-between items-end mb-4 border-b-2 border-[#1a1a1a] pb-2">
                        <span class="font-bold">Uptime:</span>
                        <span class="text-2xl font-black text-green-700">99.99%</span>
                    </div>
                </div>
                <button class="w-full bg-[#ffde59] text-[#1a1a1a] font-black py-2 rounded neu-border neu-shadow-sm transition-transform">
                    <i class="fa-solid fa-bolt mr-1"></i> FAILOVER
                </button>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl neu-border neu-shadow">
            <h2 class="text-2xl font-black text-[#1a1a1a] uppercase mb-1">System Logs</h2>
            <p class="font-bold text-gray-500 mb-6">Recent system events and activities</p>
            
            <table class="w-full text-left">
                <thead class="bg-[#f4f0ec] border-b-4 border-[#1a1a1a]">
                    <tr>
                        <th class="p-3 font-black text-[#1a1a1a] border-r-2 border-[#1a1a1a]">Timestamp</th>
                        <th class="p-3 font-black text-[#1a1a1a] border-r-2 border-[#1a1a1a]">Event Type</th>
                        <th class="p-3 font-black text-[#1a1a1a] border-r-2 border-[#1a1a1a]">Description</th>
                        <th class="p-3 font-black text-[#1a1a1a] text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="font-bold text-[#1a1a1a]">
    <?php
    $query_logs = mysqli_query($conn, "SELECT * FROM system_logs ORDER BY id DESC LIMIT 5");
    while ($log = mysqli_fetch_assoc($query_logs)):
        // Warna status neubrutalism
        $statusColor = ($log['status'] == 'Kesuksesan') ? 'bg-[#4ade80]' : (($log['status'] == 'Peringatan') ? 'bg-[#ffde59]' : 'bg-[#ff6b6b]');
    ?>
    <tr class="border-b-2 border-[#1a1a1a] bg-white hover:bg-gray-50">
        <td class="p-3 border-r-2 border-[#1a1a1a] text-xs"><?= $log['timestamp'] ?></td>
        <td class="p-3 border-r-2 border-[#1a1a1a] uppercase"><?= $log['event_type'] ?></td>
        <td class="p-3 border-r-2 border-[#1a1a1a]"><?= $log['description'] ?></td>
        <td class="p-3 text-center">
            <span class="<?= $statusColor ?> px-2 py-1 border-2 border-[#1a1a1a] shadow-[2px_2px_0px_#1a1a1a] text-[10px] uppercase">
                <?= $log['status'] ?>
            </span>
        </td>
    </tr>
    <?php endwhile; ?>
</tbody>
            </table>
        </div>
    </main>

</body>
</html>