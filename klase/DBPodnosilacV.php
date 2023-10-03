<?php
class DBPodnosilac extends Tabela 
// rad sa pogledom
{

// METODE

// konstruktor

public function DajSvePodatkeOPodnosilacima($filterParametar)
{
	if (isset($filterParametar))
	{
		// nad pogledom se moze dodati filter, jer se pogled koristi kao da je tabela
		$upit="select * from `".$this->NazivBazePodataka."`.`SviPodacioPodnosiocimaSaSlikom` where `JMBG`='".$filterParametar."'";
	}
	else
	{
		$upit="select * from `".$this->NazivBazePodataka."`.`SviPodacioPodnosiocimaSaSlikom`";
	}
	$this->UcitajSvePoUpitu($upit);
	// sada raspolazemo sa:
	//$this->Kolekcija 
	//$this->BrojZapisa
}


}
?>