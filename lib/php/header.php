<?PHP
	function disegnaHeader(){
		echo '<CENTER><A href="';
		if ($_SERVER["HTTPS"]) echo 'HTTPS://';
		else echo "HTTP://";
		echo $_SERVER["HTTP_HOST"].'"><DIV id="banner"><H1 align="center">Ricette Italiane<BR></H1></DIV></A></CENTER>';
	}

	//function includeStylesheets(){
	echo '<link rel="stylesheet" href="HTTP://'.$_SERVER['HTTP_HOST'].'/lib/css/main.css">';
	//}
?>
