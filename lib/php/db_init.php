<?PHP
	include $_SERVER['DOCUMENT_ROOT'].'/lib/php/constants.php';
        $dbase = new mysqli($DB_server, $DB_usr, $DB_pw, $DB_id);
        if ($dbase->connect_error) die("Connection failed: " . $dbase->connect_error);
?>
