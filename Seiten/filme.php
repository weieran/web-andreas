<div id="Info">
		<h2>Info</h2>
		<p>Hier k&ouml;nnen sie viele verschiedene Filme ansehen. Zur benutzung des Plugins installieren
		 Sie bitte VLC Player mit der Option Plugin f&uuml;r Mozilla
		 <a href="http://www.videolan.org/doc/play-howto/fr/ch04.html#id293905" target="_blank">www.videolan.org</a></p> 
		</div>

		<div id="subTitle">
			<h2>Filme sehen mit VLC Player</h2>
		</div>
		
		<div id="Inhalt">
			<?php
				$vlc = '/usr/share/vlc/';
				$ip = $_SERVER['REMOTE_ADDR'];
				$dir = '/home/Filme';
 				$dh  = opendir($dir);
				while (false !== ($filename = readdir($dh))) {
					if ($filename[0] == '.') continue;
					if (! strstr($filename, 'avi')) continue;
					echo '<li> <a href="Seiten/launch.php?film=',$filename,'&client=',$_SERVER['REMOTE_ADDR'],'">', $filename,'</a><br />';
				}				 
			?>
			<div class="section">

				<embed type="application/x-vlc-plugin"
						 name="media"
						 autoplay="yes" loop="yes" width="300" height="200"
						 target="mmsh://www.weierand.homelinux.com:8001" />
				<br />
				<script type="text/javascript">document.media.set_volume(25)</script>
				  <a href="javascript:;" onclick='document.media.play()'>Play media</a>
				  <a href="javascript:;" onclick='document.media.stop()'>Stop media</a><br />
				  <a href="javascript:;" onclick='set_volume(document.media.get_volume()+10))'>L&auml;uter</a>
				  <a href="javascript:;" onclick='set_volume(document.media.get_volume()-10))'>Leiser</a><br>
				  Wenn das Plugin VLC nicht installiert ist auf Firefox benutzen Sie bitte diesen Link:
				  <a href="http://www.videolan.org/doc/play-howto/fr/ch04.html#id293905">www.videolan.org</a>
			</div>
								
				 <a  href="http://www.weierand.homelinux.com:8080/"  target="_blank">Mehr m&ouml;glichkeiten</a>
</div>
