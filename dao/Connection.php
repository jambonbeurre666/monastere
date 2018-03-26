<?php
class Connection
{
    private static $instance;

    private static $type = "mysql";
    private static $host = "localhost";
    private static $dbname = "Abi";
    private static $username = "root";
    private static $password = '';
    private $db;

    private function __construct()
    {
        try {
            $this->db = new \PDO(
                self::$type.':host='.self::$host.'; dbname='.self::$dbname,
                self::$username,
                self::$password,
            array(\PDO::ATTR_PERSISTENT => true)
            );

            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            $req = "SET NAMES UTF8";
            $result = $this->db->prepare($req);
            $result->execute();
        } catch (PDOException $e) {
            die();
        }
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
       
        }
        return self::$instance;
    }

    public function getDb()
    {
        return $this->db;
    }
}
