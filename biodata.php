<?php
require "db.php";

if (isset($_POST['nama']) && $_POST['nama'] != '') {
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];

    $cek_data = $db->query("SELECT * FROM data_siswa WHERE nama = '$nama' AND nomor = '$nomor'");
    $data_ada = $cek_data->fetchArray();

    if ($data_ada) {
        echo "<script>alert('Nama dan Nomor sudah digunakan. Anda akan diarahkan ke hasil score.'); window.location.href='view_ranking.php?nama=" . urlencode($nama) . "&nomor=" . urlencode($nomor) . "';</script>";
    } else {
        $tambah_produk = $db->query("INSERT INTO data_siswa (nama, nomor) VALUES ('$nama', '$nomor')");
        if ($tambah_produk) {
            echo "<script>alert('Data berhasil disimpan. Anda akan diarahkan ke halaman soal.'); window.location.href='halaman_soal.php?nama=" . urlencode($nama) . "&nomor=" . urlencode($nomor) . "';</script>";
        } else {
            $errorMessage = 'Gagal menyimpan data. Silakan coba lagi.';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Soal</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #37b7c3;
            background-image: radial-gradient(#ebf4f6 2px, transparent 2px), radial-gradient(#ebf4f6 2px, transparent 2px);
            background-size: 61px 61px;
            background-position: 0 0, 30.5px 30.5px;
        }
        form {
            background-color: #71c9ce;
            border: 2px solid white;
            border-radius: 20px;
            padding: 30px;
            width: 300px;
            text-align: center;
        }
        h1 { font-size: 24px; color: white; margin-bottom: 20px; }
        
        p {
            color: white;
            margin-bottom: 20px;
        }

        input[type="text"], input[type="number"] {
            width: 100%; padding: 10px; margin-bottom: 15px;
            border: 2px solid white; border-radius: 10px; box-sizing: border-box;
        }
        button {
            width: 100%; padding: 10px; background-color: #71c9ce;
            color: white; border: 2px solid white; border-radius: 10px; cursor: pointer;
        }
        button:hover { background-color: #00796B; }
        .alert { color: red; margin-bottom: 20px; font-weight: bold; }
        
        .link-button {
            display: block;
            margin-top: 15px;
            padding: 10px;
            background-color: #71c9ce;
            color: white;
            border-radius: 10px;
            text-decoration: none;
            margin-bottom: 10px;
            text-align: center;
        }

        .link-button:hover {
            background-color: #00796B;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <h1>Tes Soal</h1>
        <p>Lengkapi biodata di bawah ini untuk mengerjakan soal</p>
        <?php if (isset($errorMessage)): ?>
            <div class="alert"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
        <input type="text" name="nama" placeholder="Masukkan nama anda" required>
        <input type="number" name="nomor" placeholder="Masukkan nomor wa anda" required>
        <button type="submit">Submit</button>
        <a href="index.php" class="link-button view-ranking">Kembali</a>
    </form>
</body>
</html>