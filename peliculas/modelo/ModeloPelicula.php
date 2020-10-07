<?php
include_once ('Conexion.php');
include_once ('Pelicula.php');
include_once ('Director.php');

class ModeloPelicula extends Conexion {
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
        $query = $this->conexion->query("SELECT * FROM peliculas INNER JOIN directores ON directores.idDirector = peliculas.director");
        $data = $query->fetch_all(MYSQLI_ASSOC);
        $results = Array();

        foreach ( $data as $row ) {
            $director = new Director( $row['idDirector'], $row['NombreDirector'] );
            array_push( $results, new Pelicula( $row['idPelicula'], $row['TituloPelicula'], $row['Anio'], $director, $row['cartel'] ) );
        }
        mysqli_free_result( $query );
        return $results;
    }

    public function delete( $id ) {
        return $this->conexion->query( "DELETE FROM peliculas WHERE idPelicula = $id" );;
    }

    public function close() {
        $this->conexion->close();
    }
}