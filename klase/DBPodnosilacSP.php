<?php
class DBPodnosilac extends Tabela 
// rad sa stored procedurom za snimanje novog studenta
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

public function DodajNovogPodnosilaca()
{
	//$SQL = "INSERT INTO `student` (BrojIndeksa, Prezime, Ime, OznakaSmera, NazivFajlaFotografije) VALUES ('$this->BrojIndeksa','$this->Prezime', '$this->Ime', '$this->OznakaSmera', '$this->NazivFajlaFotografije')";
	//$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	
		$GreskarezultatPar1 = $this->IzvrsiAktivanSQLUpit ("SET @JMBGParametar='".$this->JMBG."'");
		
		$GreskarezultatPar2 = $this->IzvrsiAktivanSQLUpit ("SET @PrezimeParametar='".$this->Prezime."'");
		
		$GreskarezultatPar3 =  $this->IzvrsiAktivanSQLUpit ("SET @ImeParametar='".$this->Ime."'");
		
		$GreskarezultatPar4 = $this->IzvrsiAktivanSQLUpit (  "SET @SifraPasosaParametar='".$this->SifraPasosa."'");
		
		$GreskarezultatPar5 = $this->IzvrsiAktivanSQLUpit (  "SET @NazivFajlaFotografijeParametar='".$this->NazivFajlaFotografije."'");
		
		$GreskarezultatCall = $this->IzvrsiAktivanSQLUpit ( "CALL `DodajPodnosilaca`(@JMBGParametar,@PrezimeParametar,@ImeParametar,@SifraPasosaParametar,@NazivFajlaFotografijeParametar);");
		
	
	$greska=$GreskarezultatPar1.$GreskarezultatPar2.$GreskarezultatPar3.$GreskarezultatPar4.$GreskarezultatPar5.$GreskarezultatCall;
	return $greska;
}


}
?>