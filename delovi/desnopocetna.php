
<meta charset="UTF-8">
<!--==================================== SADRZAJ STRANICE DESNO pocinje ovde ------------------------------>
<img src="images/sredinagore.jpg" width="100%" height="3" alt="" class="flt1 rp_topcornn" /> 

<table style="width:100%;style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0"  bgcolor="#D8E7F4">

<tr>
<td style="width:5%;">
</td>

<td>
<font face="Trebuchet MS" color="darkblue" size="4px">
<b>СПИСАК ПОДНОСИОЦА</br> </font>
<form action="" method="GET">
ЈМБГ: <input type="text" name="filter" />
<input type="submit" name="filtriraj" value="FILTRIRAJ" />
<input type="submit" name="svi" value="SVI" />

</form>


</td>

<td style="width:5%;">
</td>
</tr>


<tr>
<td style="width:5%;">
</td>

<td align="left">
<br/>
<font face="Trebuchet MS" color="darkblue" size="4px">

<?php
// PRETHODNI KOD PREUZIMA PODATKE I TO JE NA INDEX.PHP

if ($PodnosilacViewObject->BrojZapisa==0)
	{
		echo "НЕМА ЗАПИСА У ТАБЕЛИ!";
	}
else
	{
	echo "УКУПАН БРОЈ ЗАПИСА:".$PodnosilacViewObject->BrojZapisa;
		// ------------ zaglavlje ----------------
		echo "<table style=\"width:90%; padding:0\" align=\"center\" cellspacing=\"0\" cellpadding=\"0\" border=\"1\"  bgcolor=\"#D8E7F4\">";
		echo "<tr>";
		echo "<td style=\"width:10%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ФОТОГРАФИЈА</font><br/>";
		echo "</td>";
		echo "<td style=\"width:10%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ЈМБГ</font><br/>";
		echo "</td>";
		echo "<td style=\"width:20%;\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ПРЕЗИМЕ</font><br/>";
		echo "</td>";
		echo "<td style=\"width:20%;\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ИМЕ</font><br/>";
		echo "</td>";
		echo "<td style=\"width:50%;\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">СТАТУС ПАСОША</font><br/>";
		echo "</td>";
		echo "</tr>";

		for ($RBZapisa = 0; $RBZapisa < $PodnosilacViewObject->BrojZapisa; $RBZapisa++) 
		{
							
		// CITANJE VREDNOSTI IZ MEMORIJSKE KOLEKCIJE $RESULT I DODELJIVANJE PROMENLJIVIM
		$JMBG=$PodnosilacViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($PodnosilacViewObject->Kolekcija, $RBZapisa, 0);//mysql_result($result,$row,"REGISTARSKIBROJ");
		$Prezime=$PodnosilacViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($PodnosilacViewObject->Kolekcija, $RBZapisa, 1);
		$Ime=$PodnosilacViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($PodnosilacViewObject->Kolekcija, $RBZapisa, 2);
		$StatusPasos=$PodnosilacViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($PodnosilacViewObject->Kolekcija, $RBZapisa, 3);
		$NazivFajlaFotografije=$PodnosilacViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($PodnosilacViewObject->Kolekcija, $RBZapisa, 4);

		// CRTANJE REDA TABELE SA PODACIMA
		echo "<tr>";
		echo "<td>";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$NazivFajlaFotografije</font><br/>";
		$putanjaSlike ="'SlikeStudenata/".$NazivFajlaFotografije."'";
		echo "<img width='50%' src=".$putanjaSlike.">";
		echo "</td>";
		echo "<td>";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$JMBG</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$Prezime</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$Ime</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$StatusPasosa</font><br/>";
		echo "</td>";
		echo "</tr>";

		}  //za for 
		echo "</table>";
		echo "<br/>";
		echo "<br/>";
	}
$KonekcijaObject->disconnect();

?>



</td>

<td style="width:5%;">
</td>

</tr>
</table>

    