<?php
// index.php - Halaman Utama Aplikasi Perpustakaan
$halaman = isset($_GET['page']) ? $_GET['page'] : 'home';

// Daftar halaman yang diizinkan (whitelist) untuk mencegah LFI
$allowed = ['home', 'form', 'data'];
if (!in_array($halaman, $allowed)) {
    $halaman = 'home';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Perpustakaan</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f6f9;
            color: #333;
        }
        header {
            background: #1f3864;
            color: #fff;
            padding: 20px 40px;
        }
        header h1 { margin: 0; font-size: 22px; }
        header p { margin: 4px 0 0; font-size: 13px; opacity: .85; }
        nav {
            background: #2e5395;
            padding: 10px 40px;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin-right: 24px;
            font-weight: bold;
            padding: 8px 0;
            display: inline-block;
        }
        nav a:hover, nav a.active { border-bottom: 3px solid #ffd966; }
        main {
            padding: 30px 40px;
            max-width: 900px;
        }
        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 4px rgba(0,0,0,.08);
            padding: 24px;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            background: #1f3864;
            color: #fff;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 10px;
        }
        .btn:hover { background: #2e5395; }
        .btn-secondary { background: #2e7d32; }
        .btn-secondary:hover { background: #3a9a40; }
        ul.info { line-height: 1.9; }
        footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>

    <header>
        <h1>📚 Sistem Informasi Perpustakaan</h1>
        <p>Pendaftaran &amp; Manajemen Anggota</p>
    </header>

    <nav>
        <a href="index.php?page=home"   class="<?= $halaman==='home'?'active':'' ?>">Beranda</a>
        <a href="index.php?page=form"   class="<?= $halaman==='form'?'active':'' ?>">Daftar Anggota</a>
        <a href="index.php?page=data"   class="<?= $halaman==='data'?'active':'' ?>">Data Anggota</a>
    </nav>

    <main>
        <?php if ($halaman === 'home') : ?>
            <div class="card">
                <h2>Selamat Datang 👋</h2>
                <p>Aplikasi sederhana untuk mengelola pendaftaran anggota perpustakaan,
                   dibuat dengan PHP native dan MySQL.</p>
                <ul class="info">
                    <li>📝 Tambah anggota baru melalui form pendaftaran.</li>
                    <li>📊 Lihat seluruh data anggota yang sudah terdaftar.</li>
                    <li>🔎 Data tersimpan aman di database MySQL.</li>
                </ul>
                <a href="index.php?page=form" class="btn">➕ Daftar Anggota Baru</a>
                <a href="index.php?page=data" class="btn btn-secondary">📋 Lihat Data Anggota</a>
            </div>

        <?php elseif ($halaman === 'form') : ?>
            <div class="card">
                <h2>Form Pendaftaran Anggota</h2>
                <p>Silakan isi data di bawah untuk mendaftarkan anggota baru.</p>
                <a href="form_anggota.php" class="btn">Buka Form Pendaftaran</a>
            </div>

        <?php elseif ($halaman === 'data') : ?>
            <div class="card">
                <h2>Data Anggota</h2>
                <p>Halaman data anggota membutuhkan file <code>data_anggota.php</code>
                   dan koneksi database.</p>
                <a href="data_anggota.php" class="btn">Lihat Data Anggota</a>
            </div>
        <?php endif; ?>
    </main>

    <footer>
        &copy; <?= date('Y') ?> Sistem Informasi Perpustakaan &middot; Dibuat dengan PHP
    </footer>

</body>
</html>