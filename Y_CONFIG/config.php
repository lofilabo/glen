<?php

	class cdd{
		var $gstrHost = "localhost";
		var $gstrDatabase = "bls1";
		var $gstrUser = "richard";
		var $gstrPassword = "richard";
		var $gstrVersion = "0.10";

		function cdd(){
			$this->gobjDatabase = mysqli_connect($this->gstrHost,$this->gstrUser,$this->gstrPassword,$this->gstrDatabase);
			//this is SUPER-IMPORTANT if you want
			//nonroman characters to show up ;)
			$this->gobjDatabase->query('SET NAMES utf8');
		}

	}

?>
