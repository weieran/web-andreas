<div id="Info">
		<h2>Info</h2>
		<p>Sie sind jetzt auf der Adminseite</p> 
</div>

<div id="subTitle">
	<h2>Administration</h2>
</div>
		
<div id="Inhalt">
		
<?php
	   	 
  if(isset($_GET['action']) AND ("logout" == $_GET['action'])) {
        session_destroy();
		?>
        <p>
        Sie haben sich ausgeloggt. Um wieder in den Adminbereich
        zu kommen m&uuml;ssen sie sich wieder Einloggen
        </p>
		<?php
				
    } else {
        if(isset($_POST['UserID']) AND '0' == $_POST['UserID']) {
		?>
         <p>
         Bitte w&auml;hlen sie einen Benutzernamen aus.
         </p>
		 <?php
		 displayLogin();
		
        } else {
            if(isset($_POST['UserID'], $_POST['Password']) AND
               login_right(addslashes($_POST['UserID']),addslashes($_POST['Password']),'dbGaestebuch')) {
                $_SESSION['ID'] = $_POST['UserID'];
            }
            if(isset($_SESSION['ID'])) {
               if(isset($_GET['site']) AND isset($admin_site[$_GET['site']])) {
                    include $admin_site[$_GET['site']];
                } else {
                    include "admin_menu.php";
                    // Das Hauptmenu vom Adminbereich laden
                }
            } 
			else {
                if(isset($_POST['submit'])) {
                     // Der Submit-Button wurde gedrückt
                     // aber der Login ist falsch. Deshalb
                     // erstellen wir eine Fehlermeldung
                     echo "<p class=\"error\">\n";
                     echo "    Ung&uuml;ltiges Password.\n";
                     echo "</p>\n";
                }
             displayLogin();
            }
        }
    }
?>
</div>

<?php
function displayLogin(){?>		
		<form action="homepage.php?content=9" method="post" class="admin_form">
                <table>
                <tr>
                <th colspan="2">
                </th>
                </tr>
                <tr>
                <td>
                <label for="name">Name:</label>
                </td>
                <td>
				<?php
				$connection = connectDB('dbGaestebuch');
                $sql = "SELECT
                            `ID`,
                            `Name`
                        FROM
                            `users`
                        ORDER BY
                            `Name` ASC;";
                $result = mysql_query($sql) OR die(mysql_error());
                echo "                <select size=\"1\" name=\"UserID\" id=\"name\">\n";
                echo "                    <option value=\"0\" selected=\"selected\">Bitte w&auml;hlen</option>\n";
                while($row = mysql_fetch_assoc($result)) {
                    echo "<option value=\"".$row['ID']."\">".$row['Name']."</option>\n";}
				mysql_close($connection);
				?>
                               
                	</select>
                            </td>
                        </tr>
                        <tr>
                           <td>
                                <label for="password">Password:</label>
                           </td>
                          <td>
                                <input type="password" name="Password" id="password"/>
                          </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                               <input type="submit" name="submit" value="Abschicken" />
                                <input type="reset" name="submit" value="Zur&uuml;cksetzen" />
                            </td>
                        </tr>
                    </table>
                </form>
				<?php
}
?>
		
<?php
    //error_reporting(E_ALL);
    //setcookie("testcookie", "testwert", time()+(60*60));
    // Cookie für 1 Stunde setzen.
    //if(isset($_COOKIE['testcookie'])) {
    //    echo "User hat den Cookie akzeptiert\n";
    //} else {
    //    echo "User hat den Cookie nicht akzeptiert\n";
    //}        
?>