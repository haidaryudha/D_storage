<?php
session_start();

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah yang login adalah Admin
    if ($username === 'admin' && $password === '123') {
        $_SESSION['role'] = 'admin';
        $_SESSION['username'] = 'Super Admin';
        header("Location: admin.php"); // Arahkan ke Dashboard Admin
        exit;
    } 
    // Cek apakah yang login adalah User Biasa
    elseif ($username === 'user' && $password === '123') {
        $_SESSION['role'] = 'user';
        $_SESSION['username'] = 'Regular User';
        header("Location: index.php"); // Arahkan ke My Files (User)
        exit;
    } 
    // Jika tidak ada yang cocok
    else {
        $error = 'Username atau Password salah gan!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universal Login - D-Storage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #f4f0ec; }
        .neu-border { border: 4px solid #1a1a1a; }
        .neu-shadow { box-shadow: 8px 8px 0px #1a1a1a; }
        .neu-shadow-btn { box-shadow: 4px 4px 0px #1a1a1a; }
        .neu-shadow-btn:active { box-shadow: 0px 0px 0px #1a1a1a; transform: translate(4px, 4px); }
    </style>
</head>
<body class="h-screen flex items-center justify-center font-mono">
    
    <div class="bg-[#ffde59] w-full max-w-md p-8 rounded-xl neu-border neu-shadow">
        <h1 class="text-4xl font-black text-[#1a1a1a] uppercase mb-2">LOGIN SISTEM</h1>
        <p class="font-bold text-[#1a1a1a] mb-6">Satu pintu untuk Admin & User.</p>

        <?php if($error): ?>
            <div class="bg-[#ff6b6b] text-[#1a1a1a] font-bold p-3 mb-4 neu-border">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login.php" class="flex flex-col gap-4">
            <div>
                <label class="block font-bold text-[#1a1a1a] mb-2 uppercase">Username</label>
                <input type="text" name="username" required class="w-full p-3 bg-white neu-border focus:bg-[#e0f7fa] outline-none text-lg font-bold">
            </div>
            <div>
                <label class="block font-bold text-[#1a1a1a] mb-2 uppercase">Password</label>
                <input type="password" name="password" required class="w-full p-3 bg-white neu-border focus:bg-[#e0f7fa] outline-none text-lg font-bold">
            </div>
            <button type="submit" class="mt-4 bg-[#4ade80] text-[#1a1a1a] text-xl font-black uppercase py-4 rounded neu-border neu-shadow-btn transition-all">
                SISTEM AKSES
            </button>
        </form>
    </div>

</body>
</html>