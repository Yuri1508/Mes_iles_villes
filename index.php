<!DOCTYPE html>
<html>
<head>
	<title>Destination</title>
	<link rel="stylesheet" href="./bootstrap.min.css">
	<script src="./jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#iles").change(function(){
				var aid = $("#iles").val();
				$.ajax({
					url: 'data.php',
					method: 'post',
					data: 'aid=' + aid
				}).done(function(des_villes){
					console.log(des_villes);
					des_villes = JSON.parse(des_villes);
					$('#villes').empty();
					des_villes.forEach(function(ville){
						$('#villes').append('<option>' + ville.villes + '</option>')
					});
				})
			})
		})
	</script>
</head>
<body>
	<div class="container">
		<h1 class="text-center">Choisit ta destination</h1>
		<hr>
		<div class="row">
			<form role="form" method="post" action="">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="iles">Iles :</label>
							<select class="form-control" id="iles" name="iles">
								<option selected="" disabled="">Selectionne ton île :</option>
								<?php
									require './data.php';
									$des_iles = loadIles();
									foreach ($des_iles as $des_ile) {
										echo "<option id='".$des_ile['id']."' value='".$des_ile['id']."'>".$des_ile['iles']."</option>";
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="books">Villes :</label>
							<select class="form-control" id="villes" name="villes"></select>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>