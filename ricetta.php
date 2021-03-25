<!DOCTYPE HTML>
<HTML><HEAD>
<?PHP
	include $_SERVER['DOCUMENT_ROOT'].'/lib/php/difficolta.php';
	include $_SERVER['DOCUMENT_ROOT'].'/lib/php/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/lib/php/db_init.php';

	echo "<TITLE>";
	$result = $dbase->query("SELECT * from ricetta where Nome = '".$_GET["ric"]."'");
	if ($result->num_rows == 0){
		http_response_code(404);
		echo '</TITLE></HEAD><BODY><p><H1>Errore 404<H1></p><H3>Ricetta non trovata. Torna alla <a href="http://ricette.valentiniomar.tk">pagina iniziale</a>.</H3></BODY></HTML>';
		die();
	}
	$ricetta = $result->fetch_assoc();
	echo $ricetta["Nome"]."</TITLE>";
?>
<meta property="og:site_name" content="Ricette Italiane">
<meta property="og:type" content="website">
<meta property="og:url" content="http://ricette.valentiniomar.tk/ricetta.php?ric=<?PHP echo $_GET["ric"]; ?>">
<meta property="og:title" content="<?PHP echo $ricetta["Nome"]; ?>">
<meta property="og:image" content="http://ricette.valentiniomar.tk<?PHP echo $ricetta["Copertina"]; ?>">
<meta property="og:description" content="<?PHP echo $ricetta["Intestazione"]; ?>">
</HEAD><BODY>
<?PHP
	disegnaHeader();
	echo '<H1 align="center">'.$ricetta["Nome"].'</H1><br>';
	echo '<center><img width=50% src="'.$ricetta["Copertina"].'"></center><br><br>';
	echo '<div><div style="float: left">';
	$result = $dbase->query('SELECT Categoria FROM categoria_ricetta WHERE Ricetta = "'.$ricetta["Nome"].'"');
	while ($categoria=$result->fetch_assoc()){
		echo '<div> '.$categoria["Categoria"].' </div>';
	}
	echo '</div>';
	echo '<table align="right" border=0><tr><td>Difficoltà: ';
	scriviDifficolta($ricetta["Difficolta"]);
	echo '</td><td>Tempo di preparazione: '.$ricetta["Tempo_min"].'m</td><td>Tempo di cottura: '.$ricetta["Tempo_cottura_min"].'m</td></tr></table>';
	echo '</div><br><br>';
	echo $ricetta["Intestazione"]."<br><br>";
	echo '<H2 align="center">Ingredienti</H2><br><div align="center">';
	$result = $dbase->query('SELECT * FROM ingredienti WHERE Ricetta = "'.$ricetta["Nome"].'"');
        while ($ingrediente=$result->fetch_assoc()){
                echo '<div> '.$ingrediente["Nome"].': '.$ingrediente["Quantita"].$ingrediente["Unita"].' </div>';
        }
	echo '</div>';
	echo '<H2 align="center">Procedimento</H2><br><br><div>';
	$result = $dbase->query('SELECT Immagine,Testo FROM procedimento WHERE Ricetta = "'.$ricetta["Nome"].'" ORDER BY Indice');
	while ($passaggio=$result->fetch_assoc()){
                 echo '<div><center><img width=50% src="'.$passaggio["Immagine"].'"></center><br><br>';
		 echo '<div>'.$passaggio["Testo"].'</div></div>';
        }
        echo '</div>'

?>
</BODY>
</HTML>
