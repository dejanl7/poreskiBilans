<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>tabs demo</title>
  
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/pb.css">

	<?php include('inc/init.php'); // Include Init file ?>
</head>
<body class="index">
	<div class="container-fluid">
		<form action="inc/functions.php" method="POST" >
			<div class="col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1 introduction">
				<div class="form-group">
					<label for="company_name_index">Назив Ваше Фирме</label>
					<input type="text" id="company_name_index" class="form-control" name="company_name_index" placeholder="Назив" required />	
				</div>
				<div class="form-group">
					<label for="company_headquarter_index">Седиште</label>
					<input type="text" id="company_headquarter_index" class="form-control" name="company_headquarter_index" placeholder="Седиште"  required />	
				</div>
				<div class="form-group">
					<label for="company_pib_index">ПИБ</label>
					<input type="number" id="company_pib_index" class="form-control" name="company_pib_index" placeholder="ПИБ" />	
				</div>
				<div class="form-group">
					<input type="submit" id="company_submit_index" name="company_submit_index" class="btn btn-info" value="Приступ формулару" />	
				</div>
			</div>
		</form>
	</div>
	



  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/pb_functions.js"></script> 
  <script src="js/pb_ajax.js"></script> 
</body>
</html>
