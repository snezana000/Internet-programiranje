<?php
session_start();

$JMBGZaStampu=$_POST['JMBGFilter'];

// KONEKTOVANJE NA BAZU
	require "klase/BaznaKonekcija.php";
	$KonekcijaObject = new Konekcija("klase/BaznaParametriKonekcije.xml");
	$KonekcijaObject->connect();
	
	// PREUZIMANJE STARIH VREDNOSTI ZA IZABRANOG STUDENTA
	require "klase/BaznaTabela.php";
	require "klase/DBPodnosilacV.php";
	$PodnosilacObject = new DBPodnosilac($KonekcijaObject, 'podnosilac');
	$PodnosilacObject->DajSvePodatkeOPodnosilacima($JMBGZaStampu);
	$KolekcijaZapisaPodnosilaca= $PodnosilacObject->Kolekcija;
	$UkupanBrojZapisaPodnosilaca = $PodnosilacObject->BrojZapisa;
	
	if ($UkupanBrojZapisaPodnosilaca>0) 
	{
		$row=0;  // prvi i jedini red ima taj id
		$JMBG=$PodnosilacObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaPodnosilaca, $row, 0);//mysql_result($result,$row,"REGISTARSKIBROJ");
		$Prezime=$PodnosilacObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaPodnosilaca, $row, 1);
		$Ime=$PodnosilacObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaPodnosilaca, $row, 2);
		$StatusPasos=$PodnosilacObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaPodnosilaca, $row, 3);
		$NazivFajlaFotografije=$PodnosilacObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaPodnosilaca, $row, 4);
	}         

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="sr-RS" xml:lang="sr-RS">
<meta charset="UTF-8">
<head>
<title>Иѕдавање пасоша</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
</head>
<body>

<!-----VELIKA TABELA KOJA SADRZI SVE---->
<!-----10% SADRZAJ 10%---->
<table class="no-spacing" style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0" style="border-spacing: 0;">

<!-------------------------- ZAGLAVLJE ------->
<?php include 'delovi/zaglavljestampa.php';?>


<!-------------------------- DONJI DEO  ------->
<tr style="padding:0px;">

<!-----LEVO PRAZNINA---->
<td style="width:10%;">
</td>

<!------------------------------------------------------------------------------------------->
<!---------------------- SREDINA DONJEG DELA SA SADRZAJEM pocinje ovde ---------------------->
<td align="center" valign="middle" style="width:80%; padding:0" > 

<table style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">

<tr>
<td style="width:1%;">
</td>

<td style="width:80%;padding:0" cellspacing="0" cellpadding="0" border="0" valign="top">
<!------- GLAVNI SADRZAJ desno ----------->  
<?php include 'delovi/desnostampaopodnosiocu.php';?>
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
<?php include 'delovi/footerstampa.php';?>

</table>

</body>
</html>