<?php
require('db.php');

$total_benar = 0;

foreach ($_POST as $key => $value) {
    if (strpos($key, 'jawaban') === 0) {
        $id = str_replace('jawaban', '', $key);
        $benar = $_POST['benar' . $id];
        if ($value == $benar) {
            $total_benar++;
        }
    }
}

$nama = $_POST['nama'];
$nomor = $_POST['nomor'];

// Update hasil
$db->query("UPDATE data_siswa SET hasil = '$total_benar' WHERE nama = '$nama' AND nomor = '$nomor'");

// Ambil hasil dari database
$result = $db->query("SELECT * FROM data_siswa");

// Simpan hasil ke dalam array
$daftar_hasil = [];
while ($row = $result->fetchArray()) {
    $daftar_hasil[] = $row;
}

// Urutkan array berdasarkan hasil
usort($daftar_hasil, function($a, $b) {
    return $b['hasil'] - $a['hasil']; // Urutkan dari yang tertinggi
});
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kuis</title>
    <style>
        body {
            font-family: 'Comic Sans MS', sans-serif;
            background-color: #37b7c3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #71c9ce;
            width: 300px;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            border: 5px solid white; 
        }
        .result {
            font-size: 24px;
            color: white;
        }
        .score {
            font-size: 40px;
            margin: 20px 0;
            color: white;
        }
        .button {
            background-color: white;
            color: #37b7c3;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #ebf4f6;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Hasil Kuis</h2>
    <div class="result">
        Anda menjawab <span class="score"><?php echo $total_benar; ?></span> dari 10 soal.
    </div>
    <h3>Daftar Hasil:</h3>
    <table border="1" style="width:100%; border-collapse: collapse;">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Hasil</th>
        </tr>
        <?php 
        $no = 1;
        foreach ($daftar_hasil as $row) { ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo htmlspecialchars($row['nama']); ?></td>
                <td><?php echo htmlspecialchars($row['hasil']); ?></td>
            </tr>
        <?php 
            $no++;
        } ?>
    </table>
    <a href="biodata.php">kembali</a>
</div>

</body>
</html>
