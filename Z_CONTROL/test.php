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

	class test_c extends control{

		var $z;

		function test_c (){

			$rv = loginchecker("test");
			//var_dump($_SESSION['pri']);
			//var_dump($rv);
			if($rv!=1){
				return;
			}
			/*
			By Convention, $logic is always the instance of the logic class which must have the same name
			as this controller class.
			The results of the logic execution are stored to a member called $z;
			When the parent (control) clas is called, a View (__THIS_NAME__.em)
			is called which will the have access to the member $z.
			*/
			$logic = new test();
			$this->z=($logic->q1());
			$this->control();
		}
	}



?>
