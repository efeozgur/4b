<?php 
	$brut = 1647;
	$yillikbrut = 1647*12;

	function asgiHesapla ($tcocuksayisi, $esdurumu) {
		$yedibucuk = $tcocuksayisi - 2;
		$besi = $tcocuksayisi - $yedibucuk;
		$kendipuan = 50;

		if ($tcocuksayisi>1) {
			$cocukpuan = ($besi*7.5)+($yedibucuk*5);
		} else if ($tcocuksayisi==1) {
			$cocukpuan=7.5;	
		} else if ($tcocuksayisi <=0) {
			$cocukpuan=0;
		}

		if ($esdurumu == 0) {
			$espuan = 10;
		} else if ($esdurumu == 1) {
			$espuan = 0; 
		}

		return $kendipuan + $cocukpuan + $espuan; 
	}


	$sonuc = asgiHesapla(2,1);
	$asgiEsasTutar = ($sonuc*$yillikbrut)/100;
	$indirimtutar = round($asgiEsasTutar*15/100/12,2);


	//echo $asgiEsasTutar;	



	/*$kendi = $yillikbrut * 50/100;
	$es = $yillikbrut * 10/100;

	$bes = $besi*5/100;

	echo $cocukpuan+$kendipuan;*/


 ?>