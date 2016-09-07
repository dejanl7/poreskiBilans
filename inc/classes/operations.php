<?php 

class Operations extends Connection {

/*============================================
	 Insert Records Into Database
==============================================*/	
	public function insert_tax_info(){
		$sql = "INSERT INTO podaci (naziv_firme, sediste, pib, vrsta_obveznika, period_od, period_do, godina, dobit_poslovne_godine, dobit_koncesije, gubitak_poslovne_godine, dobici_imovina, gubici_imovina, nedokumentovani_troskovi, ivos_potrazivanja, pokloni_organizacijama) VALUES ('". $this->clear_input($this->naziv_firme)."','". $this->clear_input($this->sediste) ."','". $this->clear_input($this->pib) ."','" . $this->clear_input($this->vrsta_obveznika) ."','". $this->clear_input($this->period_od) ."','". $this->clear_input($this->period_do) ."','". $this->clear_input($this->godina) ."','". $this->clear_input($this->dobit_poslovne_godine)."','". $this->clear_input($this->dobit_koncesije)."','". $this->clear_input($this->gubitak_poslovne_godine)."','".  $this->clear_input($this->dobici_imovina)."','".  $this->clear_input($this->gubici_imovina)."','". $this->clear_input($this->nedokumentovani_troskovi)."','". $this->clear_input($this->ivos_potrazivanja)."','".$this->clear_input($this->pokloni_organizacijama)."')";	

		if( $this->select_table($sql) ){
			//$this->id = $this->insert_id();
			return true;
		} 
			else {
				return false;
			}
		$sql .= $this->insert_id();		
	}



/*============================================
	Push all columns name into array
==============================================*/
	public function fields_array($start, $end){
		$query = "SELECT * FROM podaci";
		$sql = mysqli_query($this->db_connection, $query);

		$column_names = array();
		
		$i = 0;
		while( $result=mysqli_fetch_field($sql) ){
			if( $i >= $start && $i <= $end ){
				$column_names[] = $result->name;
			}
				$i++;
		}

		return $column_names;
	}


/*============================================
	Delete "." before Update Information
==============================================*/
	public function clear_separator($separator){
		$result = str_replace('.', '', $separator);
		return $result;
	}



/*============================================
	Update Information
==============================================*/
	public function update( $array_values=array(), $start, $end ){
		$count_array = sizeof($array_values);

		$query = "UPDATE podaci SET ";
		foreach($this->fields_array($start, $end) as $key => $field){
			if( $key < $count_array - 1 ){
				$query .= $field."="."'{$this->clear_input($array_values[$key])}',"; 
			}
			else {
				$query .= $field."='{$this->clear_input($array_values[$key])}'";
			}
		}
		$query .= " WHERE naziv_firme = '{$this->clear_input($_SESSION['user'])}'";

		$this->select_table($query);

	}


/*============================================ 
	Find User By Id
==============================================*/
	public function find_this_user($name){
		global $connection;

		$clean_name = $connection->clear_input($name);
		$query = "SELECT * FROM podaci WHERE naziv_firme='{$clean_name}'";
		$result = $connection->select_table($query);

		$users_info = array();
		while( $row = mysqli_fetch_object($result) ){
			$users_info = $row;
		}

		return $users_info;
		
	}



/*============================================
 Checked Specific Checkbox Field
==============================================*/
	public static function check_box($name, $type){
		return ($name == $type ? 'checked' : '' );
	}


/*============================================
 	Count "Опорезива добит"
==============================================*/
	public function oporeziva_dobit(){
		$fetch = $this->find_this_user( $this->clear_input($_SESSION['user']) );
		$result = $fetch->dobit_poslovne_godine - $fetch->dobit_koncesije - $fetch->dobici_imovina+ $fetch->gubici_imovina + $fetch->nedokumentovani_troskovi + $fetch->ivos_potrazivanja + $fetch->pokloni_organizacijama + $fetch->pokloni_p_l + $fetch->kamate
			+ $fetch->prinudna_naplata + $fetch->novcane_kazne + $fetch->zatezne_kamate + $fetch->neposlovni_troskovi + $fetch->troskovi_materijala + $fetch->obracuante_otpremnine - $fetch->isplacene_otpremnine + $fetch->amortizacija - $fetch->poreska_amortizacija + $fetch->nauka_zdravstvo + $fetch->izdaci_kultura + $fetch->clanarine + $fetch->reklame + $fetch->reprezentacija + $fetch->ivos_manje + $fetch->nerezidentno_lice + $fetch->neplaceni_porezi - $fetch->placeni_porezi + $fetch->veci_ivos + $fetch->ivos_osiguranje + $fetch->nepriznata_dug_rez - $fetch->iskoriscena_dug_rez +
			$fetch->rashodi_obezvredjenje - $fetch->rashodi_obezvredjenje1 + $fetch->tax + $fetch->porez_dividende + $fetch->porez_po_odbitku + $fetch->ivos_pojedinacna - $fetch->prihodi_ivos - $fetch->prihodi_dividende - $fetch->prihodi_kamate - $fetch->neiskoriscena_dug_rez - $fetch->prihodi_rashodi + $fetch->zbir_korekcija + $fetch->kamata_zajam;	
			
		return $result;
	}


/*============================================
 	Count "Губитак"
==============================================*/
	public function gubitak(){
		$fetch = $this->find_this_user( $this->clear_input($_SESSION['user']) );
		$result = $fetch->gubitak_poslovne_godine + $fetch->dobici_imovina - $fetch->gubici_imovina - $fetch->nedokumentovani_troskovi - $fetch->ivos_potrazivanja - $fetch->pokloni_organizacijama - $fetch->pokloni_p_l - $fetch->kamate- $fetch->prinudna_naplata - $fetch->novcane_kazne - $fetch->zatezne_kamate - $fetch->neposlovni_troskovi - $fetch->troskovi_materijala - $fetch->obracuante_otpremnine + $fetch->isplacene_otpremnine - $fetch->amortizacija + $fetch->poreska_amortizacija - $fetch->nauka_zdravstvo - $fetch->izdaci_kultura - $fetch->clanarine - $fetch->reklame - $fetch->reprezentacija - $fetch->ivos_manje - $fetch->nerezidentno_lice - $fetch->neplaceni_porezi + $fetch->placeni_porezi - $fetch->veci_ivos - $fetch->ivos_osiguranje - $fetch->nepriznata_dug_rez + $fetch->iskoriscena_dug_rez - $fetch->rashodi_obezvredjenje + $fetch->rashodi_obezvredjenje1 - $fetch->tax - $fetch->porez_dividende - $fetch->porez_po_odbitku - $fetch->ivos_pojedinacna + $fetch->prihodi_ivos + $fetch->prihodi_dividende + $fetch->prihodi_kamate + $fetch->neiskoriscena_dug_rez + $fetch->prihodi_rashodi - $fetch->zbir_korekcija - $fetch->kamata_zajam;	
			
		return $result > 0 ? $result : 0;
	}


/*============================================
 	Count "Остатак опорезиве добити"
==============================================*/
	public function ostatak_op_d(){
		$fetch = $this->find_this_user( $this->clear_input($_SESSION['user']) );
		$result = $this->oporeziva_dobit() - $fetch->prethodni_gubitak;

		return $result > 0 ? $result : 0;

	}


/*============================================
 	Count "Капитални добици"
==============================================*/
	public function kapitalni_dobici(){
		$fetch = $this->find_this_user( $this->clear_input($_SESSION['user']) );
		$result = $fetch->kd_tg - $fetch->kg_tg;

		return $result > 0 ? $result : 0;
	}


/*============================================
 	Count "Капитални губици"
==============================================*/
	public function kapitalni_gubici(){
		$fetch = $this->find_this_user( $this->clear_input($_SESSION['user']) );
		$result = $fetch->kd_tg - $fetch->kg_tg;

		return $result < 0 ? abs($result) : 0;
	}


/*============================================
	Count "Остатак капиталног добитка""
==============================================*/
	public function ostatak_kapitalnog_dobitka(){
		$fetch = $this->find_this_user( $this->clear_input($_SESSION['user']) );
		$result = $this->kapitalni_dobici() - $fetch->preneti_kapitalni_gubici;

		return $result > 0 ? $result : 0;
	}


/*============================================
	Count "Пореска основица""
==============================================*/
	public function poreska_osnovica(){
		$fetch = $this->find_this_user( $this->clear_input($_SESSION['user']) );
		$result = $this->ostatak_op_d() - $this->ostatak_kapitalnog_dobitka();

		return $result > 0 ? $result : 0;
	}








}

?>