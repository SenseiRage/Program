<?php
include_once ('../modelo/ModeloPelicula.php');

$modeloPelicula = new ModeloPelicula();

$peliculas = $modeloPelicula->getAll();

$response = Array();
$response['peliculas'] = $peliculas;
$response['status'] = 'OK';

echo json_encode($response);
$modeloPelicula->delete(33);

unset( $modeloPelicula );
unset( $peliculas );