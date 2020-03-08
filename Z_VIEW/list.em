

<script>

function deleteTDM(){
  var elems= document.querySelectorAll('[name=bulkdelete]');
  var alldelitems="";

              for (var i=0;i<elems.length;i++)
              {
                  var isChecked =elems[i].checked;
                  if(isChecked == true){
                    alldelitems = alldelitems + "" + elems[i].id + ",";
                  }
              }

              var ask = window.confirm("Confirm Bulk Delete of ALL selected items?\nYou will not be prompted for each item, and the operation cannot be undone.");
              if (ask) {
                  window.location.href = "index.php?op=del&ids=" + alldelitems;
              }

}

function deleteTDD( id ) {
    var ask = window.confirm("Confirm Delete of this item?");
    if (ask) {
        window.location.href = "index.php?op=del&id=" + id;
    }
}

</script>

<?php
	$j =$this->z;
	//var_dump($j);

echo("<table>");

echo( "<tr>" );
echo( "<td>ID</td>" );
echo( "<td>ITEM <a href='index.php?op=list&o=iu'>UP</a>/<a href='index.php?op=list&o=id'>DN</a></td>" );
echo( "<td>ADD DATE <a href='index.php?op=list&o=au'>UP</a>/<a href='index.php?op=list&o=ad'>DN</a></td>" );
echo( "<td>PRIORITY <a href='index.php?op=list&o=pu'>UP</a>/<a href='index.php?op=list&o=pd'>DN</a></td>" );
echo( "<td>REQ DATE <a href='index.php?op=list&o=ru'>UP</a>/<a href='index.php?op=list&o=rd'>DN</a></td>" );
echo( "" );
echo( "<td><a href='javascript:deleteTDM();'>DELETE</br>CHECKED</a></td>" );
echo( "" );
echo( "</tr>" );

foreach ($j as $v) {
	echo( "<tr>" );
	echo( "<td>" . $v['id']  . "</td>" );
	echo( "<td>" . $v['item']  . "</td>" );
	echo( "<td>" . $v['date_added']  . "</td>" );
	echo( "<td>" . $v['priority']  . "</td>" );
	echo( "<td>" . $v['date_required']  . "</td>" );
	echo( "" );
	echo( "<td><input type=checkbox id='". $v['id'] ."' name='bulkdelete' value='". $v['id'] ."' />&nbsp;&nbsp;<a href='javascript:deleteTDD(". $v['id'] .");'>DELETE</a></td>" );
	echo( "" );
	echo( "</tr>" );

}

echo("</table>");

?>
