<?php
namespace Database\PDO; //apellidos de la clase

class DatabaseConnection{
    private $server;
    private $database;
    private $username;
    private $password;
    private $connection;

    public function __construct($server, $username, $password, $database)
    {
        $this -> server = $server;
        $this -> username = $username;
        $this -> password = $password;
        $this -> database = $database;
    }

    public function connect(){
        try{
            $this->connection = new \PDO("mysql:host=$this->server;dbname=$this->database",
                                        $this->username,$this->password);
            $setNames = $this->connection -> prepare("SET NAMES 'utf8'");
            $setNames -> execute();
        }catch(\PDOException $e){
            echo "falló la conexión a la base de datos: ".$e->getMessage();
        }
    }

    public function get_connection(){
        return $this-> connection;
    }
}
/*

$server = "localhost";
$database = "libreria";
$username = "root";
$password = "dba";

//instanciar el objeto de la conexión
$databaseConnection = new DatabaseConnection($server, $username, $password, $database);

//conectar la base de datos
$databaseConnection -> get_connection();

// ejecutar consulta
$query = 'SELECT * FROM libros';
$results = $databaseConnection->get_connection()->query($query);

// obtener los resultados
foreach($results as $row){
    echo $row['titulo']."\n";
}
*/

?>
