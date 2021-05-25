<?php
	require './DbConnect.php';

	if(isset($_POST['aid'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$smtm = $conn->prepare("SELECT * FROM mes_villes WHERE iles_id = ". $_POST['aid']);
		$smtm->execute();
		$des_villes = $smtm->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($des_villes);
	}

	function loadIles() {
		$db = new DbConnect;
		$conn = $db->connect();

		$smtm = $conn->prepare("SELECT * FROM mes_iles");
		$smtm->execute();
		$des_iles = $smtm->fetchAll(PDO::FETCH_ASSOC);
		return $des_iles;
	}
?>