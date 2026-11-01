create database if not exists modul_6;

use modul_6;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL auto_increment,
  `judul` varchar(100),
  `konten` varchar(1000),
  PRIMARY KEY (`id`)
);

INSERT INTO `posts` (`judul`, `konten`) VALUES
('Starlink mulai terapkan batas data di jam sibuk',
'Starlink mengumumkan kebijakan penggunaan wajar (Fair Use Policy) baru untuk pelanggan rumahan. Pelanggan yang memakai lebih dari 1 TB data Priority Access per bulan akan mengalami pembatasan kecepatan pada jam sibuk.

Setelah kuota Priority Access habis, pengguna dipindahkan ke Basic Access, yaitu data dengan prioritas lebih rendah saat jaringan padat. Menurut Starlink, kebijakan ini hanya berdampak pada sebagian kecil pelanggan.'),
('Langganan Netflix berisi iklan: jumlah iklan sulit ditebak',
'Netflix Basic with Ads kini tersedia sebagai paket langganan yang lebih murah. Sebagai gantinya, penonton harus menyaksikan iklan di sela film dan serial yang diputar.

Netflix menyebut rata-rata iklan yang tayang sekitar 4 sampai 5 menit per jam. Namun, kapan dan berapa banyak iklan muncul sulit diprediksi, tidak seperti siaran televisi yang jadwal iklannya lebih jelas.'),
('Twitter Blue dengan verifikasi disebut segera hadir di iOS',
'Layanan Twitter Blue versi baru belum bisa dipakai secara resmi di iOS. Pihak Twitter menyatakan bahwa mereka masih menguji dan memperbarui fitur secara langsung, sehingga pengguna mungkin melihat perubahan tampilan sewaktu-waktu.

Sempat muncul tampilan notifikasi baru yang menonjolkan cuitan dari pengguna terverifikasi, tetapi tampilan tersebut hilang setelah aplikasi ditutup dan dibuka kembali.');
