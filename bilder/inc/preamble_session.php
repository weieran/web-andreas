<?php

// Session starten und testen ob kein Fake dabei ist.
	
	@session_start();
	
	if(!isset($_SESSION['IP'])) {
	   $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
	}
	if($_SESSION['IP'] != $_SERVER['REMOTE_ADDR']) {
		?>
	   <p>
	   Sie d�rfen nicht die Session von einem<br>
	   anderen user Benutzten. Bitte benutzen sie<br>
	   folgenden Link um zur Homepage zu gelangen.<br>
	   <a href=\"homepage.php">Zur�ck zur Homepage</a><br>
	   </p>
	   <?php
	   die(); // Aus Sicherheitsgr�nden die Abarbeitung sofort beenden
}

   if(get_magic_quotes_gpc()) {
       array_stripslashes($_GET);
       array_stripslashes($_POST);
       array_stripslashes($_COOKIE);
   }
   
?>