<?php

define('DB_NAME', 'localhost4');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

echo "IMPORT Start";
//die();
//$db = new PDO(DB_HOST, DB_USER, DB_PASSWORD);

/*$host = 'localhost';
$db = 'localhost4';

$dsn = "mysql:host=$host;dbname=$db;";*/

$file_content = file('wp_productparse.sql');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query = "";
$dot = '.';
foreach ($file_content as $sql_line) {
	if (trim($sql_line) != "" && strpos($sql_line, "--") === false) {
		$query .= $sql_line;
		if (substr(rtrim($query), -1) == ';') {
			//echo $query;
			echo $dot;
			$result = mysqli_query($link, $query) or die(mysqli_error($link));
			$query = "";
		}
	}
}
echo "IMPORT Fin2";
die();

/*$opt = array(
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
);
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD, $opt);
$sql = file_get_contents('wp_productparse.sql');

$qr = $pdo->exec($sql);
echo "IMPORT Fin";*/

?>
