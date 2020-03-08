<?php

	class add_d{

		var $gobjDatabase;
		var $gobjDbSelect;
		var $cdd;
		var $q;
		var $r;

		public $z=array(0);

		function addQuery($obj){

			$ddate = date('Y-m-d');
			//echo $ddate;
			//die;

			$sql = "insert into items (item,  priority, date_required, date_added) ";
			$sql = $sql . "values (";
			$sql = $sql . "'". $obj->item ."' , ";
			$sql = $sql . "'". $obj->prior ."' , ";
			$sql = $sql . "'". $obj->dater ."' , ";
			$sql = $sql . "'". $ddate ."'  ";
			$sql = $sql . ")";
			//echo($sql);
			//die;
			return $this->executeSql($sql);
		}


		function __construct(){

			$this->cdd = new cdd();
			$this->q = $this->cdd->gobjDatabase;
		}



		function executeSql($gstrSql){

			$this->r = $this->q->query($gstrSql);

			return($this->r);
		}

	}



?>
