<?php
// Ambil data dari form
$nama    = htmlspecialchars($_POST['nama']);
$tanggal = htmlspecialchars($_POST['tanggal']);
$hari    = htmlspecialchars($_POST['hari']);
$omzet   = number_format($_POST['omzet'], 0, ',', '.');

// Tujuan email
$to = "angkringanbirawa@gmail.com";

// Subject
$subject = "Laporan Omzet Harian - Angkringan Birawa";

// Isi pesan
$message = "
LAPORAN ABSEN & OMZET
ANGKRINGAN BIRAWA
----------------------

Nama    : $nama
Hari    : $hari
Tanggal : $tanggal
Omzet   : Rp $omzet

----------------------
Dikirim otomatis dari sistem absen
";

// Header email (PENTING)
$headers = "From: Absen Angkringan Birawa <no-reply@angkringanbirawa.com>\r\n";
$headers .= "Reply-To: angkringanbirawa@gmail.com\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8";

// Kirim email
if (mail($to, $subject, $message, $headers)) {
    echo "
    <html>
    <body style='font-family:Arial; background:#fff3e0; text-align:center; padding:40px;'>
      <h2 style='color:#ff5722;'>🙏 Terima Kasih</h2>
      <p>Laporan omzet berhasil dikirim</p>
      <a href='index.html' style='color:white; background:#ff5722; padding:10px 20px; border-radius:20px; text-decoration:none;'>Kembali ke Beranda</a>
    </body>
    </html>
    ";
} else {
    echo "Gagal mengirim email. Cek konfigurasi server.";
}
?>
