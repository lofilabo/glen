<style>
table, th, td {
  border: 1px solid black;
	border-collapse: collapse;
}

th, td {
  padding: 15px;
}

</style>

<script>
function deleteTDD( id ) {
    var ask = window.confirm("Confirm Delete of this item");
    if (ask) {
        window.alert(id);

        window.location.href = "window-location.html";
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
echo( "<td></td>" );
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
	echo( "<td><a href='javascript:deleteTDD(". $v['id'] .");'>DELETE</a></td>" );
	echo( "" );
	echo( "</tr>" );

}

echo("</table>");

?>
