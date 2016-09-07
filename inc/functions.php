<?php 

include('init.php');
	
/*==============================================
	Insert Basic info about user (Name, 
	Headquarter and PIB - personal number)	
================================================*/
	if( isset($_POST['company_submit_index']) ){
		if( !empty($_POST['company_name_index']) || !empty($_POST['company_headquarter_index']) || !empty($_POST['company_pib_index']) ){
			$insert = new Operations();
			$insert->naziv_firme = $insert->clear_input($_POST['company_name_index']);
			$insert->sediste 	 = $insert->clear_input($_POST['company_headquarter_index']);
			$insert->pib 		 = $insert->clear_input($_POST['company_pib_index']);
			$insert->insert_tax_info();

			$session->activate_session($_POST['company_name_index']);

			header('Location: ../tabs.php');
		}
	}

/*==============================================
	Update Information into Tax Bilans
================================================*/	
	if( isset($_POST['dataSerialize']) ){
		$serialized_values = parse_str($_POST['dataSerialize'], $value);		

		$update = new Operations();
			//$update->naziv_firme 				= $update->clear_input($value['name']); // This value is session key
			$update->sediste 	 				= $update->clear_input($value['city']);
			$update->pib 		 				= $update->clear_input($value['pib']);
			$update->vrsta_obveznika 			= $update->clear_input($value['type']);
			$update->period_od 					= $update->clear_input($value['date-from']);
			$update->period_do					= $update->clear_input($value['date-end']);
			$update->godina 					= $update->clear_input($value['year']);
			$update->dobit_poslovne_godine 		= $update->clear_separator( $update->clear_input($value['dobit_poslovne_godine']) );
			$update->dobit_koncesije 			= $update->clear_separator( $update->clear_input($value['dobit_koncesija']) );
			$update->gubitak_poslovne_godine	= $update->clear_separator( $update->clear_input($value['gubitak_poslovne_godine']) );
			$update->dobici_imovina				= $update->clear_separator( $update->clear_input($value['dobici_imovina']) );
			$update->gubici_imovina				= $update->clear_separator( $update->clear_input($value['gubici_imovina']) );
			$update->nedokumentovani_troskovi	= $update->clear_separator( $update->clear_input($value['nedokumentovani_tr']) );
			$update->ivos_potrazivanja			= $update->clear_separator( $update->clear_input($value['ispravka_vr']) );
			$update->pokloni_organizacijama		= $update->clear_separator( $update->clear_input($value['pokloni_politicari']) );
			$update->pokloni_p_l 				= $update->clear_separator( $update->clear_input($value['pokloni_povezanaLica']) );
			$update->kamate 					= $update->clear_separator( $update->clear_input($value['kamate_javne_dazbine']) );
			$update->prinudna_naplata 			= $update->clear_separator( $update->clear_input($value['prekrsaji']) );
			$update->novcane_kazne 				= $update->clear_separator( $update->clear_input($value['penali']) );
			$update->zatezne_kamate 			= $update->clear_separator( $update->clear_input($value['zatezne_kamate']) );
			$update->neposlovni_troskovi 		= $update->clear_separator( $update->clear_input($value['neposlovni_troskovi']) );
			$update->troskovi_materijala 		= $update->clear_separator( $update->clear_input($value['materijal']) );
			$update->obracunate_otpremnine 		= $update->clear_separator( $update->clear_input($value['obracunate_otpremnine']) );
			$update->isplacene_otpremnine 		= $update->clear_separator( $update->clear_input($value['isplacene_otpremnine']) );
			$update->amortizacija 				= $update->clear_separator( $update->clear_input($value['amortizacija']) );			
			$update->poreska_amortizacija 		= $update->clear_separator( $update->clear_input($value['poreska_amortizacija']) );
			$update->nauka_zdravstvo 			= $update->clear_separator( $update->clear_input($value['izdaci_nauka_i_td']) );
			$update->izdaci_kultura 			= $update->clear_separator( $update->clear_input($value['izdaci_kultura']) );
			$update->clanarine 					= $update->clear_separator( $update->clear_input($value['clanarine']) );
			$update->reklame 					= $update->clear_separator( $update->clear_input($value['reklama']) );
			$update->reprezentacija 			= $update->clear_separator( $update->clear_input($value['reprezentacija']) );
			$update->ivos_manje 				= $update->clear_separator( $update->clear_input($value['ivos_manje60']) );
			$update->nerezidentno_lice 			= $update->clear_separator( $update->clear_input($value['nerezidentni_ogranak']) );
			$update->neplaceni_porezi 			= $update->clear_separator( $update->clear_input($value['neplaceni_porezi']) );
			$update->placeni_porezi 			= $update->clear_separator( $update->clear_input($value['placeni_porezi']) );
			$update->veci_ivos 					= $update->clear_separator( $update->clear_input($value['uvecanje_ivos']) );
			$update->ivos_osiguranje			= $update->clear_separator( $update->clear_input($value['ivos_osiguranje']) );
			$update->nepriznata_dug_rez			= $update->clear_separator( $update->clear_input($value['dugorocna_rezervisanja']) );
			$update->iskoriscena_dug_rez 		= $update->clear_separator( $update->clear_input($value['iskoriscena_dugorocna_rezervisanja']) );
			$update->rashodi_obezvredjenje		= $update->clear_separator( $update->clear_input($value['obezvredjenje_imovine']) );
			$update->rashodi_obezvredjenje1		= $update->clear_separator( $update->clear_input($value['priznato_obezvredjenje']) );
			$update->tax						= $update->clear_separator( $update->clear_input($value['inostrani_porez']) );
			$update->porez_dividende			= $update->clear_separator( $update->clear_input($value['dividende']) );
			$update->porez_po_odbitku			= $update->clear_separator( $update->clear_input($value['odbitak_kamate_autorskeNaknade']) );
			$update->ivos_pojedinacna			= $update->clear_separator( $update->clear_input($value['ivos_pojedinacnih_potrazivanja']) );
			$update->prihodi_ivos				= $update->clear_separator( $update->clear_input($value['otpis_ispravljena_potraz']) );
			$update->prihodi_dividende			= $update->clear_separator( $update->clear_input($value['dividenda_rezidenta']) );
			$update->prihodi_kamate				= $update->clear_separator( $update->clear_input($value['drzavne_hov']) );
			$update->neiskoriscena_dug_rez		= $update->clear_separator( $update->clear_input($value['neiskoriscena_dugRezervisanja']) );
			$update->prihodi_rashodi			= $update->clear_separator( $update->clear_input($value['prihodi_rashodi']) );
			$update->troskovi_trcena			= $update->clear_separator( $update->clear_input($value['troskovi_tc']) );
			$update->izvestaj_trcena			= $update->clear_separator( $update->clear_input($value['troskovi_tc_skraceniIzvestaj']) );
			$update->prihodi_trcena				= $update->clear_separator( $update->clear_input($value['prihodi_tc']) );
			$update->obracunati_trprihodi		= $update->clear_separator( $update->clear_input($value['prihodi_tc_skraceniIzvestaj']) );
			$update->obr_krashodi				= $update->clear_separator( $update->clear_input($value['troskovi_kamate_pl']) );
			$update->obr_krprihodi				= $update->clear_separator( $update->clear_input($value['prihodi_kamate_pl']) );
			$update->zbir_korekcija				= $update->clear_separator( $update->clear_input($value['korekcije_tc']) );
			$update->kamata_zajam 				= $update->clear_separator( $update->clear_input($value['cetvorostruka_kamata']) );
			$update->oporeziva_dobit			= $update->clear_separator( $update->clear_input($value['oporeziva_dobit']) );
			$update->gubitak 	 				= $update->clear_separator( $update->clear_input($value['gubitak']) );
			$update->prethodni_gubitak			= $update->clear_separator( $update->clear_input($value['prethodni_gubitak']) );
			$update->ostatak_oporezive_dobiti	= $update->clear_separator( $update->clear_input($value['ostatak_oporezive_dobiti']) );
			$update->kd_tg 						= $update->clear_separator( $update->clear_input($value['kd_tg']) );
			$update->kg_tg 						= $update->clear_separator( $update->clear_input($value['kg_tg']) );
			$update->kapitalni_dobici 			= $update->clear_separator( $update->clear_input($value['kapitalni_dobici']) );
			$update->kapitalni_gubici 			= $update->clear_separator( $update->clear_input($value['kapitalni_gubici']) );
			$update->preneti_kapitalni_gubici 	= $update->clear_separator( $update->clear_input($value['preneti_kapitalni_gubici']) );
			$update->ostatak_kap_dobitka 		= $update->clear_separator( $update->clear_input($value['ostatak_kap_dobitka']) );
			$update->poreska_osnovica 			= $update->clear_separator( $update->clear_input($value['poreska_osnovica']) );
			$update->u 							= $update->clear_input($value['in_city']);
			$update->dana 						= $update->clear_input($value['signature_date']);

		

		if( $_POST['page'] == 'first'){
			$update_array_first_page = array($update->sediste, $update->pib, $update->vrsta_obveznika, $update->period_od, $update->period_do, $update->godina, $update->dobit_poslovne_godine, $update->dobit_koncesije, $update->gubitak_poslovne_godine, $update->dobici_imovina, $update->gubici_imovina, $update->nedokumentovani_troskovi, $update->ivos_potrazivanja, $update->pokloni_organizacijama );
			$update->update($update_array_first_page, 2, 15);
		}
		else if( $_POST['page'] == 'second' ){
			$update_array_second_page = array( $update->pokloni_p_l, $update->kamate, $update->prinudna_naplata,  $update->novcane_kazne, $update->zatezne_kamate, $update->neposlovni_troskovi, $update->troskovi_materijala, $update->obracunate_otpremnine, $update->isplacene_otpremnine, $update->amortizacija, $update->poreska_amortizacija, $update->nauka_zdravstvo, $update->izdaci_kultura, $update->clanarine, $update->reklame, $update->reprezentacija, $update->ivos_manje, $update->nerezidentno_lice, $update->neplaceni_porezi, $update->placeni_porezi, $update->veci_ivos, $update->ivos_osiguranje );

			$update->update($update_array_second_page, 16, 37);
		}
		else if( $_POST['page'] == 'third' ){
			$update_array_third_page = array($update->nepriznata_dug_rez, $update->iskoriscena_dug_rez, $update->rashodi_obezvredjenje, $update->rashodi_obezvredjenje1, $update->tax, $update->porez_dividende, $update->porez_po_odbitku, $update->ivos_pojedinacna, $update->prihodi_ivos, $update->prihodi_dividende, $update->prihodi_kamate, $update->neiskoriscena_dug_rez, $update->prihodi_rashodi, $update->troskovi_trcena, $update->izvestaj_trcena, $update->prihodi_trcena, $update->obracunati_trprihodi, $update->obr_krashodi, $update->obr_krprihodi, $update->zbir_korekcija );

			$update->update($update_array_third_page, 38, 57);
		}

		else if( $_POST['page'] == 'fourth' ){
			$update_array_fourth_page = array( $update->kamata_zajam, $update->oporeziva_dobit, $update->gubitak, $update->prethodni_gubitak, $update->ostatak_oporezive_dobiti, $update->kd_tg, $update->kg_tg, $update->kapitalni_dobici, $update->kapitalni_gubici, $update->preneti_kapitalni_gubici, $update->ostatak_kap_dobitka, $update->poreska_osnovica, $update->u, $update->dana );

			$update->update($update_array_fourth_page, 58, 71 );
		}		

	} 

?>