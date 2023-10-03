<?php
class DBAdmin extends Tabela{

// ATRIBUTI
public $IDAdmina; // auto increment u bazi podataka
public $Prezime;
public $Ime;
public $Email;
public $KorisnickoIme;
public $Sifra;
public $Stari_IDAdmina; // potrebno zbog izmene

// metode

// ------- konstruktor - uzima se iz klase roditelja - Tabela

// ------- preostale metode

public function UcitajSveAdmine()
{
		$SQL = "select * from admin";
		$this->UcitajSvePoUpitu($SQL);
} // kraj metode

public function DaLiPostojiAdmin($loginusername,$loginpassword)
{
	$postoji="";
	$SQLAdmin = "SELECT * FROM `".$this->OtvorenaKonekcija->KompletanNazivBazePodataka."`.`admin` WHERE KORISNICKOIME='".$loginusername."' AND SIFRA='".$loginpassword."'";
    $this->UcitajSvePoUpitu($SQLAdmin);
	// raspolazemo sa kolekcijom i brojem zapisa nakon ucitaj sve po upitu
	
	// NEPOTREBNO - $this->PrebaciKolekcijuUListu($this->Kolekcija);
	if ($this->BrojZapisa>0)
	{
		$postoji="DA";
	}  			
	else 
	{
		$postoji="NE";
	}
	return $postoji;
}

public function DajImePrijavljenogAdmina($loginusername,$loginpassword)
{
	$admin="";
	$SQLAdmin = "SELECT * FROM `".$this->OtvorenaKonekcija->KompletanNazivBazePodataka."`.`ADMIN` WHERE KORISNICKOIME='".$loginusername."' AND SIFRA='".$loginpassword."'";
    $this->UcitajSvePoUpitu($SQLAdmin);
	$this->PrebaciKolekcijuUListu($this->Kolekcija);
	if ($this->BrojZapisa>0)
	{
		// postoji zapis
		foreach ($this->ListaZapisa as $VrednostCvoraListe)
		{
			$ime=$VrednostCvoraListe[2];
			
		}
	}  			
	else 
	{
		$ime='NEPOZNAT KORISNIK';
	}
	return $ime;
}

public function DajPrezimePrijavljenogAdmina($loginusername,$loginpassword)
{
	$admin="";
	$SQLAdmin = "SELECT * FROM `".$this->OtvorenaKonekcija->KompletanNazivBazePodataka."`.`ADMIN` WHERE KORISNICKOIME='".$loginusername."' AND SIFRA='".$loginpassword."'";
    $this->UcitajSvePoUpitu($SQLAdmin);
	$this->PrebaciKolekcijuUListu($this->Kolekcija);
	if ($this->BrojZapisa>0)
	{
		// postoji zapis
		foreach ($this->ListaZapisa as $VrednostCvoraListe)
		{
			$prez=$VrednostCvoraListe[1];
			
		}
	}  			
	else 
	{
		$prez='NEPOZNAT ADMIN';
	}
	return $prez;
}

public function DajImePrezimePrijavljenogAdmina($loginusername,$loginpassword)
{
	$admin="";
	$SQLAdmin = "SELECT * FROM `".$this->OtvorenaKonekcija->KompletanNazivBazePodataka."`.`ADMIN` WHERE KORISNICKOIME='".$loginusername."' AND SIFRA='".$loginpassword."'";
    $this->UcitajSvePoUpitu($SQLAdmin);
	$this->PrebaciKolekcijuUListu($this->Kolekcija);
	if ($this->BrojZapisa>0)
	{
		// postoji zapis
		foreach ($this->ListaZapisa as $VrednostCvoraListe)
		{
			$prez=$VrednostCvoraListe[1];
			$ime=$VrednostCvoraListe[2];
			$admin=$prez.' '.$ime;
		}
	}  			
	else 
	{
		$admin='NEPOZNAT ADMIN';
	}
	return $admin;
}

public function DajIDPrijavljenogAdmina($loginusername,$loginpassword)
{
	$id=0;
	$SQLAdmin = "SELECT * FROM `".$this->OtvorenaKonekcija->KompletanNazivBazePodataka."`.`ADMIN` WHERE KORISNICKOIME='".$loginusername."' AND SIFRA='".$loginpassword."'";
    $this->UcitajSvePoUpitu($SQLAdmin);
	$this->PrebaciKolekcijuUListu($this->Kolekcija);
	if ($this->BrojZapisa>0)
	{
		// postoji zapis
		foreach ($this->ListaZapisa as $VrednostCvoraListe)
		{
			$id=$VrednostCvoraListe[0];
		}
	} 
	// else - ostaje 0

	return $id;
}


public function SnimiNovo()
{
	$AktivanSQLUpit = "";
	$this->IzvrsiAktivanSQLUpit($AktivanSQLUpit);
}

// brisanje 
public function Obrisi()
{
	$AktivanSQLUpit = "DELETE from ";
	$this->IzvrsiAktivanSQLUpit($AktivanSQLUpit);
}

public function ObrisiSve()
{
	$AktivanSQLUpit = "DELETE from ";
	$this->IzvrsiAktivanSQLUpit($AktivanSQLUpit);
}

public function IzmeniVrednostPolja()
{	

	// transformisemo datum u formu pogodnu za insert into 
    //	$DatumskaVrednost=date_create($this->Datum_PoslednjePromene);
    //	$DatumUnosa=date_format($DatumskaVrednost,"Y-m-d");  

	// konacan upit
	$AktivanSQLUpit = "UPDATE  SET " ;
	$this->IzvrsiAktivanSQLUpit($AktivanSQLUpit);
} // kraj metode
} // kraj klase
?>