<?php
if($_SERVER['REQUEST_METHOD'] !== "POST"){
	header('Location: https://flowerhome.info/');
	exit();
}
define('DB_USERNAME', 'wp055586_wp1');
define('DB_PASSWORD2', 'mppuffp1ze');
define('DSN', 'mysql:host=localhost;port=3306;dbname=wp055586_wp1;charset=UTF8mb4');

function db_connect(){
    $dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD2);
    return $dbh;
}
function bug($value){	
	print_r("<pre>");
	print_r($value);
	print_r("</pre>");
}

try {
    $dbh = db_connect();
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$tx = "";
	$select = "*";

    if(!empty($_POST["num"])){
	
		//オープンハウス
        $sql = "SELECT object_id FROM wp_term_relationships where term_taxonomy_id = 10";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $openhousetax = $stmt -> fetchAll(PDO::FETCH_COLUMN);

		//エリア
        $sql = "SELECT object_id FROM wp_term_relationships where term_taxonomy_id = :num";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':num', htmlspecialchars($_POST["num"], ENT_QUOTES, "UTF-8"), PDO::PARAM_INT);
        $stmt->execute();
        $area = $stmt -> fetchAll(PDO::FETCH_COLUMN);

		//重複
        $ID = array_intersect($area,$openhousetax);
        $tx = count($ID);	
	}
	echo $tx;
	
} catch (PDOException $e) {
	echo $e->getMessage();
	exit();
}
?>
