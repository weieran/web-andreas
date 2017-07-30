
<?php
    function array_stripslashes(&$var)
    {
        if(is_string($var)) {
            $var = stripslashes($var);
        } else {
            if(is_array($var)) {
                foreach($var AS $key => $value) {
                    array_stripslashes($var[$key]);
                }
            }
        }
    }
?>

<?php
include "variablen.php"
?>



<?php
    function login_right($id, $pass,$datebank)
    {	$connection = connectDB($datebank);
        $sql = "SELECT
                    COUNT(*) as Anzahl
                FROM
                    users
                WHERE
                    ID = '".$id."' AND
                    Password = MD5('".$pass."');";
        $result = mysql_query($sql) OR die(mysql_error());
        $row = mysql_fetch_assoc($result);
        mysql_free_result($result);
        return $row['Anzahl'];
    }
?>

<?php
function saveMessageInDB()
{
	$name = $_POST['name'];
	$prename = $_POST['prename'];
	$message = $_POST['text'];
	$mail = $_POST['mail'];
	

	//Falls der User die Länge der Textbox überschreitet, wird die Nummer des Textfeldes zurückgegeben
	if(strlen($name) >= 50)
	{
		return 1;
	}
	
	if(strlen($prename) >= 50)
	{
		return 2;
	}
	
	if(strlen($mail) >= 50)
	{
		return 3;
	}
	
	$connection = connectDB('dbGaestebuch');
	$sqlQuerry = "INSERT INTO tbMessage (prename , name , message ,mail, dateTime ) VALUES ('".$prename."', '".$name."', '".$message."', '".$mail."',NOW())";
	
	mysql_query($sqlQuerry,$connection);
	
	mysql_close($connection);
	return 0;
}


function connectDB($datebank)
{
	$linkID = mysql_connect('localhost', 'weierand', '') OR die(mysql_error());
	mysql_select_db($datebank, $linkID) OR die(mysql_error());
	return $linkID;
}
 
function loadMessagesFromDB($datebank)
{
	$connection = connectDB($datebank);
	$sqlQuerry = "SELECT * FROM tbMessage ORDER BY dateTime DESC";
	$result = mysql_query($sqlQuerry,$connection);

	while($message= mysql_fetch_array($result))		//schlaufenweise werden nun die wörter mit dem test und dem titel verglichen
	{
		?>
		<div id="Message">
		From: <?=$message['name']?> <?=$message['prename']?>  <?=$message['dateTime']?> <br>
		<?=$message['mail']?>
		<p><?=$message['message']?>
		</p>
		</div>
		<br>
		<?php
	}	
	mysql_close($connection);
}
?>


