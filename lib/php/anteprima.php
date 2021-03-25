<?PHP
	include $_SERVER['DOCUMENT_ROOT'].'/lib/php/difficolta.php';

	function disegnaAnteprima($ricetta){
		echo '<A HREF="';
		if ($_SERVER['HTTPS']) echo 'HTTPS://';
		else echo 'HTTP://';
		echo $_SERVER["HTTP_HOST"].'/ricetta.php?ric='.$ricetta["Nome"].'">';
		echo '<DIV class="anteprima">';
		echo '<IMG src="'.$ricetta["Copertina"].'" width=40% style="float: left">';
		echo '<TABLE>';
		echo '<TR><TD><H4 align="center">'.$ricetta["Nome"].'</H4></TD><TD>Difficoltà: ';
		scriviDifficolta($ricetta["Difficolta"]);
		echo '</TD></TR><TR><TD>Preparazione: '.$ricetta["Tempo_min"].'m</TD><TD align="right">Cottura:'.$ricetta["Tempo_cottura_min"];
		echo 'm</TD></TR><TR><TD colspan="2">'.$ricetta["Intestazione"];
		echo '</TD></TR></TABLE>';
		echo '</DIV></A>';
}
?>
