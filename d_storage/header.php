<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D-Storage - Neubrutalism</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CSS Tambahan untuk efek Neubrutalism yang konsisten */
        body { background-color: #f4f0ec; /* Warna krem soft ala retro */ }
        .neu-border { border: 3px solid #1a1a1a; }
        .neu-shadow { box-shadow: 4px 4px 0px #1a1a1a; }
        .neu-shadow-hover:hover { box-shadow: 6px 6px 0px #1a1a1a; transform: translate(-2px, -2px); }
        .neu-shadow-active:active { box-shadow: 0px 0px 0px #1a1a1a; transform: translate(4px, 4px); }
        .drag-over { border-color: #f97316 !important; background-color: #ffedd5 !important; } /* Oranye terang saat drag */
    </style>
</head>
<body class="flex h-screen overflow-hidden font-mono"> <aside class="w-64 bg-white neu-border flex flex-col justify-between m-4 rounded-xl overflow-hidden neu-shadow">
        <div>
            <div class="h-16 flex items-center px-6 border-b-3 border-[#1a1a1a] bg-[#ffde59]"> <div class="bg-[#1a1a1a] text-white rounded p-1.5 mr-3 border-2 border-white">
                    <i class="fa-solid fa-hard-drive"></i>
                </div>
                <span class="text-xl font-black tracking-tight text-[#1a1a1a] uppercase">D-Storage</span>
            </div>

            <div class="p-6 border-b border-[#1a1a1a]">
                <button class="flex items-center justify-center gap-2 bg-[#ff6b6b] text-white font-bold px-4 py-3 rounded-lg w-full neu-border neu-shadow transition-all neu-shadow-hover neu-shadow-active">
                    <i class="fa-solid fa-plus text-lg"></i> <span class="uppercase tracking-wider">New Upload</span>
                </button>
            </div>

            <nav class="mt-4 px-4 flex flex-col gap-2">
                <a href="#" class="flex items-center gap-3 px-4 py-3 bg-[#c8e6c9] text-[#1a1a1a] font-bold rounded-lg neu-border neu-shadow">
                    <i class="fa-solid fa-folder text-lg"></i> My Files
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-[#1a1a1a] font-medium rounded-lg hover:bg-gray-100 transition-colors border-2 border-transparent hover:border-[#1a1a1a]">
                    <i class="fa-solid fa-user-group text-lg"></i> Shared
                </a>
            </nav>
        </div>

        <div class="p-6 border-t-3 border-[#1a1a1a] bg-[#e0f7fa]">
            <div class="text-sm font-bold text-[#1a1a1a] mb-2 uppercase">Storage Status</div>
            <div class="w-full bg-white rounded-full h-4 mb-2 neu-border overflow-hidden">
                <div class="bg-[#ff6b6b] h-full" style="width: 35%; border-right: 3px solid #1a1a1a;"></div>
            </div>
            <div class="text-xs font-bold text-[#1a1a1a]">5.2 GB / 15 GB</div>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-screen overflow-hidden p-4 pl-0">
        
        <header class="h-20 bg-white neu-border rounded-xl mb-4 flex items-center justify-between px-6 neu-shadow">
            <div class="flex items-center bg-[#f4f0ec] neu-border rounded-lg px-4 py-2 w-1/2 focus-within:bg-white transition-colors">
                <i class="fa-solid fa-search text-[#1a1a1a]"></i>
                <input type="text" placeholder="Search files..." class="bg-transparent border-none outline-none ml-3 w-full text-base font-bold text-[#1a1a1a] placeholder-gray-500">
            </div>

          <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-[#1a1a1a] text-white flex items-center justify-center text-sm font-bold border-2 border-white ring-2 ring-[#1a1a1a] cursor-pointer">
                    YD
                </div>
                <a href="index.php?action=logout" class="bg-[#ff6b6b] text-[#1a1a1a] font-bold px-3 py-1.5 rounded neu-border hover:bg-red-500 transition-colors" style="box-shadow: 2px 2px 0px #1a1a1a;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </div>
        </header>