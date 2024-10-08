<?php

$db = new SQLite3('quiz.sqlite');

if(!$db) {
  echo $db->lastErrorMsg();
} else {
//   echo "Open database success...\n";
} 
// data siswa
$db->query("CREATE TABLE  IF NOT EXISTS data_siswa(
 id INTEGER PRIMARY KEY AUTOINCREMENT,
 nama TEXT NOT NULL,
 nomor TEXT NOT NULL,
 hasil TEXT NULL
)");

// data soal
$db->query("CREATE TABLE IF NOT EXISTS data_soal(
 id INTEGER PRIMARY KEY,
 soal TEXT NOT NULL,
 jawaban_A TEXT NOT NULL,
 jawaban_B TEXT NOT NULL,
 jawaban_C TEXT NOT NULL,
 jawaban_D TEXT NOT NULL,
 jawaban_benar TEXT NOT NULL
)");

$db->query("INSERT INTO data_soal (soal, jawaban_A, jawaban_B, jawaban_C, jawaban_D, jawaban_benar) VALUES
('Jika hendak tidur malam, Rasulullah SAW berbaring menghadap...', 'Kiri', 'Kanan', 'Ke atas', 'Ke bawah', 'B'),
('Banyak sekali Riwayat hadits yang menceritakan bahwa Rasulullah SAW sering menggunakan sorban berwarna', 'Putih', 'Hitam', 'Biru', 'Merah', 'A'),
('Rasulullah SAW wafat pada hari...', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'A'),
('Tanda-tanda kenabian yang terlihat oleh pendeta Nasrani ketika Nabi Muhammad SAW ikut perjalanan berdagang ke Syam bersama Pamannya adalah', 'Sepanjang perjalanan di gurun mereka dinaungi awan', 'Selama perjalanan rombongan nabi tidak kehausan', 'Sepanjang perjalanan mereka diberikan makan oleh penduduk lokal', 'Sebelum sampai tujuan dagangan mereka sudah habis', 'A'),
('Siapakah nama Ibu Asuh Rasulullah SAW', 'Suwaibah', 'Halimatussa\diyah', 'Ummu Aiman', 'Haulah bin al Mundzir', 'B'),
('Kitab suci yang diturunkan kepada Nabi Muhammad SAW Adalah.', 'Injil', 'Al-Quran', 'Zabur', 'Taurat', 'B'),
('Orang-orang yang merawat Nabi Muhammad semasa kecil, kecuali...', 'Abdul Muthalib', 'Siti Aminah', 'Siti Khadijah', 'Abu Talib', 'C'),
('Sehabis makan, Rasulullah SAW menjilati ketiga jari beliau sebanyak...', '1 kali', '7 kali', '3 kali', 'Sekali', 'C'),
('Nama Ibu dari Anas ibn Malik yang mengumpulkan keringan Rasulullah dan mencampurkan dengan minyak wangi beliau adalah...', 'Ummu Sulaim ibn Milhan', 'Ummu Aiman', 'Ummu Salamah', 'Ummu Kultsum', 'A'),
('Sahabat yang menemani Nabi Muhammad SAW pada saat hijrah ke Madinah adalah', 'Abu Bakar As Shidiq', 'Umar Bin Khatab', 'Usman Bin Affan', 'Ali Bin Abi Thalib', 'A')");


?>