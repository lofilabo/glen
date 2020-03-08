
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

	if ($_SESSION['pri'] ==0){
		if ($uid=='') {
			if ($uname == '' ){
				ShowLoginScreen($classFrom);
			}else{
				return processlogin($uname, $pwd);
			}
		}else{
		}
	}else{
	}

		if ($_SESSION['pri'] ==0 or  $_SESSION['pri'] ==""){
			$uid="";
			$_SESSION['pri'] ="";
		}else{



			if ($fid=='999999'  ){
				$uid="";
				$_SESSION['pri'] ="";
        header('Location: index.php?op=list');
			}else{
				if ($uid=='') {
					if ($uname == '' ){
						ShowLoginScreen($classFrom);
					}else{
						return processlogin($uname, $pwd);
					}
				}else{
					return 1;
				}
			}
		}
 }


 function processlogin($uname, $pwd){
 	$rowcount=0;
 	$gstrSql = "select * from users where name='". $uname ."' and pwd = '". $pwd ."'";
	$cdd = new cdd();
  $cdd = new cdd();
  $q = $cdd->gobjDatabase;
  $r = $q->query($gstrSql);

  while($row = $r->fetch_assoc()) {
    $resultArray[]=$row ;
		$rowcount++;
  }

	if  ($rowcount>0){

    $filename = "userlog.txt";
    $file = fopen( $filename, "a" );
    fwrite( $file, $uname . "\t" . gmdate('Y-m-d h:i:s') . "\n" );
    fclose( $file );

			if (isset($_GET['nxtop'] ) ){
				$op = ($_GET["nxtop"]);
				if (class_exists($op . "_c")){
					$_SESSION['pri'] = 1;
					$constr = "new " . $op . "_c();";
          header('Location: index.php?op=list');
				}
			}
		return 1;
	}else{
    header('Location: index.php?op=list');
		return 0;
	}

 }

 function ShowLoginScreen($classFrom=""){
 	//print ("ClassFrom -> " . $classFrom);
 	print("<form><input type='hidden' name='op' value='checklogin'><input type='hidden' name='nxtop' value='$classFrom'>uname<input type=text name=uname><br>pwd<input type=password name=pwd><input onClick='' type='submit'/></form>");
 }






?>
