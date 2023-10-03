 <?php
        
		session_start();  
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   $korisnik=$_SESSION["korisnik"];
      
	  // ako nije prijavljen korisnik, vraca ga na pocetnu stranicu
				if (!isset($korisnik))
				{
					header ('Location:index.php');
				}	
	   

	      // -------------------------------------
		// UPLOAD FAJLA SLIKE

		if (isset($_FILES["nazivFajlaFotografije"]["name"]))
		{
			$name = $_FILES["nazivFajlaFotografije"]["name"];
			//$size = $_FILES['nazivFajlaFotografije']['size']
			//$type = $_FILES['nazivFajlaFotografije']['type']
			$tmp_name = $_FILES['nazivFajlaFotografije']['tmp_name'];
			$error = $_FILES['nazivFajlaFotografije']['error'];
	
			if (isset ($name)) {
				if (!empty($name)) {
							$location = 'SlikePodnosioca/';
							if  (move_uploaded_file($tmp_name, $location.$name)){
										//echo 'Uploaded';    
							}
						} else {
								//echo 'please choose a file';
								}
						} 
			$nazivFajlaFotografije=$name;
		}
		else // ako nije nista promenjeno
		{
			$StariNazivFajlaFotografije=$_POST['StariNazivFajlaFotografije'];
			$nazivFajlaFotografije=$StariNazivFajlaFotografije;
		}

	   // preuzimanje vrednosti sa forme
	   $JMBG=$_POST['JMBG'];
	   $StariJMBG=$_POST['StariJMBG'];
	   $prezime=$_POST['prezime'];
	   $ime=$_POST['ime'];

	   if (isset($_POST['sifraPasosa']))
	   {
		$sifraPasosa=$_POST['sifraPasosa'];
	   }
	   else // ako nije nista promenjeno
	   {
		$StaraSifraPasosa=$_POST['StaraSifraPasosa'];
		$sifraPasosa=$StaraSifraPasosa;
	   }
	  
	   // koristimo klasu za poziv procedure za konekciju
		require "klase/BaznaKonekcija.php";
		require "klase/BaznaTabela.php";
		$KonekcijaObject = new Konekcija('klase/BaznaParametriKonekcije.xml');
		$KonekcijaObject->connect();
		if ($KonekcijaObject->konekcijaDB) // uspesno realizovana konekcija ka DBMS i bazi podataka
		{	
			require "klase/DBPodnosilac.php";
			$PodnosilacObject = new DBPodnosilac($KonekcijaObject, 'podnosilac');
			$greska=$PodnosilacObject->IzmeniPodnosilaca($StariJMBG, $JMBG, $prezime, $ime, $sifraPasosa, $nazivFajlaFotografije);
		}
		else
		{
			echo "Nije uspostavljena konekcija ka bazi podataka!";
		}
		
    $KonekcijaObject->disconnect();
	   
	// prikaz uspeha aktivnosti	
	//echo "Ukupno procesirano $retval zapisa";
	//echo "Greska $greska";	

	header ('Location:PodnosiociLista.php');	
		
	  
      ?>

