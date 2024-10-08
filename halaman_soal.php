<?php
require('db.php');

// Ambil nama dan nomor dari URL
$nama = $_GET['nama'];
$nomor = $_GET['nomor'];

// Ambil data soal
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #37b7c3;
            background-image: radial-gradient(#ebf4f6 2px, transparent 2px), radial-gradient(#ebf4f6 2px, transparent 2px);
            background-size: 61px 61px;
            background-position: 0 0, 30.5px 30.5px;
            color: white;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
            margin: auto;
        }
        .title-soal {
            padding: 20px;
            background-color: rgba(113, 201, 206, 0.9);
            border-radius: 10px;
            text-align: center;
            margin-bottom: 2rem;
            border: 2px solid white;
        }
        .card-soal {
            background-color: rgba(113, 201, 206, 0.9);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            border: 2px solid white;
        }
        input[type="radio"] {
            margin: 5px 0;
        }
        .submit-button {
            width: 100%;
            height: 50px;
            background-color: rgba(113, 201, 206, 0.9);
            border: none;
            border-radius: 10px;
            font-size: 18px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .submit-button:hover {
            background-color: rgba(82, 147, 150, 0.9);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title-soal">
        <h1>Selamat Datang di Kuis!</h1>
        <h2>Jawablah Soal Di Bawah Ini Dengan Jujur!</h2>
    </div>
    
    <form method="POST" action="tampilan.php">
        <?php
        $result = $db->query("SELECT * FROM data_soal ORDER BY RANDOM() LIMIT 10");
        $no=1;
        while ($row = $result->fetchArray()) { ?>
            <div class="card-soal">

                <p><?php echo $no;?>. <?php echo htmlspecialchars($row['soal']); ?></p>
                <input type="radio" name="jawaban<?php echo $row['id']; ?>" value="A" required> <?php echo htmlspecialchars($row['jawaban_A']); ?><br>
                <input type="radio" name="jawaban<?php echo $row['id']; ?>" value="B"> <?php echo htmlspecialchars($row['jawaban_B']); ?><br>
                <input type="radio" name="jawaban<?php echo $row['id']; ?>" value="C"> <?php echo htmlspecialchars($row['jawaban_C']); ?><br>
                <input type="radio" name="jawaban<?php echo $row['id']; ?>" value="D"> <?php echo htmlspecialchars($row['jawaban_D']); ?><br>
                <input type="hidden" name="benar<?php echo $row['id']; ?>" value="<?php echo htmlspecialchars($row['jawaban_benar']); ?>">
            </div>
        <?php
    $no++;
    } 
    ?>
        <input type="hidden" name="nama" value="<?php echo htmlspecialchars($nama); ?>">
        <input type="hidden" name="nomor" value="<?php echo htmlspecialchars($nomor); ?>">
        <button type="submit" class="submit-button">Submit</button>
    </form>
</div>

</body>
</html>
