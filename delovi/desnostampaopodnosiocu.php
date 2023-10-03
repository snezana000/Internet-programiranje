
<meta charset="UTF-8">
<!--==================================== SADRZAJ STRANICE DESNO pocinje ovde ------------------------------>
<img src="images/sredinagore.jpg" width="100%" height="3" alt="" class="flt1 rp_topcornn" /> 

<table style="width:100%;style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0"  bgcolor="#D8E7F4">

<tr>
<td style="width:5%;">
</td>

<td>
<font face="Trebuchet MS" color="darkblue" size="4px">
<b>ПОДАЦИ О ПОДНОСИОЦУ</br> </font>


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
				
				$URLSlike='SlikePodnosioca/'.$NazivFajlaFotografije;

				// PRIKAZ SLIKE
				echo "<img src=\"".$URLSlike."\" width=\"230\" height=\"150\"/><br/>";
				
				// CRTANJE REDA TABELE SA PODACIMA

				echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">ЈМБГ: $JMBG</font><br/>";
				echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">Презиме: $Prezime</font><br/>";
				echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">Име: $Ime</font><br/>";
				echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">Статус пасоша: $StatusPasosa</font><br/>";

?>



</td>

<td style="width:5%;">
</td>

</tr>
</table>

    