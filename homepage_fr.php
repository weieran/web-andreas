<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>homepage.php</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
<link rel="icon" HREF="bilder/favicon.ico" TYPE="image/ico"> 
</head>

<body>
<div id="oben">
<h1>Homepage von Andreas Weier</h1>
</div>



<div id="Navigation">
<ul>
  <li><a href="homepage_fr.php?content=1">Mes Hobbys</a></li><br>

	<li><a href="homepage_fr.php?content=2">Ecole</a></li><br>
	
  <li><a href="homepage_fr.php?content=3">Vacances en Espagne</a></li><br>
  
  <li><a href="homepage_fr.php?content=4">Mes Fotos</a></li><br>
  
  <li><a href="homepage.php?content=8">&Eacute;couter de la Musique </a></li>
  <br>
  
  <li><a href="homepage_fr.php?content=5&action=1">Livre d'Or</a></li><br>
  
  <li><a href="homepage_fr.php?content=6">Divers liens</a></li><br>

	<li><a href="homepage_fr.php?content=7">Home</a></li>
</ul>
</div>

	<?php
		switch($_GET['content'])
		{
		case 1:?>
		<div id="Info">
		<h2>Info</h2>
		<p>Diese Seite zeigt ihnen meine Hobbies auf</p> 
		</div>

		<div id="subTitle">
			<h2>Meine Hobbys</h2>
		</div>
		
		<div id="Inhalt">
		Meine Hobbys sind Radfahren, Schwimmen und ganz allgemein allerlei Bergsportarten.<br>
		Wenn ich im Winter gerne Ski touren gehe, gehe ich im Sommer am liebsten irgendwo mit Andrea, der Familie oder Freunde in die Bergen.<br>
		Da ich aber eigentlich einen competitiver Mensch bin, treibe ich gerne Triathlon um mich auszugeben.
		</div>
	    <?php
		break;
		case 2:?>
		<div id="Info">
		<h2>Info</h2>
		<p>Auf dieser Seite finden Sie einige Informationen über meine Schule sowie meine verschiedenen Arbeiten und Jobs.</p> 
		</div>

		<div id="subTitle">
			<h2>Schule und Arbeit</h2>
		</div>
		
		<div id="Inhalt">
		Zurzeit studiere ich in Winterthur im zeiten Studienjahr Mechatronik.<br>
		Meine Lehre als Automatiker habe ich in Lausanne im Jahr 2004 bei Bobst SA absolviert.<br>
		Im Sommer habe ich einige Zeit in der Entwicklung von Verpackungsmaschienen gearbeitet.<br>
		<h4>Hier finden sie noch ein paar interessante Links zur Schule</h4>
		<ul id="liste">
		<li><a href="Arbeiten/Physik.pdf" target="_blank"> Physik: Abspringender Ball mit Latex</a> </li>
		<li><a href="Arbeiten/Versuch_3.pdf" target="_blank">Elektrizitätslehre: Transformatorersatzschaltung</a></li>
		<li><a href="www.bobstgroup.com">Meine Lehrfirma: Bobst Group</a></li>
		</ul>
		</div>
		
	<?php
		break;
		case 3:?>
		<div id="Info">
		<h2>Info</h2>
		<p>Auf dieser Seite finden Sie alles über die Ferien in Calpe.</p> 
		</div>

		<div id="subTitle">
			<h2>Ferien in Calpe</h2>
		</div>
		
		<div id="Inhalt">
		Gibt es etwas schöneres als im Frühling schon mit 25° Fahrrad zu fahren oder im Sommer im warmen Sand zu liegen oder im 28° Wasser zu schwimmen?<br>
		Natürlich schon. N&auml;mlich abends eine Servesa zu Trinken!
		<h4>Wenn Sie interessiert sind, schauen Sie doch mal die <a href="http://home.zhwin.ch/~weierand">Calpe Seite an.</a></h4>
		<ul id="liste">
		<li><a href="Arbeiten/Physik.pdf" target="_blank"> Physik: Abspringender Ball mit Latex</a> </li>
		<li><a href="Arbeiten/Versuch_3.pdf" target="_blank">Elektrizitätslehre: Transformatorersatzschaltung</a></li>
		<li><a href="www.bobstgroup.com">Meine Lehrfirma: Bobst Group</a></li>
		</ul>
		</div>
	<?php
		break;
		case 4:?>
		<div id="Info">
		<h2>Info</h2>
		<p>Hier können Sie wunderschöne Bilder anschauen.</p> 
		</div>

		<div id="subTitle">
			<h2>Fotogallery</h2>
		</div>
		
		<div id="Inhalt">
		
		<iframe src="Gallery/gallery.html" width="100%" height="550"  frameborder="0" name="Fotogallery">
  		<p>Ihr Browser kann leider keine eingebetteten Frames anzeigen:
  		Sie k&ouml;nnen die eingebettete Seite &uuml;ber den folgenden Verweis
  		aufrufen: <a href="Gallery/gallery.htm">Fotogallery</a></p>
		</iframe>
		
		</div>
	<?php
		break;
		case 5:?>
		<div id="Info">
		<h2>Info</h2>
		<p>Auf dieser Seite können Sie einen Gästebucheintrag schreiben</p> 
		</div>

		<div id="subTitle">
			<h2>G&auml;stebuch</h2>
		</div>
		
		<div id="Inhalt">
		<form action="index.php?content=5&action=2" method="post">
		<?php
		if($_GET['action'] == 2)
		{
			$resultValue = saveMessageInDB(); //sagt, ob gespeichert oder fehler, wenn fehler, die nummer des feldes
			switch($resultValue)
			{
			case 0;
			?>
			<p>Ihr Name: <br><input type="text" name="name" /></p>
			<p>Ihr Vorname: <br><input type="text" name="prename" /></p>
			<p>Ihr Text<br>
			<textarea name="text" ROWS="8" COLS="30" ></TEXTAREA></p>
			<p>Ihr email: <br>
			  <input type="text" name="mail" /></p>
			<p><input type="submit" /></p>
			<font color="#FF0000">Erfolgreich gespeichert</font>
			<?php
			break;
			case 1;
			?>
			<p>Ihr Name: <br><input type="text" name="name" /></p>
			<p>Ihr Vorname: <br><input type="text" name="prename" value="<?=$_POST['prename']?>"/></p>
			<p>Ihr Text<br>
			<textarea name="text" ROWS="8" COLS="30"  ><?=$_POST['text']?></TEXTAREA></p>
			<p>Ihr email: <br>
			  <input type="text" name="mail" value="<?=$_POST['mail']?>"/></p>
			<p><input type="submit" /></p>
			<font color="#FF0000">Name zu lang</font>
			<?php
			break;
			case 2;
			?>
			<p>Ihr Name: <br><input type="text" name="name" value="<?=$_POST['name']?>" /></p>
			<p>Ihr Vorname: <br><input type="text" name="prename"/></p>
			<p>Ihr Text<br>
			<textarea name="text" ROWS="8" COLS="30" ><?=$_POST['text']?></TEXTAREA></p>
			<p>Ihr e-mail: <br><input type="text" name="mail" value="<?=$_POST['mail']?>"/></p>
			<p><input type="submit" /></p>
			<font color="#FF0000">Vorname zu lang</font>
			<?php
			break;
			case 3;
			?>
			<p>Ihr Name: <br><input type="text" name="name" value="<?=$_POST['name']?>" /></p>
			<p>Ihr Vorname: <br><input type="text" name="prename" <?=$_POST['prename']?>/></p>
			<p>Ihr Text<br>
			<textarea name="text" ROWS="8" COLS="30"><?=$_POST['text']?></TEXTAREA></p>
			<p>Ihr e-mail: <br><input type="text" name="mail"/></p>
			<p><input type="submit" /></p>
			<font color="#FF0000">Mailadresse zu lang</font>
			<?php
			break;
			}
		}
		else
		{
		?>
			<p>Ihr Name: <br><input type="text" name="name" /></p>
			<p>Ihr Vorname: <br><input type="text" name="prename" /></p>
			<p>Ihr Text<br>
			<textarea name="text" ROWS="8" COLS="30" ></TEXTAREA></p>
			<p>Ihr e-mail: <br><input type="text" name="mail" /></p>
			<p><input type="submit" /></p>
		<?php
		}
		?>		  	
		</form>
		<hr>
		<?php
		loadMessagesFromDB()
		?>
		</div>

		<?php
		break;
		case 6:?>
				<div id="Info">
		<h2>Info</h2>
		<p>Hier k&ouml;nnen sie viele verschiedene links finden. 
		Wenn Sie zuf&auml;llig auf eine Authentifikation stossen, dann melden Sie sich bitte bei:<a href="mailto:weierand@gmx.ch"></a>.<br>
		Ich hoffe Sie werden hier alles finden was Sie suchen.
		</p> 
		</div>

		<div id="subTitle">
			<h2>Liens</h2>
		</div>
		
		<div id="Inhalt">
			<ul>
				<li>
				<a href="/geschuetzt/musik/">Musique (avec authentification)</a></li>
				<li>
				<a href="http://weierand.homelinux.com:8888/">StreamingMedia</a></li>
			</ul>
						
		</div>		
		<?php
		break;
		case 7:?>
		
		<div id="Info">
		<h2>Info</h2>
		<p>Schauen Sie sich mal meine Homepage ein bisschen an.<br>
		Andreas
		</p> 
		</div>

		<div id="subTitle">
			<h2>Home</h2>
		</div>
		
		<div id="Inhalt" style="background-image:url(bilder/hoele_Spanien.jpg) ">
			<h2 style="color:#FFFF66 ">La Traduction n'a malheureusement pas encore &ouml;t&ouml; faite.</h2>
		</div>
		
	
		<?php
		break;
		case 8:?>
		
		<div id="Info">
		<h2>Info</h2>
		<p>Hier k&ouml;nnen Sie Musik h&ouml;ren<br>
		Ich danke f&uuml;r den StreamServer von Gnump3d.
		</p> 
		</div>

		<div id="subTitle">
			<h2>Streamserver</h2>
		</div>
		
		<div id="Inhalt">
			<iframe src="http://weierand.homelinux.com:8888/" width="100%" height="650"  frameborder="0" name="streamserver"></iframe>
		</div>
		
	
		<?php
		break;
		} 
	?>

<div id="unten">
	Cela n'est que le bas de la page
</div>

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
	
	$connection = connectDB();
	$sqlQuerry = "INSERT INTO tbmessage (prename , name , message ,mail, dateTime ) VALUES ('".$prename."', '".$name."', '".$message."', '".$mail."',NOW())";
	
	mysql_query($sqlQuerry,$connection);
	
	mysql_close($connection);
	return 0;
}

function connectDB()
{
	$linkID = mysql_connect('localhost', 'weierand', '');
	mysql_select_db('dbGaestebuch', $linkID);
	return $linkID;
}
 
function loadMessagesFromDB()
{
	$connection = connectDB();
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

</body>
</html>

