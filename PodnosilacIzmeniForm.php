<?php
// OVO JE SUSTINSKO ODJAVLJIVANJE KORISNIKA
	   session_start();
     	   
	   // citanje vrednosti iz sesije
	   $korisnik=$_SESSION["korisnik"];
      
	  // ako nije prijavljen korisnik, vraca ga na pocetnu stranicu
				if (!isset($korisnik))
				{
					header ('Location:index.php');
				}	

// REALIZACIJA CITANJA hidden polja za filter radi pristupa, cita sa StudentiLista
$StariJMBGZaIzmenu=$_POST['JMBG'];

// KONEKTOVANJE NA BAZU
	require "klase/BaznaKonekcija.php";
	$KonekcijaObject = new Konekcija("klase/BaznaParametriKonekcije.xml");
	$KonekcijaObject->connect();
	$db_handle = $KonekcijaObject->konekcijaMYSQL;
	$bazapodataka=$KonekcijaObject->KompletanNazivBazePodataka;
	$UspehKonekcijeNaBazu=$KonekcijaObject->konekcijaDB;
	
	require "klase/BaznaTabela.php";
	
	// IZDVAJANJE PODATAKA KORISTECI KLASU SMER
	require "klase/DBPasos.php";
	$PasosObject = new DBPasos($KonekcijaObject, "pasos");
	$PasosObject->UcitajKolekcijuSvihPasosa();
	$KolekcijaZapisa= $PasosObject->Kolekcija;
	$UkupanBrojZapisa= $PasosObject->BrojZapisa;

	// PREUZIMANJE STARIH VREDNOSTI ZA IZABRANOG STUDENTA
	require "klase/DBPodnosilac.php";
	$PodnosilacObject = new DBPodnosilac($KonekcijaObject, 'podnosilac');
	$PodnosilacObject->UcitajPodnosilacaPoJMBG($StariJMBGZaIzmenu);
	$KolekcijaZapisaPodnosilaca= $PodnosilacObject->Kolekcija;
	$UkupanBrojZapisaPodnosilaca = $PodnosilacObject->BrojZapisa;
	
	if ($UkupanBrojZapisaPodnosilaca>0) 
	{
		$row=0;  // prvi i jedini red ima taj id
		$StariJMBG=$PodnosilacObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaPodnosilaca, $row, 0);//mysql_result($result,$row,"REGISTARSKIBROJ");
		$StaroPrezime=$PodnosilacObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaPodnosilaca, $row, 1);
		$StaroIme=$PodnosilacObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaPodnosilaca, $row, 2);
		$StaraSifraPasosa=$PodnosilacObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaPodnosilaca, $row, 3);
		$StariNazivFajlaFotografije=$PodnosilacObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaPodnosilacaa, $row, 4);
	}         

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="sr-RS" xml:lang="sr-RS">
<meta charset="UTF-8">
<head>
<title>Издавање пасоша</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
<script src="JavaScript/provera.js"> </script>
</head>
<body>

<!-----VELIKA TABELA KOJA SADRZI SVE---->
<!-----10% SADRZAJ 10%---->
<table class="no-spacing" style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0" style="border-spacing: 0;">

<!-------------------------- ZAGLAVLJE ------->
<?php include 'delovi/zaglavljewelcome.php';?>


<!-------------------------- DONJI DEO  ------->
<tr style="padding:0px;">

<!-----LEVO PRAZNINA---->
<td style="width:10%;">
</td>

<!------------------------------------------------------------------------------------------->
<!---------------------- SREDINA DONJEG DELA SA SADRZAJEM pocinje ovde ---------------------->
<td align="center" valign="middle" style="width:80%; padding:0" > 

<table style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#003366">

<tr>
<td style="width:1%;">
</td>

<td style="width:15%;padding:0" cellspacing="0" cellpadding="0" border="0" valign="top">
<?php include 'delovi/menilevoadmin.php';?>
</td>

<td style="width:1%;">
</td>

<td style="width:80%;padding:0" cellspacing="0" cellpadding="0" border="0" valign="top">
<!------- GLAVNI SADRZAJ desno ----------->  
<?php include 'delovi/desnoPodnosilacIzmeniForm.php';?>
</td>

<td style="width:1%;">
</td>

</tr>
</table>

</td>
<!---------------------- SADRZAJ zavrsava ovde ---------------------->

<!-----DESNO PRAZNINA---->
<td style="width:10%;">
</td>

</tr>
<!---------------------- DONJI DEO zavrsava ovde ---------------------->


<tr style="padding:0px;">
<td style="width:10%;"></td>
<td align="center" valign="middle"></td>
<td style="width:10%;"></td>
</tr>
<!--- DONJI DEO sa donjom ivicom zavrsava ovde  ------->
<!-- footer panel starts here -->
<?php include 'delovi/footer.php';?>

</table>

</body>
</html>