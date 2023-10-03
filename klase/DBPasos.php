<?php
class DBPasos extends Tabela 
{
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
public $Sifra;
public $Status; 
public $UkupanBrojPodnosioca;

// METODE

// konstruktor

public function UcitajKolekcijuSvihPasosa()
{
$SQL = "select * from `Pasos` ORDER BY Status ASC";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
//return $this->Kolekcija; // uzima iz baznek klase vrednost atributa
}

public function InkrementirajBrojPodnosioca($IDPasos)
{
	// izdvajanje stare vrednosti broja vozila za taj tip
	//$SQL = "select UkupanBrojStudenata from `".$this->bazapodataka."`.`smer` WHERE Oznaka=".$IDSmer;
	$KriterijumFiltriranja="Sifra='".$IDPasos."'";
	$StaraVrednostUkBrPodnosioca=$this->DajVrednostJednogPoljaPrvogZapisa ('UkupanBrojPodnosioca', $KriterijumFiltriranja, 'UkupanBrojPodnosioca'); 
	
	// izracunavanje nove vrednosti
	$NovaVrednostUkBrPodnosioca=$StaraVrednostUkBrPodnosioca + 1;
	
	// izvrsavanje izmene
    $SQL = "UPDATE `".$this->NazivBazePodataka."`.`pasos` SET UkupanBrojPodnosioca=".$NovaVrednostUkBrPodnosioca." WHERE Sifra='".$IDPasos."'";
	$greska= $this->IzvrsiAktivanSQLUpit($SQL);

	return $greska;
	
	}

}
?>