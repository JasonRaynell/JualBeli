<?php
// Secret Key ini kita ambil dari halaman Google reCaptcha
// Sesuai pada catatan saya di STEP 1 nomor 6
$secret_key = "6LfbNMgUAAAAAILkWcfPVL7KHKBqiUP9zo4sIWGt";

// Disini kita akan melakukan komunkasi dengan google recpatcha
// dengan mengirimkan scret key dan hasil dari response recaptcha nya
$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
$response = json_decode($verify);

if($response->success){ // Jika proses validasi captcha berhasil
	echo "<h2>Captcha Valid</h2>";
	echo "Yes, you're human (Anda adalah manusia)<hr>";
}else{ // Jika captcha tidak valid
	echo "<h2>Captcha Tidak Valid</h2>";
	echo "Ohh sorry, you're not human (Anda bukan manusia)<hr>";
	echo "Silahkan klik kotak I'm not robot (reCaptcha) untuk verifikasi";
}
?>

