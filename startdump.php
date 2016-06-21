<?php

/** Имя базы данных для WordPress */
define('DB_NAME', 'u6976011***********');

/** Имя пользователя MySQL */
define('DB_USER', 'u69760117********');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'eMccEKdU8**********');

/** Имя сервера MySQL */
define('DB_HOST', 'mysql.hostinger.com.ua');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

//////////////////
die();
///////////////////

//$db = new PDO(DB_HOST, DB_USER, DB_PASSWORD);

/*$host = 'localhost';
$db = 'localhost4';

$dsn = "mysql:host=$host;dbname=$db;";*/
$arr[] = 'wp_productparse.sql';
$arr[] = 'wp_grouplikeproduct.sql';
$arr[] = 'grouplikeproductMain.sql';
$arr[] = 'grouplikeproduct2.sql';

$file_content = file($arr[3]);
//$file_content = file('wp_productparse.sql.gz');
echo "IMPORT start";
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
