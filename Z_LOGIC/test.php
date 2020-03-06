<?php
/************************************************************************************************
This is a very basic example of how a Data Logic (that's 'model' to you come-lateleys) class works
It's job is get Some Data, and mash it up into a neutral language construct.  In LisP or io, that
would be a list; in Java, a Plain Java Object and in VBscript or PaleoPHP, an array.  In C, it
would be a pointer to an instance of a struct of array pointers, each addressing an array which
could contain primitive type instances, or further pointers to further instances of structs of
array pointers, pointers to arrays of vars or type char or other primitive vartypes, or possibly
function pointers.  In Javascript it would be a small puddle of puke, and in Haskel, a cubist or
other abstract representation of some data which doesn't exist at the moment and won't ever until
Cond.{lambda} evalutes to true (either synchronously or asynchronously), or until you have gone
mad contemplating the tentacled horror which your meddling has unleashed upon the world.

In this case, we use the constructor to set a class variable (or 'data member' if you're nasty)
with some truly useful data, named z.  If you wish to fight both orcs at once, Go to 143.  If
you want to know what happens to z, go to Z_CONTROL/basic.php.
************************************************************************************************/

	class test{

		var $gobjDatabase;
		var $gobjDbSelect;
		var $cdd;
		var $q;
		var $r;

		public $z=array(0);


		function q1(){
			return $this->executeSql("SELECT * from test1");
		}

		function __construct(){

			//uncomment this section when you have set up a mySQL database and made a table called test

			$this->cdd = new cdd();
			$this->q = $this->cdd->gobjDatabase;


		}



		function executeSql($gstrSql){

			$this->r = $this->q->query("SELECT * from test1");

			while($row = $this->r->fetch_assoc()) {
							//var_dump($row);
			        $resultArray[]=$row ;
	    }
			return($resultArray);
		}

	}



?>
