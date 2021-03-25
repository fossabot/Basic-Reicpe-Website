<?PHP
	function scriviDifficolta($livello){
		for ($i = 0; $i<$livello; $i++) echo '★';
		for ($i = 0; $i<(5-$livello); $i++) echo '☆';
}
?>
