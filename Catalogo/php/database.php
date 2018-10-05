<?php
class Database
{
    private static $dbName = 'u165437735_javyj'; //'javyjaja';
    private static $dbHost = 'mysql.hostinger.mx'; //'localhost';
    private static $dbUsername = 'u165437735_root';//'root';
    private static $dbUserPassword = 'Jhr1984987davg';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        }
        catch(PDOException $e)
        {
          throw($e); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>
