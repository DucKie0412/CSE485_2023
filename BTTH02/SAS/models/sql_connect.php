<?php
class Database {
    private static $instance = null;
    private $connection;

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'quan_ly_diem_danh';

    private function __construct() {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            
        } catch (Exception $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
