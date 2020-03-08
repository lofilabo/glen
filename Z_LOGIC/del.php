<?php

	class del{

		var $gobjDatabase;
		var $gobjDbSelect;
		var $cdd;
		var $q;
		var $r;

		public $z=array(0);

		function delQuery($id){
			return $this->executeSql("DELETE from items where id = "  . $id);
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
