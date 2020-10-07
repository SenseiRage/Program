<?php
include_once ('../modelo/ModeloPelicula.php');

$modeloPelicula = new ModeloPelicula();
$id = filter_input( INPUT_GET, 'id' );

if ( !is_null( $id ) ) {

    $response = $modeloPelicula->delete($id);
    echo json_encode($response);
}

unset ($modeloPelicula );
unset( $id );
