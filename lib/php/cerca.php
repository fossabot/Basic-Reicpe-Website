<?PHP
function disegnaRicerca($dbase){
	echo '<FORM ID="Ricerca" action="';
	if($_SERVER['HTTPS']) echo "HTTPS://";
	else echo "HTTP://";
	echo $_SERVER['HTTP_HOST'].'/ricerca.php" method="POST"><H3>Cerca<BR></H3>';
	echo '<DIV><DIV style:"float:left">';
	echo '<LABEL>Nome</LABEL><BR>';
	echo '<INPUT type="text" name="nome"></DIV>';
	echo '<DIV style="float:right"><FIELDSET><LEGEND>Categorie</LEGEND>';
	$result = $dbase->query("SELECT * FROM categoria");
	while ($categoria = $result->fetch_assoc()) echo '<SPAN stype="white-space:nowrap"><LABEL>'.$categoria["Nome"].'</LABEL><INPUT type="checkbox" name="categorie[]" value="'.$categoria["Nome"].'"></SPAN>';
	echo '</FIELDSET></DIV>';
	echo '<DIV style="float:left"><BR><FIELDSET>';
	echo '<LABEL>Difficoltà</LABEL><BR>';
	echo 'Min: <SELECT name="difficolta_min">';
	for ($i = 1; $i<=5; $i++) echo '<OPTION value="'.$i.'">'.$i.'</OPTION>';
	echo '</SELECT> Max: <SELECT name="difficolta_max">';
	for ($i = 1; $i<=4; $i++) echo '<OPTION value="'.$i.'">'.$i.'</OPTION>';
	echo '<OPTION value="5" selected>5</OPTION></SELECT><BR>';
	echo '<LABEL>Preparazione (Minuti)</LABEL><BR>';
	echo 'Min: <INPUT type="number" name="preparazione_min"> Max: <INPUT type="number" name="preparazione_max"><BR>';
	echo '<LABEL>Cottura (Minuti)</LABEL><BR>';
	echo 'Min: <INPUT type="number" name="cottura_min"> Max: <INPUT type="number" name="cottura_max">';
	echo '</FIELDSET></DIV>';
	echo '</DIV><DIV style="bottom:0"><INPUT type="submit" value="Cerca"></DIV></FORM>';
}
?>
