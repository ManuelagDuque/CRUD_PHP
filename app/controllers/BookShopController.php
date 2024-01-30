<?php
namespace App\Controllers;
use Database\PDO\DatabaseConnection;
use Exception;

require "vendor/autoload.php";

class BookShopController{
    private $server;
    private $database;
    private $username;
    private $password;
    private $connection;


    // función constructura
    public function __construct()
    {
        $this -> server = "localhost";
        $this -> database = "libreria";
        $this -> username = "root";
        $this -> password = "dba";

        //instanciar el objeto de la conexión
       $this -> connection = new DatabaseConnection($this->server, $this->username,  
                                                    $this->password,  $this->database);
        //conectar la base de datos
       $this -> connection -> connect();
    }


    /**
     * INDEX: muestra/selecciona lista/colección/indice de todos los elementos de una entidad dada
     */

    public function index(){
        

    }


    /**
     * CREATE: muestra formulario que permite capturar la data de un elemento dado
     */

     public function create(){

     }


    /**
     * STORE: Inserta en la base de datos lo que recibe del formulario de CREATE
     */
    public function store($data){
        // construir la consulta
        $query = "INSERT INTO libros (titulo, autor, genero, precio) VALUES (?, ?, ?, ?)";
        try{
            $statement = $this->connection->get_connection()->prepare($query);
            $results = $statement->execute([$data['titulo'], $data['autor'],
                                          $data['genero'], $data['precio']
                                        ]);
            if(!empty($results)){
                $response = "Se ha registrado con éxito el libro {$data['titulo']} en la base de datos";
                var_dump($response);
                return [$results, $response];
            }
        }catch(Exception $e){
            echo "Ocurrio un error en el registro, vuelve a intentarlo";
        }

    }

    /**
     * SHOW: muestra/selecciona un elemento dado
     */
    public function show(){

    }


    /**
     * EDIT: muestra un formulario que permita modificar los datos de un elemento seleccionado
     */
    public function edit(){

    }


    /**
     * UPDATE: actualiza en la base de datos lo que recibe del formulario de EDIT
     */
    public function update(){

    }


    /**
     * DELETE: elimina un elememto dado
     */
    public function delete(){

    }
}


?>