<?php
class DBPodnosilac extends Tabela 
{
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
public $JMBG;
public $Prezime;
public $Ime;
public $SifraPasosa;
public $NazivFajlaFotografije;

// METODE

// konstruktor

public function DajKolekcijuSvihPodnosilaca()
{
$SQL = "select * from `podnosilac` ORDER BY prezime ASC";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
return $this->Kolekcija; // uzima iz baznek klase vrednost atributa
}

public function UcitajPodnosilacaPoJMBG($JMBGParametar)
{
$SQL = "select * from `podnosilac` where `JMBG`='".$JMBGParametar."'";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
// raspolazemo sa:
// $Kolekcija;
//  $BrojZapisa;
}

public function DodajNovogPodnosilaca()
{
	$SQL = "INSERT INTO `podnosilac` (JMBG, Prezime, Ime, SifraPasosa, NazivFajlaFotografije) VALUES ('$this->JMBG','$this->Prezime', '$this->Ime', '$this->SifraPasosa', '$this->NazivFajlaFotografije')";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}



public function ObrisiPodnosilaca($IdZaBrisanje)
{
	$SQL = "DELETE FROM `podnosilac` WHERE JMBG='".$IdZaBrisanje."'";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}

// TO DO

public function IzmeniPodnosilaca($StariJMBG, $JMBG, $prezime, $ime, $SifraPasosa, $nazivFajlaFotografije)
{
	$SQL = "UPDATE `podnosilac` SET JMBG='".$JMBG."', Prezime='".$prezime."', Ime='".$ime."', SifraPasosa='".$SifraPasosa."', NazivFajlaFotografije='".$nazivFajlaFotografije."' WHERE JMBG='".$StariJMBG."'";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}

// ostale metode 




}
?>