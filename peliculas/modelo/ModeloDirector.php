<?php

include_once ('Director.php');
include_once ('Conexion.php');

class ModeloDirector {
    private $conexion;

    public function __construct() {
        try {
            $this->conexion = new mysqli( $this->host, $this->username, $this->password, $this->database );
            $this->conexion->set_charset('utf8');
        } catch ( Exception $e ) {
            echo $e->getMessage();
        }
    }

    public function getAll() {
        $query = $this->conexion->query("SELECT * FROM directores");
        $data = $query->fetch_all(MYSQLI_ASSOC);
        $results = Array();

        foreach ( $data as $row ) {
            array_push( $results, new Director( $row['idDirector'], $row['NombreDirector'] ) );
        }
        mysqli_free_result( $query );
        return $results;
    }

    public function close() {
        $this->conexion->close();
    }
}