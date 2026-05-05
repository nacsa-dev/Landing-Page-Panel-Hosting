<?php
// settings.php - Halaman Pengaturan Sistem
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - EMS Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        tailwind.config = { darkMode: 'class', /* ... */ }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 transition-colors duration-500 ease-in-out">
    <div class="flex h-screen overflow-hidden">
        <aside id="sidebar" class="w-64 bg-white dark:bg-gray-800 shadow-xl transition-all duration-300 ease-in-out flex flex-col fixed z-30 inset-y-0 left-0 lg:static lg:translate-x-0 transform -translate-x-full">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h1 class="text-2xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-700">EMS BILLING</h1>
                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">Logged in as: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            </div>
            <nav class="flex-grow p-4 space-y-2">
                <a href="dashboard.php" class="flex items-center p-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-300 ease-in-out">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
                    Dashboard
                </a>
                <a href="billing_all.php" class="flex items-center p-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-300 ease-in-out">
                    <i data-lucide="credit-card" class="w-5 h-5 mr-3"></i>
                    Semua Billing
                </a>
                <a href="settings.php" class="flex items-center p-3 rounded-lg text-white font-medium bg-gradient-to-r from-indigo-500 to-purple-600 shadow-lg shadow-indigo-500/50 transition duration-300 ease-in-out transform hover:scale-[1.02]">
                    <i data-lucide="settings" class="w-5 h-5 mr-3"></i>
                    Pengaturan
                </a>
            </nav>
            <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                <a href="logout.php" class="w-full flex items-center justify-center p-3 rounded-lg bg-red-100 text-red-700 hover:bg-red-200 dark:bg-red-900 dark:text-red-200 dark:hover:bg-red-800 transition duration-300">
                    <i data-lucide="log-out" class="w-5 h-5 mr-2"></i>
                    <span>Keluar (Logout)</span>
                </a>
            </div>
        </aside>

        <div id="main-content" class="flex-1 flex flex-col overflow-y-auto">
            <header class="sticky top-0 z-20 bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm shadow-md p-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold">Pengaturan Sistem</h2>
            </header>

            <main class="p-4 lg:p-8 flex-1">
                <section data-aos="fade-up" class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg mb-8">
                    <h3 class="text-xl font-semibold mb-4 border-b pb-2 border-gray-200 dark:border-gray-700">Detail Akun</h3>
                    <div class="space-y-3">
                        <p><strong>Nama Pengguna:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                        <p><strong>Nama Lengkap:</strong> <?php echo htmlspecialchars($_SESSION['nama_lengkap'] ?? 'N/A'); ?></p>
                        <button class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 transition duration-300">Ubah Password</button>
                    </div>
                </section>

                <section data-aos="fade-up" data-aos-delay="200" class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
                    <h3 class="text-xl font-semibold mb-4 border-b pb-2 border-gray-200 dark:border-gray-700">Integrasi & Sinkronisasi</h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-3">
                        Sinkronisasi data billing otomatis diatur melalui Cron Job.
                    </p>
                    <button class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600 transition duration-300">Cek Status Cron Job</button>
                </section>
            </main>
        </div>
    </div>
    <script>
        AOS.init({ duration: 900, once: true });
        lucide.createIcons();
        // Implementasi Dark Mode dan Sidebar Toggle (Salin dari dashboard.php jika diperlukan ya)
    </script>
</body>
</html>
