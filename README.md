# poreskiBilans - Example of this application is available on http://bilans.sdl-profile.com/ <br>
poreskiBilans - is simple web aplication for printing PDF document "PB-1" for tax payment in Serbian market. Idea is to create easier way of filling up documents and counting tax base. In near feature, this project will be updated with option for download XML document with all necessary data. Application is based on FPDF and TFPDF library.<br>
If you want to use this application in your server, please take care about next items:
<ul>
  <li>Database File - "inc/classes/database.php" where you need to set up your connection parameters,</li>
  <li>Paths - checkout next files if you have errors:
    <ul>
      <li>/fpdf/tfpdf/font/unifont/dejavusans-extralight.mtx.php,</li>
      <li>/fpdf/tfpdf/font/unifont/dejavusanscondensed.mtx and</li>   
      <li>/fpdf/tfpdf/font/unifont/dejavusanscondensed-bold.mtx.php</li>
    </ul>
  </li>
  <li>jQuery file "pb_functions" - define your path for each of the functions</li>
</ul>
