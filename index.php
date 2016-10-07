<?php require('fonksiyonlar.php'); 
	  require('asgi.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Döküman</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="scriptlerim.js"></script>
<script type="text/javascript">
	$(function(){
		$("select[name]").change(function(){
			var medeniDeger = $("select").val();
			if (medeniDeger=="bekar") {
				$("#cocukdurumu").hide();
				$("#escalis").hide();
			} else {
				$("#cocukdurumu").show();
				$("#escalis").show();
			}
		});
		
	});
</script>

<script>
	function kayitYap(){
		var ad = $("input[name=adi]").val();
		var soyad = $("input[name=soyadi").val();
		var sigortano = $("input[name=sigortano").val();
		var unvani = $("input[name=unvani").val();
		var sozlesmeucreti = $("input[name=sozlesmeucreti").val();
		var ekodemetutari = $("input[name=ekodemetutari").val();
		var medenidurum = $("select[name=medenidurum]").val();
		var cocuksayisi = $("input[name=cocuksayisi]").val();
		var esdurumu = $("select[name=esdurumu]").val();
		var sendikadrm = $("input[name=sendikadrm]").val();
	}
</script>
</head>
<body>
<div style="display: none" id="dialog">
	<p>Kayıt İşlemi Başarıyla Yapıldı</p>
</div>

<div class="row">
	<div id="bannerarkaalani" class="col-md-12 banner">
		<h1 id="tcad">4B MAAŞ UYGULAMASI</h1>
	</div>
	<div class="col-md-2">
		
<?php 
			if ($_POST) {
				$adi = $_POST['adi'];
				$soyadi = $_POST['soyadi'];
				$sigortano = $_POST['sigortano'];
				$unvani = $_POST['unvani'];
				$sozlesmeucreti = $_POST['sozlesmeucreti'];
				$ekodemetutari = $_POST['ekodemetutari'];
				$medenidurum = $_POST['medenidurum'];
				$cocuksayisi = $_POST['cocuksayisi'];
				if ($cocuksayisi=="") {
					$cocuksayisi=0; 
				}
				$esdurumu = $_POST['esdurumu'];
				if ($esdurumu == "calismiyor") {
					$esdurumu = 0;
				} else if ($esdurumu == "calisiyor") {
					$esdurumu = 1;
				}
				if(!isset($_POST['sendikadrm'])) {
					$sendika = "Kayıtlı Değil";
				} else {$sendika="Kayıtlı";}

				if ((!empty($adi)) && (!empty($soyadi))&&(!empty($sigortano))&&(!empty($unvani))&&(!empty($sozlesmeucreti))&&(!empty($ekodemetutari))) {
					$asgi = asgiHesapla($cocuksayisi, $esdurumu);
					$sonuc = kaydet($adi, $soyadi, $sigortano, $unvani, $sozlesmeucreti, $ekodemetutari, $medenidurum, $cocuksayisi, $esdurumu, $sendika, $asgi);
				} else {echo "boş bırakma";}


				
};
?>


	</div>
	<div id="orta" class="col-md-8">
		<h3 id="tcad">Personel Kayıt</h3> 	
		<div id="kayitalani">
		<form action="index.php" method="POST" onsubmit="return false">
			<table class="table table-striped">
				<tr>
					<td>Adı</td>
					<td><input class="form-control" type="text" name="adi"></td>
				</tr>				
				<tr>
					<td>Soyadı</td>
					<td><input class="form-control" type="text" name="soyadi"></td>
				</tr>				
				<tr>
					<td>Sigorta No</td>
					<td><input class="form-control" type="text" name="sigortano"></td>
				</tr>
				<tr>
					<td>Ünvanı</td>
					<td><input class="form-control" type="text" name="unvani"></td>
				</tr>				
				<tr>
					<td>Sözleşme Ücreti</td>
					<td><input class="form-control" type="text" name="sozlesmeucreti"></td>
				</tr>
				<tr>
					<td>Ek Ödeme Tutarı</td>
					<td><input class="form-control" type="text" name="ekodemetutari"></td>
				</tr>	
				<tr>
					<td>Medeni Durumu</td>
					<td>
						<select name="medenidurum" class="form-control">
							<option value="bekar">Bekar</option>
							<option value="evli">Evli</option>							
						</select>
					</td>
				</tr>	
		

				<tr id="cocukdurumu" style="display: none">
					<td>Çocuk Sayısı</td>
					<td>
						<input class="form-control" type="text" name="cocuksayisi">
					</td>	
				</tr>
				<tr id="escalis" style="display: none;">
					<td>Eşi Çalışıyor mu</td>
					<td>
						<select name="esdurumu" class="form-control">
							<option value="calisiyor">Eşi Çalışıyor</option>
							<option value="calismiyor">Eşi Çalışmıyor</option>							
						</select>

					</td>
				</tr>	
				<tr>
					<td>Sendika</td>
					<td><input type="checkbox" id="sendikadrm" name="sendikadrm"></td>
				</tr>					
				<tr>
					<td></td>
					<td><input class="form-control" onclick="kayitYap()" type="submit" value="Kaydet"></td>
				</tr>
			</table>
		</form>
		</div>

	</div>
	<div class="col-md-2">
		
	</div>
</div>

</body>
</html>
