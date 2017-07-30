<p>
Einen Eintrag aus der lieste l&ouml;schen.<br>
</p>
<?php

if(isset($_POST['submit'])){
?><p style="color:#FF0000 "><?php
deleteValue();?>
</p><?php
}

?>

<form action="homepage.php?content=9&amp;site=wash&<?=SID?>" method="post" class="formular" style="padding:2em ">

<table border="0" colspan="2">
  <tr>
  	<td> <label for="name">Name</label> </td>
	<td> <label for="prename">Vorname</label> </td>
	<td> <label for="dateTime">Datum</label> </td>
	<td> <label for="mail">E-Mail</label> </td>
  </tr>
  <tr>
   
    <td><?php $result=loadData();?>
		<select size="1" name="name" id="name">
			<option value="0" selected>leer</option>
			<?php while($row = mysql_fetch_assoc($result)) {
			echo "<option value=\"".$row['MessageID']."\">".$row['name']."</option>\n";}
			?>
		 </select> 
	</td>
	<td><?php $result=loadData();?>
		<select size="1" name="prename" id="prename">
			<option value="0" selected>leer</option>
			<?php while($row = mysql_fetch_assoc($result)) {
			echo "<option value=\"".$row['MessageID']."\">".$row['prename']."</option>\n";}
			?>
		 </select> 
	</td>
	
	<td><?php $result=loadData();?>
		<select size="1" name="dateTime" id="dateTime">
			<option value="0" selected>leer</option>
			<?php while($row = mysql_fetch_assoc($result)) {
			echo "<option value=\"".$row['MessageID']."\">".$row['dateTime']."</option>\n";}
			?>
		 </select> 
	</td>
	<td><?php $result=loadData();?>
		<select size="1" name="mail" id="mail">
			<option value="0" selected>leer</option>
			<?php while($row = mysql_fetch_assoc($result)) {
			echo "<option value=\"".$row['MessageID']."\">".$row['mail']."</option>\n";}
			?>
		 </select> 
   </td>
  </tr>
  <tr>
  	<td> <input type="submit" name="submit" value="Daten l&ouml;schen">   </td>
	<td> <input type="reset"> </td>
	<td>  </td>
	<td>  </td>
  </tr>
</table>
</form>
<p>
<a href="homepage.php?content=9&amp;<?=SID?>">Zur&uuml;ck</a>
</p>







<?php
function deleteValue(){

	$connection = connectDB('dbGaestebuch');
	
	if(isset($_POST['name']) AND "0" != $_POST['name']){
		echo "Sie haben die ID =".$_POST['name']. " gel&ouml;scht.";
		$toDelete=$_POST['name'];
		$sql="DELETE FROM `tbMessage` WHERE `MessageID` = ".$toDelete;
		mysql_query($sql) OR die(mysql_error());
		}
	if(isset($_POST['prename']) AND "0" != $_POST['prename']){
		echo "Sie haben die ID =".$_POST['prename']. " gel&ouml;scht.";
		$toDelete=$_POST['prename'];
		$sql="DELETE FROM `tbMessage` WHERE `MessageID` = ".$toDelete;
		mysql_query($sql) OR die(mysql_error());
		}
	if(isset($_POST['email']) AND "0" != $_POST['email']){
		echo "Sie haben die ID =".$_POST['email']. " gel&ouml;scht.";
		$toDelete=$_POST['email'];
		$sql="DELETE FROM `tbMessage` WHERE `MessageID` = ".$toDelete;
		mysql_query($sql) OR die(mysql_error());
		}
	if(isset($_POST['dateTime']) AND "0" != $_POST['dateTime']){
		echo "Sie haben die ID =".$_POST['dateTime']. " gel&ouml;scht.";
		$toDelete=$_POST['dateTime'];
		$sql="DELETE FROM `tbMessage` WHERE `MessageID` = ".$toDelete;
		mysql_query($sql) OR die(mysql_error());
		}
	
	mysql_close($connection);
}


function loadData(){
	$connection = connectDB('dbGaestebuch');
	$sql = "SELECT `MessageID`,`name`,`dateTime`,`prename`,`mail`,`message`
			FROM
				`tbMessage`
			ORDER BY
				`MessageID` ASC;";
	$result = mysql_query($sql) OR die(mysql_error());
	mysql_close($connection);
	return $result;
	}
?>



