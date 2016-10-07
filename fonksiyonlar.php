<?php 


	function kaydet($ad, $soyad, $sigortano, $unvani, $sozlesmeucreti, $ekodeme, $medenidurum, $cocuksayisi, $esdurumu, $sendika, $asgi){
			require('config.php');
		$kayit = mysqli_query($baglan, "insert into kisiler (adi, soyadi, sigorta_no, unvan, sozlesme_ucreti, ek_odeme_tutari, medeni_durum, cocuk_sayisi, es_calisma_durumu, sendika, asgi) VALUES ('$ad', '$soyad', '$sigortano', '$unvani', '$sozlesmeucreti', '$ekodeme', '$medenidurum', '$cocuksayisi', '$esdurumu', '$sendika','$asgi')");



		if ($kayit) {
			echo "Kayıt Başarıyla İşlendi...";
			return true; 
		} else {echo "Bir hata oluştu";}

		mysqli_close($baglan);
}
	
	
?>