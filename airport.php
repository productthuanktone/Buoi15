<?php 
		require "init.php";
		include "models/Airport.php";
		include "models/User.php";

		$mAiport = new Airport();
  		$mAiport->findOne(" WHERE code ='AAX' ");

  		$mUser = new User();
  		$mUser->findOne(" WHERE id=1");

  		$country = isset($_POST["country"])?$_POST["country"]:"";
  		$allAiport = $mAiport->findAll(" WHERE country='". $country ."' ");

  		$countries = $mAiport->getAllCountry();

  		/* echo "<pre>";
  		 echo $_POST["country"] . "<br/>";
  		 var_dump($_POST);
  		 die;*/

		// render template
		$view = "airport.phtml";

		require "views/layout.phtml";	



 ?>
