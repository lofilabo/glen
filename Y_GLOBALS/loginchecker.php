






<?php


 function loginchecker($classFrom=""){


	if (isset($_SESSION['uid'] ) ){
	}else{
		$_SESSION['uid'] = '';
	}

	if (isset($_SESSION['uname'] ) ){
	}else{
		$_SESSION['uname'] = '';
	}

	if (isset($_SESSION['pri'] ) ){
    if($_SESSION['pri'] == 1){
      return 1;
    }
	}else{
		$_SESSION['pri'] = 0;
	}

	$fid = tell('fid');
	$uname = tell('uname');
	$pwd = tell('pwd');
	$uid = $_SESSION['uid'] = '';

	//print("Incoming : " . $fid . $uname . $pwd);

	if ($_SESSION['pri'] ==0){
		if ($uid=='') {
			if ($uname == '' ){
				//$oLogin = new Login_Screen;
				ShowLoginScreen($classFrom);
			}else{
				//$oLoginHandler = new loginhandler;
				return processlogin($uname, $pwd);
			}
		}else{
			/*to do: draw cms from here*/
		}
	}else{
		//$oComs = new cms_main;
	}

	//$oHTML->footer1();






		if ($_SESSION['pri'] ==0 or  $_SESSION['pri'] ==""){
			//$oComs = new login_screen;
			//$oComs->ShowLoginScreen($classFrom);
			$uid="";
			$_SESSION['pri'] ="";
		}else{



			if ($fid=='999999'  ){
				//$oComs = new login_screen;
				//$oComs->ShowLoginScreen($classFrom);
				$uid="";
				$_SESSION['pri'] ="";

			}else{
				if ($uid=='') {
					if ($uname == '' ){
						//$oLogin = new Login_Screen;
						ShowLoginScreen($classFrom);

					}else{
						//$oLoginHandler = new loginhandler;
						return processlogin($uname, $pwd);
					}
				}else{
					/*to do: draw cms from here*/
					return 1;
				}
			}
		}




 }


 function processlogin($uname, $pwd){

 	$rowcount=0;

 	$gstrSql = "select * from users";

	$cdd = new cdd();

  /*
	$gobjDatabase = mysql_connect($cdd->gstrHost,$cdd->gstrUser,$cdd->gstrPassword);
	mysql_select_db($cdd->gstrDatabase,$gobjDatabase);
 	$gobjDbSelect = mysql_query($gstrSql);
	while($row=mysql_fetch_assoc($gobjDbSelect)) {
		$resultArray[]=$row ;
		$rowcount++;

	}
  */
  $cdd = new cdd();
  $q = $cdd->gobjDatabase;

  $r = $q->query($gstrSql);

  while($row = $r->fetch_assoc()) {
    $resultArray[]=$row ;
		$rowcount++;
  }
var_dump($rowcount);
	if  ($rowcount>0){

			if (isset($_GET['nxtop'] ) ){

				$op = ($_GET["nxtop"]);
				//print("Processing..." . $uname . $pwd . $op);
				if (class_exists($op . "_c")){
					$_SESSION['pri'] = 1;
					$constr = "new " . $op . "_c();";
					//print($constr);
					print("<a href=index.php?op=$op>Go</a>");
					//eval($constr);
				}
			}
		return 1;
	}else{
		return 0;
	}

 }

 function ShowLoginScreen($classFrom=""){
 	//print ("ClassFrom -> " . $classFrom);
 	print("<form><input type='hidden' name='op' value='checklogin'><input type='hidden' name='nxtop' value='$classFrom'>uname<input type=text name=uname><br>pwd<input type=password name=pwd><input onClick='' type='submit'/></form>");
 }






?>
