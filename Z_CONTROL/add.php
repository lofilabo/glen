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

	class add_c extends control{

		var $z;
		var $post;

		function add_c (){

			$rv = loginchecker("test");
			//var_dump($_SESSION['pri']);
			//var_dump($rv);
			if($rv!=1){
				return;
			}
			$logic = new add_d();

			/*
			Check to see if the id argument (id) is set.
			*/
			//var_dump($_POST);
			if(is_null($_POST['item'])){
				//no completed post is coming back; show the form
				$this->z = 1;

			}else{
				//The completed form is returning;
				$this->post->item  = $_POST["item"];
				$this->post->prior = $_POST["priority"];
				$this->post->dater = $_POST["date_req"];
				//var_dump($this->post);
				$rv = $logic->addQuery( $this->post );
				//echo( $rv );
				//die;
				$this->z = 0;
				header('Location: index.php?op=list');
			}
			$this->control();
		}
	}



?>
