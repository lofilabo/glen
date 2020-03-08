<?php
	/************************************************************************************************
	The Control class.
	Or rather, a subclass of the Control class with bits added.  The bits will usually consist of a
	class and a method with the same name as the file, because unless we learn to swallow CoC, we'll
	end	up with XML all over our Server Faces.

	The line
		$logic = new basic();
	invokes the Data Logic class, which sets its own $z.  We can access this and pass it directly to
	our template controller method, which is always the statement
		$this->control

	************************************************************************************************/

	class del_c extends control{

		var $z;

		function del_c (){

			$rv = loginchecker("test");
			//var_dump($_SESSION['pri']);
			//var_dump($rv);
			if($rv!=1){
				return;
			}
			$logic = new del();

			/*
			Check to see if the id argument (id) is set.
			*/
			if(isset($_GET["id"])){
					//var_dump($_GET["id"]);
				$rv = $logic->delQuery($_GET["id"]);
				if($rv==1){
					header('Location: index.php?op=list');
					$this->z = "Database Operation Succeeded";
				}else{
					$this->z = "Database Operation failed.";
				}
			}
			$this->control();
		}
	}



?>
