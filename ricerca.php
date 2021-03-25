<!DOCTYPE HTML>
<HTML><HEAD>
<?PHP
include $_SERVER['DOCUMENT_ROOT'].'/lib/php/anteprima.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/php/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/php/db_init.php';

//Genereing SQL querey
$str = 'SELECT * FROM ricetta ';
if (isset($_POST["categorie"][0])){
        $str2 = 'SELECT * FROM categoria_ricetta WHERE Categoria = "'.$_POST["categorie"][0].'"';
        $i=1;
        while (isset($_POST["categorie"][$i])){
                $str2 = $str2.' OR Categoria = "'.$_POST["categorie"][$i].'"';
                $i++;
        }
	$str = $str." INNER JOIN (".$str2.") TempQuery ON ricetta.Nome = TempQuery.Ricetta ";
}
$str = $str.' where Difficolta >= '.$_POST["difficolta_min"].' AND Difficolta <= '.$_POST["difficolta_max"].' AND Nome LIKE "%'.$_POST["nome"].'%"';
if (isset($_POST["preparazione_min"]) && $_POST["preparazione_min"] !=0) $str = $str.' AND Tempo_min >= '.$_POST["preparazione_min"];
if (isset($_POST["preparazione_max"]) && $_POST["preparazione_max"]!=0) $str = $str.' AND Tempo_min <= '.$_POST["preparazione_max"];
if (isset($_POST["cottura_min"]) && $_POST["cottura_min"] !=0) $str = $str.' AND Tempo_cottura_min >= '.$_POST["cottura_min"];
if (isset($_POST["cottura_max"]) && $_POST["cottura_max"] !=0) $str = $str.' AND Tempo_cottura_min <= '.$_POST["cottura_max"];
if (isset($_POST["categorie"][0])) $str = $str." GROUP BY ricetta.Nome";
$result=$dbase->query($str);
?><STYLE>
.anteprima{
	height: 7%;
	width: 40%;
	float: left;
}</STYLE>
</HEAD>
<BODY>
<?PHP
	disegnaHeader();
	//echo $str;
	//for ($i=0; $i<6; $i++) echo $_POST["categorie"][$i];
	while ($ricetta = $result->fetch_assoc()){
	disegnaAnteprima($ricetta);
		echo '<BR>';
}
?>
</BODY>
</HTML>
