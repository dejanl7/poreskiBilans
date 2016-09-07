<?php 
  include('inc/init.php');
  
  if( !$session->status ){
      header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>tabs demo</title>
  
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/pb.css">
  <style type="text/css">
    .no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .se-pre-con {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url(images/Preloader_2.gif) center no-repeat #fff;
    }
  </style>

</head>
<body>
<div class="se-pre-con"></div><!-- Simple Preloader -->
<div class="container">
  <div id="tabs">
    <ul>
      <li class="page-1-display"><a href="#page-1"><span>Прва Страница</span></a></li>
      <li class="page-2-display"><a href="#page-2"><span>Друга Страница</span></a></li>
      <li class="page-3-display"><a href="#page-3"><span>Трећа Страница</span></a></li>
      <li class="page-4-display"><a href="#page-4"><span>Четврта Страница</span></a></li>
    </ul>
        

<!-- FIRST PAGE -->
    <div id="page-1">
      <?php 
          $operations = new Operations();
          $user_data = $operations->find_this_user($session->user);
      ?>
      <div class="row">
        <div class="top-info col-xs-12">
          <div class="col-xs-5 text-left"><span>ПОРЕСКИ БИЛАНС</span></div>
          <div class="col-xs-5 col-xs-offset-1 text-right">Стр. 1 од 4.</div>
        </div>
        
      <form method="POST" action="inc/functions.php" id="first-page-form">
        <div class="col-sm-5 col-xs-12">
          <div class="form-group">
              <input type="text" id="name" name="name" class="form-control" value="<?php echo $user_data->naziv_firme; ?>" disabled />
              <label for="name">(Фирма - пословно име пореског обвезника)</label>
          </div>
          <div class="form-group">
              <input type="text" id="city" class="form-control" name="city" value="<?php echo $user_data->sediste; ?>" />
              <label for="city">(Седиште)</label>
          </div>
          <div class="form-group">
              <input type="text" id="pib" class="form-control" name="pib" value="<?php echo $user_data->pib; ?>" />
              <label for="pib">(ПИБ)</label>
          </div>
        </div><!-- .col-xs-12 -->
        <div class="col-sm-5 col-sm-offset-1 col-xs-12 col-xs-offset-0 company_type">
            <span>Облик пореског обвезника (означити):</span>
            <div class="checkbox">
              <label> 
                  <input type="checkbox" id="ad" name="type" value="ad" <?php echo Operations::check_box($user_data->vrsta_obveznika, 'ad'); ?> /> 1. Акционарско друштво
              </label>
            </div>
            <div class="checkbox">
              <label> 
                  <input type="checkbox" id="doo" name="type" value="doo" <?php echo Operations::check_box($user_data->vrsta_obveznika, 'doo'); ?> /> 2. Друштво са ограниченом одговорношћу 
              </label>
            </div>
            <div class="checkbox">
              <label> 
                  <input type="checkbox" id="ortakluk" name="type" value="ortakluk" <?php echo Operations::check_box($user_data->vrsta_obveznika, 'ortakluk'); ?> /> 3. Ортачко друштво 
              </label>
            </div>
            <div class="checkbox">
              <label> 
                  <input type="checkbox" id="komanditno_dr" name="type" value="komanditno_dr" <?php echo Operations::check_box($user_data->vrsta_obveznika, 'komanditno_dr'); ?> /> 4. Командитно друштво 
              </label>
            </div>
            <div class="checkbox">
              <label> 
                  <input type="checkbox" id="drustveno_pr" name="type" value="drustveno_pr" <?php echo Operations::check_box($user_data->vrsta_obveznika, 'drustveno_pr'); ?> /> 5. Друштвено предузеће 
              </label>
            </div>
            <div class="checkbox">
              <label> 
                  <input type="checkbox" id="javno_pr" name="type" value="javno_pr" <?php echo Operations::check_box($user_data->vrsta_obveznika, 'javno_pr'); ?> /> 6. Јавно предузеће 
              </label>
            </div>
            <div class="checkbox">
              <label> 
                  <input type="checkbox" id="zadruga" name="type" value="zadruga" <?php echo Operations::check_box($user_data->vrsta_obveznika, 'zadruga'); ?> /> 7. Задруга 
              </label>
            </div>
            <div class="checkbox">
              <label> 
                  <input type="checkbox" id="strano_pravno_lice" name="type" value="strano_pravno_lice" <?php echo Operations::check_box($user_data->vrsta_obveznika, 'strano_pravno_lice'); ?> /> 8. Огранак страног правног лица
              </label>
            </div>
            <div class="checkbox">
              <label> 
                  <input type="checkbox" id="druga_pravna_lica" name="type" value="druga_pravna_lica" <?php echo Operations::check_box($user_data->vrsta_obveznika, 'druga_pravna_lica'); ?> /> 9. Друга правна лица која примењују контни оквир за привредна  друштва, задруге, друга правна лица и предузетнике </span>
              </label>
            </div>
        </div>
        </div>
        <div class="row">
          <div class="text-center billans_headline">
              <span>ПОРЕСКИ БИЛАНС</span><br> 
              <span>ОБВЕЗНИКА ПОРЕЗА НА ДОБИТ ПРАВНИХ ЛИЦА</span><br> 
              <span>ЗА ПЕРИОД ОД <input type="text" class="text-center my-form-control" id="date-from" name="date-from" value="<?php echo $user_data->period_od; ?>" /> ДО 
              <input type="text" class="text-center my-form-control" id="date-end" name="date-end" value="<?php echo $user_data->period_do; ?>"" /> 201<input type="text" class="my-form-control" id="year" name="year"  value="<?php echo $user_data->godina; ?>" />. ГОДИНЕ</span>
          </div>
              <div class="col-xs-12 text-right">- износ у динарима без децимала -</div>
              <table class="table table-hover">  
                  <tr>
                    <td>Редни број</td>
                    <td>Позиција</td>
                    <td>Динара</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td ><b> А. Добит и губитак пре опорезивања</b></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td > I. Резултат у Билансу успеха</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td >Добит пословне године</td>
                    <td><input class="form-control number_value" type="text" name="dobit_poslovne_godine" data-a-sep="." data-a-dec=","   data-a-sep="." data-a-dec=","  value="<?php echo $user_data->dobit_poslovne_godine; ?>" /></td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td >Добит остварена по основу прихода од предмета концесије</td>
                    <td><input class="form-control number_value" type="text" name="dobit_koncesija"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->dobit_koncesije; ?>" /></td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td >Губитак пословне године</td>
                    <td><input class="form-control number_value" type="text" name="gubitak_poslovne_godine"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->gubitak_poslovne_godine; ?>" /></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td > <b>II. Добици и губици од продаје имовине из члана 27. Закона (исказани у Билансу успеха)</b></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>4.</td>
                    <td >Добици од продаје имовине</td>
                    <td><input class="form-control number_value" type="text" name="dobici_imovina"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->dobici_imovina; ?>" /></td>
                  </tr>
                  <tr>
                    <td>5.</td>
                    <td >Губици од продаје имовине</td>
                    <td><input class="form-control number_value" type="text" name="gubici_imovina"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->gubici_imovina; ?>" /></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td ><b>III. Усклађивање расхода</b></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>6.</td>
                    <td >Трошкови који нису документовани</td>
                    <td><input class="form-control number_value" type="text" name="nedokumentovani_tr"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->nedokumentovani_troskovi; ?>"/></td>
                  </tr>
                  <tr>
                    <td>7.</td>
                    <td >Исправке вредности појединачних потраживања од лица којима се истовремено дугује, до износа обавезе према том лицу</td>
                    <td><input class="form-control number_value" type="text" name="ispravka_vr"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->ivos_potrazivanja; ?>" /></td>
                  </tr>
                  <tr>
                    <td>8.</td>
                    <td >Поклони и прилози дати политичким организацијама</td>
                    <td><input class="form-control number_value" type="text" name="pokloni_politicari"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->pokloni_organizacijama; ?>" /></td>
                  </tr>
            </table>
        </form>   

      <div class="row buttons">
        <div class="col-sm-3 col-xs-12">  
            <button type="submit" class="btn btn-warning reset"><a href="turnoff.php?user=".<?php echo $session->user; ?> >Ресетуј</a></button>
        </div>
        <div class="col-sm-9 col-xs-12 text-right">  
            <button type="submit" class="col-sm-3 col-sm-offset-9 btn btn-primary first-page" data-index="1" data-page="first">Сачувај и Настави</button>
        </div> 
      </div><!-- .col-xs-12 -->        
      </div>
    
    </div><!-- END OF FIRST PAGE --> 
    
    <!-- START WITH OPAGE 2 -->
    <div id="page-2">
      <div class="row">
        <div class="top-info col-xs-12">
          <div class="col-xs-5 text-left"><span>ПОРЕСКИ БИЛАНС</span></div>
          <div class="col-xs-5 col-xs-offset-1 text-right">Стр. 2 од 4.</div>
        </div>
        <div class="col-xs-12 text-right">- износ у динарима без децимала -</div>
          <form action="inc/functions.php" method="POST" id="second-page-form">
          <table class="table table-hover"> 
            <tr>
              <td>Редни број</td>
              <td>Позиција</td>
              <td>Динара</td>
            </tr>
            <tr>
              <td>1</td>
              <td>2</td>
              <td>3</td>
            </tr>
            <tr>
              <td class="rbroj">9.</td>
              <td class="druga_kolona">Поклони чији је прималац повезано лице</td>
              <td><input class="form-control number_value" type="text" id="pokloni_povezanaLica" name="pokloni_povezanaLica"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->pokloni_p_l; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">10.</td>
              <td class="druga_kolona">Камате због неблаговремене наплате пореза, доприноса и других јавних дажбина</td>
              <td><input class="form-control number_value" type="text" name="kamate_javne_dazbine"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->kamate; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">11.</td>
              <td class="druga_kolona">Трошкови поступка принудне наплате пореза и других дуговања, трошкови порескопрекршајног и других прекршајних поступака који се воде пред надлежним органима</td>
              <td><input class="form-control number_value" type="text" name="prekrsaji"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->prinudna_naplata; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">12.</td>
              <td class="druga_kolona">Новчане казне, уговорне казне и пенали</td>
              <td><input class="form-control number_value" type="text" name="penali"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->novcane_kazne; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">13.</td>
              <td class="druga_kolona">Затезне камате између повезаних лица</td>
              <td><input class="form-control number_value" type="text" name="zatezne_kamate"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->zatezne_kamate; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">14.</td>
              <td class="druga_kolona">Трошкови који нису настали у сврху обављања пословне делатности</td>
              <td><input class="form-control number_value" type="text" name="neposlovni_troskovi"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->neposlovni_troskovi; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">15.</td>
              <td class="druga_kolona">Трошкови материјала и набавне вредности продате робе изнад изиноса обрачунатог применом методе пондерисане просечне цене или FIFO методе</td>
              <td><input class="form-control number_value" type="text" name="materijal"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->troskovi_materijala; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">16.</td>
              <td class="druga_kolona">Отпремнине и новчане накнаде по основу престанка радног односа, обрачунате а неисплаћене у пореском периоду</td>
              <td><input class="form-control number_value" type="text" name="obracunate_otpremnine"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->obracuante_otpremnine; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">17.</td>
              <td class="druga_kolona">Отпремнине и новчане накнаде по основу престанка радног односа које су обрачунате у претходном а исплаћене у пореском периоду за који се подноси порески биланс</td>
              <td><input class="form-control number_value" type="text" name="isplacene_otpremnine"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->isplacene_otpremnine; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">18.</td>
              <td class="druga_kolona">Укупан износ амортизације обрачунат у финансијским извештајима</td>
              <td><input class="form-control number_value" type="text" name="amortizacija"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->amortizacija; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">19.</td>
              <td class="druga_kolona">Укупан износ амортизације обрачунат за пореске сврхе</td>
              <td><input class="form-control number_value" type="text" name="poreska_amortizacija"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->poreska_amortizacija; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">20.</td>
              <td class="druga_kolona">Издаци за здравствене, образовне, научне, хуманитарне, верске, заштиту човекове средине и спортске намене и давања учињена установама социјалне заштите</td>
              <td><input class="form-control number_value" type="text" name="izdaci_nauka_i_td"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->nauka_zdravstvo; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">21.</td>
              <td class="druga_kolona">Издаци за улагања у области културе</td>
              <td><input class="form-control number_value" type="text" name="izdaci_kultura"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->izdaci_kultura; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">22.</td>
              <td class="druga_kolona">Чланарине коморама, савезима, удружењима</td>
              <td><input class="form-control number_value" type="text" name="clanarine"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->clanarine; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">23.</td>
              <td class="druga_kolona">Расходи за рекламу и пропаганду</td>
              <td><input class="form-control number_value" type="text" name="reklama"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->reklame; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">24.</td>
              <td class="druga_kolona">Расходи по основу репрезентације</td>
              <td><input class="form-control number_value" type="text" name="reprezentacija"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->reprezentacija; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">25.</td>
              <td class="druga_kolona">Исправка вредности појединачих потраживања ако од рока за њихову наплату није прошло најмање 60 дана, као и отпис вредности појединачних потраживања која претходно нису била укључена у приходе, нису отписана као ненаплатива и за која није пружен доказ о неуспелој наплати</td>
              <td><input class="form-control number_value" type="text" name="ivos_manje60"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->ivos_manje; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">26.</td>
              <td class="druga_kolona">Трошкови које огранак нерезидентног обвезника исказује у складу са чланом 20. Закона</td>
              <td><input class="form-control number_value" type="text" name="nerezidentni_ogranak"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->nerezidentno_lice; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">27.</td>
              <td class="druga_kolona">Порези, доприноси, таксе и друге јавне дажбине које не зависе од резултата пословања и нису плаћене у пореском периоду, а по основу којих је у пословним књигама обвезника исказан расход</td>
              <td><input class="form-control number_value" type="text" name="neplaceni_porezi"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->neplaceni_porezi; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">28.</td>
              <td class="druga_kolona">Порези, доприноси, таксе и друге јавне дажбине које не зависе од резултата пословања, плаћене у пореском периоду, а које нису биле плаћене у претходном пореском периоду у коме је по том основу у пословним књигама обвезника био исказан расход</td>
              <td><input class="form-control number_value" type="text" name="placeni_porezi"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->placeni_porezi; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">29.</td>
              <td class="druga_kolona">Увећање исправке вредности потраживања банке изнад износа утврђеног прописима Народне банке Србије</td>
              <td><input class="form-control number_value" type="text" name="uvecanje_ivos"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->veci_ivos; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">30.</td>
              <td class="druga_kolona">Увећање индиректног отписа потраживања осигуравајућег друштва изнад износа утврђеног прописима Народне банке Србије</td>
              <td><input class="form-control number_value" type="text" name="ivos_osiguranje"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->ivos_osiguranje; ?>" /></td>
            </tr>
        </table>
      </form>
      </div>
            <div class="row buttons">
                <div class="col-sm-3 col-xs-12">  
                    <button type="submit" class="btn btn-danger second_page" data-index="0">Назад</button>
                </div>
                <div class="col-sm-9 col-xs-12 text-right">
                    <button type="submit" class="col-sm-3 col-sm-offset-9 btn btn-primary second-page" data-index="2" data-page="second">Сачувај и Настави</button>
                </div> 
          </div><!-- .buttons --> 
    </div><!-- #page-2 -->
    <!-- END OF PAGE 2 -->

    <!-- START WITH PAGE 3 -->
    <div id="page-3">
      <div class="row">
        <div class="top-info col-xs-12">
            <div class="col-xs-5 text-left"><span>ПОРЕСКИ БИЛАНС</span></div>
            <div class="col-xs-5 col-xs-offset-1 text-right">Стр. 3 од 4.</div>
        </div>
        <div class="col-xs-12 text-right">- износ у динарима без децимала -</div>
        <form action="inc/functions.php" method="POST" id="third-page-form">
          <table class="table table-hover"> 
            <tr>
              <td>Редни број</td>
              <td>Позиција</td>
              <td>Динара</td>
            </tr>
            <tr>
              <td>1</td>
              <td>2</td>
              <td>3</td>
            </tr>
            <tr>
              <td class="rbroj">31.</td>
              <td class="druga_kolona">Дугорочна резервисања која се не признају у пореском билансу</td>
              <td><input class="form-control number_value" type="text" name="dugorocna_rezervisanja"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->nepriznata_dug_rez; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">32.</td>
              <td class="druga_kolona">Искоришћена дугорочна резервисања за издате гаранције и друга јемства која нису била призната као расход у пореском периоду у коме су извршена</td>
              <td><input class="form-control number_value" type="text" name="iskoriscena_dugorocna_rezervisanja"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->iskoriscena_dug_rez; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">33.</td>
              <td class="druga_kolona">Расходи по основу обезвређења имовине</td>
              <td><input class="form-control number_value" type="text" name="obezvredjenje_imovine"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->rashodi_obezvredjenje; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">34.</td>
              <td class="druga_kolona">Расходи по основу обезвређења имовине који се признају у пореском периоду за који се подноси порески биланс, а у коме је та имовина отуђена, употребљена или је дошло до оштећења те имовине услед више силе</td>
              <td><input class="form-control number_value" type="text" name="priznato_obezvredjenje"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->rashodi_obezvredjenje1; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj"></td>
              <td class="druga_kolona">IV Усклађивање прихода</td>
              <td></td>
            </tr> 
            <tr>
              <td class="rbroj">35.</td>
              <td class="druga_kolona">Порез на добит правних лица који је у другој држави платила нерезидентна филијала резидентног матичног правног лица</td>
              <td><input class="form-control number_value" type="text" name="inostrani_porez"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->rashodi_obezvredjenje1; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">36.</td>
              <td class="druga_kolona">Порез по одбитку на дивиденде који је у другој држави платила нерезидентна филијала резидентног матичног правног лица</td>
              <td><input class="form-control number_value" type="text" name="dividende"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->porez_dividende; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">37.</td>
              <td class="druga_kolona">Порез по одбитку на камате, ауторске накнаде, накнаде по основу закупа непокретности и покретних ствари и дивиденде које не испуњавају услове за порески кредит по члану 52. Закона, плаћен у другој држави</td>
              <td><input class="form-control number_value" type="text" name="odbitak_kamate_autorskeNaknade"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->porez_po_odbitku; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">38.</td>
              <td class="druga_kolona">Исправке вредности појединачних потраживања које су биле признате на терет расхода, а за које, у пореском периоду у коме се врши отпис, нису кумулативно испуњени услови из члана 16. ст.1 и 2. Закона</td>
              <td><input class="form-control number_value" type="text" name="ivos_pojedinacnih_potrazivanja"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->ivos_pojedinacna; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">39.</td>
              <td class="druga_kolona">Приходи остварени у пореском периоду по основу отписаних, исправљених и других потраживања која нису била призната као расход</td>
              <td><input class="form-control number_value" type="text" name="otpis_ispravljena_potraz"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->prihodi_ivos; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">40.</td>
              <td class="druga_kolona">Приходи по основу дивиденди и удела у добити од другог резидентног обвезника</td>
              <td><input class="form-control number_value" type="text" name="dividenda_rezidenta"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->prihodi_dividende; ?>"/></td>
            </tr> 
            <tr>
              <td class="rbroj">41.</td>
              <td class="druga_kolona">Приходи од камата по основу дужничких хартија од вредности чији је издавалац Република, аутономна покрајина, јединица локалне самоуправе или НБС</td>
              <td><input class="form-control number_value" type="text" name="drzavne_hov"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->prihodi_kamate; ?>" /></td>
            </tr>
            <tr>
              <td class="rbroj">42.</td>
              <td class="druga_kolona">Приходи по основу неискоришћених дугорочних резервисања која нису била призната као расход у пореском периоду у коме су извршена</td>
              <td><input class="form-control number_value" type="text" name="neiskoriscena_dugRezervisanja"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->neiskoriscena_dug_rez; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">43.</td>
              <td class="druga_kolona">Приходи настали у вези са расходима који нису били признати</td>
              <td><input class="form-control number_value" type="text" name="prihodi_rashodi"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->prihodi_rashodi; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj"></td>
              <td class="druga_kolona">V. Расходи и приходи по основу трансферних цена (осим камата на зајмове, односно кредите)</td>
              <td></td>
            </tr>   
            <tr>
              <td class="rbroj">44.</td>
              <td class="druga_kolona">Обрачунати трошкови по основу трансферних цена</td>
              <td><input class="form-control number_value" type="text" name="troskovi_tc"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->troskovi_trcena; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">45.</td>
              <td class="druga_kolona">Обрачунати трошкови по основу трансферних цена за које се подноси извештај у скраћеном облику</td>
              <td><input class="form-control number_value" type="text" name="troskovi_tc_skraceniIzvestaj"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->izvestaj_trcena; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">46.</td>
              <td class="druga_kolona">Обрачунати приходи по основу трансферних цена</td>
              <td><input class="form-control number_value" type="text" name="prihodi_tc"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->prihodi_trcena; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">47.</td>
              <td class="druga_kolona">Обрачунати приходи по основу трансферних цена за које се подноси извештај у скраћеном облику</td>
              <td><input class="form-control number_value" type="text" name="prihodi_tc_skraceniIzvestaj"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->obracunati_trprihodi; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj"></td>
              <td class="druga_kolona">VI Расходи и приходи по основу камата на зајмове, односно кредите између повезаних лица</td>
              <td></td>
            </tr> 
            <tr>
              <td class="rbroj">48.</td>
              <td class="druga_kolona">Обрачунати расходи по основу камата ("на дохват руке") на зајмове, односно кредите добијене од повезаних лица</td>
              <td><input class="form-control number_value" type="text" name="troskovi_kamate_pl"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->obr_krashodi; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj">49.</td>
              <td class="druga_kolona">Обрачунати приходи по основу камата ("на дохват руке") на зајмове, односно кредите одобрене повезаним лицима</td>
              <td><input class="form-control number_value" type="text" name="prihodi_kamate_pl"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->obr_krprihodi; ?>" /></td>
            </tr> 
            <tr>
              <td class="rbroj"></td>
              <td class="druga_kolona">VII Корекција расхода и прихода по основу трансферних цена, укључујући и камате на зајмове, односно кредите између повезаних лица</td>
              <td></td>
            </tr> 
            <tr>
              <td class="rbroj">50.</td>
              <td class="druga_kolona">Збир коначних корекција (расхода и прихода) по основу трансакција са свим појединачним повезаним лицима утврђен у закључку документације о трансферним ценама</td>
              <td><input class="form-control number_value" type="text" name="korekcije_tc"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->zbir_korekcija; ?>"/></td>
            </tr> 
          </table>
        </form>
        </div>
        <div class="row buttons">
          <div class="col-sm-3 col-xs-12">  
              <button type="submit" class="btn btn-danger third_page" data-index="1">Назад</button>
          </div>
          <div class="col-sm-9 col-xs-12 text-right">  
              <button type="submit" class="col-sm-3 col-sm-offset-9 btn btn-primary third-page" data-index="3" data-page="third">Сачувај и Настави</button>
          </div> 
        </div><!-- .col-xs-12 --> 
    </div>
    <!-- END OF PAGE 3 -->

    <!-- START WITH PAGE 4 -->
    <div id="page-4">
      <div class="row">
        <div class="top-info col-xs-12">
            <div class="col-xs-5 text-left"><span>ПОРЕСКИ БИЛАНС</span></div>
            <div class="col-xs-5 col-xs-offset-1 text-right">Стр. 4 од 4.</div>
        </div>
        <div class="col-xs-12 text-right">- износ у динарима без децимала -</div>
        <form action="inc/functions.php" method="POST" id="fourth-page-form">
          <table class="table table-hover">
              <tr>
                <td>Редни број</td>
                <td>Позиција</td>
                <td>Динара</td>
              </tr>
              <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
              </tr>
              <tr>
                <td class="rbroj"></td>
                <td class="druga_kolona">VIII. Корекције расхода по основу спречавања утањене капитализације</td>
                <td></td>
              </tr> 
              <tr>
                <td class="rbroj">51.</td>
                <td class="druga_kolona">Камата и припадајући трошкови на зајам, односно кредит изнад нивоа четвороструког (десетоструке) вредности обвезниковог сопственог капитала (ред. бр 13. Обрасца ОК)</td>
                <td><input class="form-control number_value" type="text" name="cetvorostruka_kamata"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->kamata_zajam; ?>" /></td>
              </tr> 
              <tr>
                <td class="rbroj"></td>
                <td class="druga_kolona">IV. Опорезива добит</td>
                <td></td></tr>  
              <tr>
                <td class="rbroj">52.</td>
                <td class="druga_kolona">Опорезива добит <br/> (1-2-4+5 до 16-17+18-19+20 до 27-28+29 до 31-32+33-34+35 до 38-39 до 43+50+51) > 0 <br/> (или негативан износ са редног броја 53)</td>
                <td><input class="form-control number_value" type="text" name="oporeziva_dobit"  data-a-sep="." data-a-dec=","  value="<?php echo $operations->oporeziva_dobit(); ?>" readonly="readonly" /></td></tr>  
              <tr>
                <td class="rbroj">53.</td>
                <td class="druga_kolona">Губитак <br/> (3+4-5 до 16+17-18+19-20 до 27+28-29 до 31+32-33+34-35 до 38+39 до 43-50-51) > 0 <br/> (или негативан износ са редног броја 52)</td>
                <td><input class="form-control number_value" type="text" name="gubitak"  data-a-sep="." data-a-dec=","  value="<?php echo $operations->gubitak(); ?>" readonly="readonly" /></td></tr>  
              <tr>
                <td class="rbroj">54.</td>
                <td class="druga_kolona"> Износ губитка из пореског биланса из претходних година, до висине опорезиве добити</td>
                <td><input class="form-control number_value" type="text" name="prethodni_gubitak"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->prethodni_gubitak; ?>" /></td>
              </tr> 
              <tr>
                <td class="rbroj">55.</td>
                <td class="druga_kolona"> Остатак опорезиве добити (52-54) > 0</td>
                <td><input class="form-control number_value" type="text" name="ostatak_oporezive_dobiti"  data-a-sep="." data-a-dec=","  value="<?php echo $operations->ostatak_op_d(); ?>" readonly="readonly" /></td>
              </tr> 
              <tr>
                <td class="rbroj"></td>
                <td class="druga_kolona"> <b>Б. Капитални добици и губици</b></td>
                <td></td>
              </tr> 
              <tr>
                <td class="rbroj">56.</td>
                <td class="druga_kolona"> Укупни капитални добици текуће године обрачунати у складу са Законом</td>
                <td><input class="form-control number_value" type="text" name="kd_tg"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->kd_tg; ?>" /></td>
              </tr> 
              <tr>
                <td class="rbroj">57.</td>
                <td class="druga_kolona"> Укупни капитални губици текуће године обрачунати у складу са Законом</td>
                <td><input class="form-control number_value" type="text" name="kg_tg"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->kg_tg; ?>" /></td>
              </tr> 
              <tr>
                <td class="rbroj">58.</td>
                <td class="druga_kolona"> Капитални добици (56-57) > 0</td>
                <td><input class="form-control number_value" type="text" name="kapitalni_dobici"  data-a-sep="." data-a-dec=","  value="<?php echo $operations->kapitalni_dobici(); ?>" readonly="readonly" /></td>
              </tr> 
              <tr>
                <td class="rbroj">59.</td>
                <td class="druga_kolona"> Капитални губици (57-56) > 0</td>
                <td><input class="form-control number_value" type="text" name="kapitalni_gubici"  data-a-sep="." data-a-dec=","  value="<?php echo $operations->kapitalni_gubici(); ?>" readonly="readonly" /></td>
              </tr> 
              <tr>
                <td class="rbroj">60.</td>
                <td class="druga_kolona"> Пренети капитални губици из ранијих година до висине капитала под редним бројем 58</td>
                <td><input class="form-control number_value" type="text" name="preneti_kapitalni_gubici"  data-a-sep="." data-a-dec=","  value="<?php echo $user_data->preneti_kapitalni_gubici; ?>" /></td>
              </tr> 
              <tr>
                <td class="rbroj">61.</td>
                <td class="druga_kolona"> Остатак капиталног добитка (58-60) >= 0</td>
                <td><input class="form-control number_value" type="text" name="ostatak_kap_dobitka"  data-a-sep="." data-a-dec=","  value="<?php echo $operations->ostatak_kapitalnog_dobitka(); ?>" readonly="readonly" /></td>
              </tr> 
              <tr>
                <td class="rbroj"></td>
                <td class="druga_kolona"> <b>В. Пореска основица</b></td>
                <td></td>
              </tr> 
              <tr>
                <td class="rbroj">62.</td>
                <td class="druga_kolona"> Пореска основица (55+61) > 0</td>
                <td><input class="form-control number_value" type="text" name="poreska_osnovica"  data-a-sep="." data-a-dec=","  value="<?php echo $operations->poreska_osnovica(); ?>" readonly="readonly" readonly="readonly" /></td>
              </tr> 
          </table>


          <div class="col-sm-12 signature_part">
            <div class="col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="in_city">У (место, седиште предузећа)</label>  
                    <input type="text" class="form-control" id="in_city" name="in_city" value="<?php echo $user_data->u; ?>" />
                </div>
                <div class="form-group">
                    <label for="signature_date">Дана</label> 
                    <input type="text" class="form-control" id="signature_date" name="signature_date" value="<?php echo $user_data->dana; ?>" />
                    <label for="signature_date">године</label>
                </div>
            </div>
            <div class="hidden col-sm-6 col-sm-offset-2">
                <div class="form-group"> 
                  <label for="">Лице одговорно за састављање пореског биланса (својеручни потпис)</label>
                  <input type="text" class="form-control" id="signature" name="signature" />
                </div>
            </div>
          </div>
        </form>
        </div>
        <div class="buttons buttons_last_page">
            <div class="col-sm-3 col-xs-12">  
                <button type="submit" class="col-sm-4 btn btn-danger fourth_page" data-index="2">Назад</button>
                 <button type="submit" class="col-sm-4 col-sm-offset-2 btn btn-warning reset"><a href="turnoff.php?user=".<?php echo $session->user; ?> >Нов</a></button>
            </div>
            <div class="col-sm-9 col-xs-12 text-right">  
                <button type="submit" class="col-sm-3 col-sm-offset-5 btn btn-info fourth-page" data-index="4" data-page="fourth"> Израчунај</button>
                  <button type="submit" id="print" class="col-sm-3 col-sm-offset-1 btn btn-primary fourth-page" data-index="4" data-page="fourth">Штампај ПДФ</button>
            </div> 
        </div><!-- .col-xs-12 --> 
    </div>
    <!-- END OF PAGE 4 -->

    </div>
  </div>
</div>

 


  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/autoNumeric-min.js"></script>
  <script type="text/javascript">
      jQuery(function($) {
        $('.number_value').autoNumeric('init');
      });
  </script>
  <script src="js/simple-loader.js"></script>
  <script src="js/pb_functions.js"></script> 
  <script src="js/pb_ajax.js"></script> 

</body>
</html>