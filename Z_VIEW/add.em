
<?php
	$j =$this->z;

  if( $j = 1){
    ?>
      <h1>Register a new to-do item</h1>

      <form method='post' action="index.php?op=add">

      <table>
            <tr>
              <td colspan=2>ITEM (Free Text, 255 chr)
              <br/><textarea cols=40 rows=6 name="item" id="item"></textarea></td>
            </tr>
            <tr>
              <td>PRIORITY</td>
              <td>
                <select id="priority" name="priority">
                  <option value="1">Now</option>
                  <option value="2">High</option>
                  <option value="3">Medium</option>
                  <option value="4">Low</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>DATE REQUIRED<br><i>yyyy-mm-dd</i></td>
              <td><input type=text name="date_req" id="date_req"></td>
            </tr>

      </table>

      <input type='submit'>
      </form>

    <?php
  }else{
    ?>
      <h1>THERE IS POST.</h1>
    <?php
  }

?>
