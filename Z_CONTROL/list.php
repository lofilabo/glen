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

	class list_c extends control{

		var $z;

		function list_c (){

			$rv = loginchecker("test");
			//var_dump($_SESSION['pri']);
			//var_dump($rv);
			if($rv!=1){
				return;
			}
			$logic = new list_l();

			/*
			Check to see if the order argument (o) is set.  If not, order by ID
			*/

			if(!isset($_GET["o"])){
					$this->z = ($logic->qNoOrder());
			}else{
				     if($_GET["o"]=='iu'){  //item, up
					$this->z = ($logic->qWithOrder( "item" , "asc" ));
				}elseif($_GET["o"]=='au'){	//added-date, up
					$this->z = ($logic->qWithOrder( "date_added" , "asc" ));
				}elseif($_GET["o"]=='pu'){	//priority, up
					$this->z = ($logic->qWithOrder( "priority" , "asc" ));
				}elseif($_GET["o"]=='ru'){ 	//required-date, up
					$this->z = ($logic->qWithOrder( "date_required" , "asc" ));
				}elseif($_GET["o"]=='id'){	//item, down
					$this->z = ($logic->qWithOrder( "item" , "desc" ));
				}elseif($_GET["o"]=='ad'){  //added-date, down
					$this->z = ($logic->qWithOrder( "date_added" , "desc" ));
				}elseif($_GET["o"]=='pd'){	//priority, down
					$this->z = ($logic->qWithOrder( "priority" , "desc" ));
				}elseif($_GET["o"]=='rd'){ 	//required-date, down
					$this->z = ($logic->qWithOrder( "date_required" , "desc" ));
				}
			}



			/*
			By Convention, $logic is always the instance of the logic class which must have the same name
			as this controller class.
			The results of the logic execution are stored to a member called $z;
			When the parent (control) clas is called, a View (__THIS_NAME__.em)
			is called which will the have access to the member $z.
			*/

			$this->control();
		}
	}



?>
