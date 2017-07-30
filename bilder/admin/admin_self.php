
<?php
    if(isset($_POST['submit']) AND "Speichern" == $_POST['submit']) {
        if(!preg_match('/^\w+$/', trim($_POST['name']))) {
            echo "<p>\n";
            echo "    Bitte benutzen sie einen Name nur aus Alphanumerischen\n";
            echo "    Zeichen (Zahlen und Buchstaben).\n";
            echo "</p>\n";
        } else {
            // ggf. eine Emailadresse überprüfung
            // siehe dazu http://www.php-faq.de/ > Regex
			$connection = connectDB('dbGaestebuch');
			$sql = "UPDATE
                        users
                    SET
                        Name = '".trim($_POST['name'])."',
                        Email = '".addslashes(trim($_POST['email']))."'
                    WHERE
                        ID = '".$_SESSION['ID']."';";
            // bei Name kein addslashes(), da Name eh
            // nur \w+ sein kann.
            mysql_query($sql) OR die(mysql_error());
			mysql_close($connection);
            echo "<p>\n";
            echo "    Ihre Daten wurde gespeichert\n";
            echo "</p>\n";
        }
    }
    if(isset($_POST['submit']) AND "Neues Password speichern" == $_POST['submit']) {
        if(trim($_POST['password']) == "") {
            echo "<p class=\"error\">\n";
            echo "    Bitte geben sie ein Password ein, welches ich\n";
            echo "    auch Speichern soll.\n";
            echo "</p>\n";
        } elseif(trim($_POST['password']) != trim($_POST['password2'])) {
            echo "<p class=\"error\">\n";
            echo "    Bitte geben sie 2 gleiche Passwörter ein\n";
            echo "</p>\n";
        } else {
            $sql = "UPDATE
                        users
                    SET
                        Password = MD5('".trim($_POST['password'])."')
                    WHERE
                        ID = '".$_SESSION['ID']."';";
			$connection = connectDB('dbGaestebuch');
            mysql_query($sql) OR die(mysql_error());
			mysql_close($connection);
            echo "<p>\n";
            echo "    Das Password wurde gespeichert. Sie brauchen sich nicht\n";
            echo "    neu einloggen.\n";
            echo "</p>\n";
        }
    }
    $sql = "SELECT
                Name,
                Email
            FROM
                users
            WHERE
                ID = '".$_SESSION['ID']."';";
	$connection = connectDB('dbGaestebuch');
    $result = mysql_query($sql) OR die(mysql_error());
    $row = mysql_fetch_assoc($result);
	mysql_close($connection);
    echo "<form action=\"homepage.php?content=9&amp;site=self\" method=\"post\" class=\"formular\">\n";
    echo "    <p>\n";
    echo "        Eigene Daten bearbeiten\n";
    echo "    </p>\n";
    echo "    <ol>\n";
    echo "        <li>\n";
    echo "            <label for=\"name\">Name</label>\n";
    echo "            <input type=\"text\" name=\"name\" id=\"name\" value=\"".$row['Name']."\"/>\n";
    echo "        </li>\n";
    echo "        <li>\n";
    echo "            <label for=\"email\">Emailadresse</label>\n";
    echo "            <input type=\"text\" name=\"email\" id=\"email\" value=\"".$row['Email']."\"/>\n";
    echo "        </li>\n";
    echo "        <li>\n";
    echo "            <input type=\"submit\" name=\"submit\" value=\"Speichern\" />\n";
    echo "            <input type=\"reset\" name=\"submit\" value=\"Zur&uuml;cksetzen\" />\n";
    echo "            <input type=\"hidden\" name=\"".session_name()."\" value=\"".session_id()."\" />\n";
    echo "        </li>\n";
    echo "    </ol>\n";
    echo "</form>\n";
    echo "<form action=\"homepage.php?content=9&amp;site=self\" method=\"post\" class=\"formular\">\n";
    echo "    <p>\n";
    echo "        Neues Password erstellen\n";
    echo "    </p>\n";
    echo "    <ol>\n";
    echo "        <li>\n";
    echo "            <label for=\"password\">Neues Password</label>\n";
    echo "            <input type=\"password\" name=\"password\" id=\"password\" />\n";
    echo "        </li>\n";
    echo "        <li>\n";
    echo "            <label for=\"password2\">Best&auml;tigung</label>\n";
    echo "            <input type=\"password\" name=\"password2\" id=\"password2\" />\n";
    echo "        </li>\n";
    echo "        <li>\n";
    echo "            <input type=\"submit\" name=\"submit\" value=\"Neues Password speichern\" />\n";
    echo "            <input type=\"reset\" name=\"submit\" value=\"Zur&uuml;cksetzen\" />\n";
    echo "            <input type=\"hidden\" name=\"".session_name()."\" value=\"".session_id()."\" />\n";
    echo "        </li>\n";
    echo "    </ol>\n";
    echo "</form>\n";
    echo "<p>\n";
    echo "    <a href=\"homepage.php?content=9&amp;".SID."\">Zur&uuml;ck</a>\n";
    echo "</p>\n";
?>



