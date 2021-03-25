<?PHP
	function disegnaHeader(){
		echo '<A href="';
		if ($_SERVER["HTTPS"]) echo 'HTTPS://';
		else echo "HTTP://";
		echo $_SERVER["HTTP_HOST"].'"><H1 align="center">Ricette Italiane<BR></H1></A>';
	}
?>
