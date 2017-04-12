poreskiBilans - is simple web aplication for printing PDF document template "PB-1" for tax payment in Serbian market. Idea is to create easier way of filling up documents and counting tax base. In near future, this project will be updated with option for download XML document with all necessary data. Application is based on FPDF and TFPDF library.<br>
If you want to use this application in your server, please take care about next items:
<ul>
  <li>Database File - "inc/classes/database.php", where you need to set up your connection parameters,</li>
  <li>Paths - checkout unifont files if you have errors:
    <ul>
      <li>/fpdf/tfpdf/font/unifont/dejavusans-extralight.mtx.php,</li>
      <li>/fpdf/tfpdf/font/unifont/dejavusanscondensed.mtx and</li>   
      <li>/fpdf/tfpdf/font/unifont/dejavusanscondensed-bold.mtx.php</li>
    </ul>
  </li>
  <li>jQuery file "pb_functions" - define your path for each of the functions</li>
</ul>
<br>
<h3>Database</h3>
You can use file "poreski_bilans.sql"  to build database. File is into root folder of this application.
<br>
<h3>Srpski</h3>
Trenutno, aplikacija pruža mogućnost štampanja PDF dokumenta poslednje verzije obrasca za utvrđivanje poreske obaveze pravnih lica "PB-1". U ternutku kada XML struktura podataka bude javno dostupna od strane Poreske uprave Srbije, aplikacija će biti ažurirana.  
