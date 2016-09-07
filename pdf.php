<?php

include('inc/init.php');
require_once('fpdf/tfpdf/tfpdf.php');

if( !$session->status ){
  	header('Location: index.php');
}



class FPDF extends tFPDF { protected $_tplIdx; }
require_once('fpdf/fpdi/fpdi.php');

$pdf = new FPDI();

// Define Font Type - Use (UTF-8)
	$pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
	$pdf->AddFont('DejaVu', 'B', 'DejaVuSansCondensed-Bold.ttf', true);


// Find User and take Information
	$operations = new Operations();
	$user = $operations->find_this_user($_SESSION['user']);

/*===================================================
	First Page - Pnsert data and Print pdf
=====================================================*/
$pdf->AddPage();
	 
    $pdf->setSourceFile("fpdf/tfpdf/poreski.pdf");
    $tplIdx = $pdf->importPage(1); 
    $pdf->useTemplate($tplIdx, -1, 0, 210);
    $pdf->SetTextColor(0);
    $pdf->SetXY($pdf->lMargin, 5);
    $pdf->Ln();
			
	$pdf->SetXY(145,136);
	$pdf->SetFont('DejaVu', '', 9);
	$pdf->Cell(40, 13,"",0,2);
	$pdf->Cell(40, 6, number_format($user->dobit_poslovne_godine,2,",",".") ,0 ,2);
	$pdf->Cell(40, 7, number_format($user->dobit_koncesije,2,",","."), 0, 2);
	$pdf->Cell(40, 7, number_format($user->gubitak_poslovne_godine,2,",","."), 0, 2);
	$pdf->Cell(40, 22, number_format($user->dobici_imovina,2,",","."), 0, 2);
	$pdf->Cell(40, -7, number_format($user->gubici_imovina,2,",","."), 0 ,2);
	$pdf->Cell(40, 32, number_format( $user->nedokumentovani_troskovi,2,",","."), 0, 2);
	$pdf->Cell(40, -17, number_format($user->ivos_potrazivanja,2,",","."), 0, 2);
	$pdf->Cell(40, 30, number_format($user->pokloni_organizacijama,2,",","."), 0 , 2);
	$pdf->Cell(40, -15, number_format( $user->pokloni_p_l,2,",","."), 0, 2);
	$pdf->Cell(40, 30, number_format( $user->kamate,2,",","."), 0, 2);
	$pdf->Cell(40, -10, number_format( $user->prinudna_naplata,2,",","."), 0, 2);
	$pdf->Cell(40, 30, number_format( $user->novcane_kazne,2,",","."), 0, 2);
	$pdf->Cell(40, -18, number_format( $user->zatezne_kamate,2,",","."), 0, 2);
	$pdf->Cell(40, 30, number_format( $user->neposlovni_troskovi,2,",","."), 0, 2);

	// Company Name, Headquarter Identification Number (PIB)
	$pdf->SetXY(23, 28);
	$pdf->Cell(10, 8, $user->naziv_firme, 0, 2);
	$pdf->SetXY(23,40);
	$pdf->Cell(10, 8, $user->sediste, 0, 2);
	$pdf->SetXY(23,49);
	$pdf->Cell(10, 8, $user->pib, 0, 2);
	$pdf->SetXY(86,108);
	$pdf->SetFont('DejaVu', '', 11);
	$pdf->Cell(10, 8, $user->period_od, 0, 2);
	$pdf->SetFont('DejaVu', '', 11);
	$pdf->SetXY(112,108);
	$pdf->Cell(10, 8, $user->period_do, 0, 2);
	$pdf->SetFont('DejaVu', '', 12);
	$pdf->SetXY(133,108);
	$pdf->Cell(10, 8, $user->godina, 0, 2);

	// Company type	
	$pdf->circle_activity( $user->vrsta_obveznika, 'ad', 104.5, 38 );
	$pdf->circle_activity( $user->vrsta_obveznika, 'doo', 104, 42 );
	$pdf->circle_activity( $user->vrsta_obveznika, 'ortakluk', 104, 47 );
	$pdf->circle_activity( $user->vrsta_obveznika, 'komanditno_dr', 104, 51 );
	$pdf->circle_activity( $user->vrsta_obveznika, 'drustveno_pr', 104, 55 ); 
	$pdf->circle_activity( $user->vrsta_obveznika, 'javno_pr', 104, 59 ); 
	$pdf->circle_activity( $user->vrsta_obveznika, 'zadruga', 104, 63 ); 
	$pdf->circle_activity( $user->vrsta_obveznika, 'strano_pravno_lice', 104, 68 ); 
	$pdf->circle_activity( $user->vrsta_obveznika, 'druga_pravna_lica', 104, 72 ); 

	

/*===================================================
	Add SECOND Page
=====================================================*/
$pdf->AddPage();
    $pdf->setSourceFile("fpdf/tfpdf/poreski.pdf");
    $tplIdx = $pdf->importPage(2); 
    $pdf->useTemplate($tplIdx, -4, 0, 210);
    $pdf->SetTextColor(0);
    $pdf->SetXY($pdf->lMargin, 0);
    $pdf->Ln();
				
	$pdf->SetXY(145,30);
	$pdf->SetFont('DejaVu', '', 9);
	$pdf->Cell(40,12,"",0,2);//
	$pdf->Cell(40,8, number_format($user->troskovi_materijala,2,",","."), 0,2);//15	
	$pdf->Cell(40,12, number_format($user->obracuante_otpremnine,2,",","."),0,2);//16
	$pdf->Cell(40,8, number_format($user->isplacene_otpremnine,2,",","."),0,2);//17
	$pdf->Cell(40,12, number_format($user->amortizacija,2,",","."),0,2);//18
	$pdf->Cell(40,1, number_format($user->poreska_amortizacija,2,",","."),0,2);//19
	$pdf->Cell(40,27, number_format($user->nauka_zdravstvo,2,",","."),0,2);//20
	$pdf->Cell(40,-4, number_format($user->izdaci_kultura,2,",","."),0,2);//21
	$pdf->Cell(40,18, number_format($user->clanarine,2,",","."),0,2);//22
	$pdf->Cell(40,-5, number_format($user->reklame,2,",","."),0,2);//23
	$pdf->Cell(40,19, number_format($user->reprezentacija,2,",","."),0,2);//24
	$pdf->Cell(40,10, number_format($user->ivos_manje,2,",","."),0,2);//25
	$pdf->Cell(40,18, number_format($user->nerezidentno_lice,2,",","."),0,2);//26
	$pdf->Cell(40,2, number_format($user->neplaceni_porezi,2,",","."),0,2);//27
	$pdf->Cell(40,27, number_format($user->placeni_porezi,2,",","."),0,2);//28
	$pdf->Cell(40,-3, number_format($user->veci_ivos,2,",","."),0,2);//29
	$pdf->Cell(40,19, number_format($user->ivos_osiguranje,2,",","."),0,2);//30
	$pdf->Cell(40,-2, number_format($user->nepriznata_dug_rez,2,",","."),0,2);//31
	$pdf->Cell(40,20, number_format($user->iskoriscena_dug_rez,2,",","."),0,2);//32
	$pdf->Cell(40,-2, number_format($user->rashodi_obezvredjenje,2,",","."),0,2);//33
	$pdf->Cell(40,25, number_format($user->rashodi_obezvredjenje,2,",","."),0,2);//34
	$pdf->Cell(40,12, number_format($user->rashodi_obezvredjenje1,2,",","."),0,2);//35
	$pdf->Cell(40,6, number_format($user->porez_dividende,2,",","."),0,2);//36



/*=================================================== 
	Add THIRD Page
=====================================================*/
$pdf->AddPage();
	 
    $pdf->setSourceFile("fpdf/tfpdf/poreski3.pdf");
    $tplIdx = $pdf->importPage(1); 
    $pdf->useTemplate($tplIdx, -1, 0, 210);
    $pdf->SetTextColor(0);
    $pdf->SetXY($pdf->lMargin, 0);
    $pdf->Ln();
	$pdf->SetXY(145,30);
	$pdf->SetFont('DejaVu', '', 9);
	$pdf->Cell(40,12,"",0,2);//
	$pdf->Cell(40,8, number_format($user->porez_po_odbitku,2,",","."),0,2);//37
	$pdf->Cell(40,25, number_format($user->ivos_pojedinacna,2,",","."),0,2);//38
	$pdf->Cell(40,5, number_format($user->prihodi_ivos,2,",","."),0,2);//39
	$pdf->Cell(40,16, number_format($user->prihodi_dividende,2,",","."),0,2);//40
	$pdf->Cell(40,5, number_format($user->prihodi_kamate,2,",","."),0,2);//41
	$pdf->Cell(40,20, number_format($user->neiskoriscena_dug_rez,2,",","."),0,2);//42
	$pdf->Cell(40,-3, number_format($user->prihodi_rashodi,2,",","."),0,2);//43
	$pdf->Cell(40,33, number_format($user->troskovi_trcena,2,",","."),0,2);//44
	$pdf->Cell(40,-17, number_format($user->izvestaj_trcena,2,",","."),0,2);//45
	$pdf->Cell(40,31, number_format($user->prihodi_trcena,2,",","."),0,2);//46
	$pdf->Cell(40,-14, number_format($user->obracunati_trprihodi,2,",","."),0,2);//47
	$pdf->Cell(40,45, number_format($user->obr_krashodi,2,",","."),0,2);//48
	$pdf->Cell(40,-27, number_format($user->obr_krprihodi,2,",","."),0,2);//49
	$pdf->Cell(40,70, number_format($user->zbir_korekcija,2,",","."),0,2);//50
	$pdf->Cell(40,-28, number_format($user->kamata_zajam,2,",","."),0,2);//51
	$pdf->Cell(40,28,"",0,2);//
	$pdf->Cell(40,10, number_format($user->oporeziva_dobit,2,",","."),0,2);//52
	$pdf->Cell(40,10, number_format($user->gubitak,2,",","."),0,2);//53
	$pdf->Cell(40,8, number_format($user->prethodni_gubitak,2,",","."),0,2);//54



/*===================================================
	Add Fourth Page
=====================================================*/
$pdf->AddPage();
	 
    $pdf->setSourceFile("fpdf/tfpdf/poreski4.pdf");
    $tplIdx = $pdf->importPage(1); 
    $pdf->useTemplate($tplIdx, -1, 0, 210);
    $pdf->SetTextColor(0);
    $pdf->SetXY($pdf->lMargin, 0);
    $pdf->Ln();
	$pdf->SetXY(145,26);
	$pdf->SetFont('DejaVu', '', 9);
	$pdf->Cell(40,12,"",0,2);//
	$pdf->Cell(40,8, number_format($user->ostatak_oporezive_dobiti,2,",","."),0,2);//55
	$pdf->Cell(40,20, number_format($user->kd_tg,2,",","."),0,2);//56
	$pdf->Cell(40,-4, number_format($user->kg_tg,2,",","."),0,2);//57
	$pdf->Cell(40,18, number_format($user->kapitalni_dobici,2,",","."),0,2);//58
	$pdf->Cell(40,-4, number_format($user->kapitalni_gubici,2,",","."),0,2);//59
	$pdf->Cell(40,18, number_format($user->preneti_kapitalni_gubici,2,",","."),0,2);//60
	$pdf->Cell(40,-3, number_format($user->ostatak_kap_dobitka,2,",","."),0,2);//61
	$pdf->Cell(40,29, number_format($user->poreska_osnovica,2,",","."),0,2);//62

	$pdf->SetXY(28,129);
	$pdf->Cell(40,12,$user->u,0,2);
	$pdf->SetXY(31,137);
	$pdf->SetFont('DejaVu', '', 8);
	$pdf->Cell(40,12,$user->dana,0,2);


$pdf->Output('PB1.pdf','D');


	
?>