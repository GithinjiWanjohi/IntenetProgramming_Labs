<?php 
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'bbt1105');
	
	class DBConnector{
		public $conn;
		
		function _construct(){
		    $dsn ="mysql:host=localhost; dbname=bbt1105; charset=utf8mb4";
		    $options = [
		        PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
		    try{
		        $pdo = new PDO($dsn, "root", "", $options);
            }catch(Exception $e){
		        error_log($e->getMessage());
		        exit("Couldn't connect to the database");
            }
		}
	}
