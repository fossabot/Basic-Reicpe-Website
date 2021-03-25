<!DOCTYPE HTML>
<HTML><HEAD>
<?PHP
	include $_SERVER['DOCUMENT_ROOT'].'/lib/php/cerca.php';
	include $_SERVER['DOCUMENT_ROOT'].'/lib/php/anteprima.php';
	include $_SERVER['DOCUMENT_ROOT'].'/lib/php/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/lib/php/db_init.php';
?>
<TITLE>Ricette Italiane</TITLE>
<STYLE>
.anteprima{
        height:7%;
        width: 45%;
}
</STYLE>
</HEAD><BODY><?PHP disegnaHeader(); ?>
<?PHP
	$result = $dbase->query("SELECT * FROM ricetta ORDER BY RAND() LIMIT 10");
	echo '<DIV style="float:left"><H3>10 riecette casuali<BR></H3>';
	while ($ricetta=$result->fetch_assoc()) disegnaAnteprima($ricetta);
	echo '</DIV>';
	echo '<DIV style="width:40%; border:1px; position:absolute; right:0">';
	disegnaRicerca($dbase);
	echo '</DIV>';
?>
</BODY></HTML>
