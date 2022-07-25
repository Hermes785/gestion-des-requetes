<?php
require_once('db.php');


if (isset($_GET['id'])) {
	$supiid = $_GET['id'];
     $Connection;
	$query = "DELETE FROM req WHERE id=$supiid ";
	$execute = mysqli_query($Connection, $query);

	if ($execute) {
		echo "suppression effectuer";
		header("location:requetes.php");
		# code...
	} else {
		echo "echec de la suppression";
		header("location:requetes.php");
	}
}
