<?php
require_once 'Producto.php';

	/***
	 * Ejemplos de consultas:
	 * 
	 * 1. GET localhost/producto/1
	 *    Resultado esperado: "Se ejecutó get: 1"
	 * 
	 * 2. POST localhost/producto/
	 *    POST http://localhost/mvc/producto \
	 *    {
	 *        "id": 2,
	 *        "nombre": "laptop",
	 *        "precio": 10000
	 *    }
	 *    Resultado esperado: "Se ejecutó post con datos: {"id":2,"nombre":"laptop","precio":10000}"
	 * 
	 * 3. PUT localhost/producto/ 
	 *    {
	 *        "id": 2,
	 *        "nombre": "Computadora de escritorio",
	 *        "precio": 15000
	 *    }
	 *    Resultado esperado: "Se ejecutó put con datos: {"id":2,"nombre":"Computadora de escritorio","precio":15000}"
	 * 
	 * 4. DELETE localhost/producto/2
	 *    http://localhost/mvc/producto/2
	 *    Resultado esperado: "Se ejecutó delete: 2"s
	 * 
	 * En este caso se realizo utilizando Postman:
	 * 1. Se selecciono el método HTTP correspondiente (GET, POST, PUT o DELETE)
	 * 2. Ingresamos la URL (en este caso: http://localhost/mvc/producto/1)
	 * 3. Para POST y PUT, hay que ir a la pestaña "Body", seleccionar "raw" y "JSON", y agrega el JSON correspondiente
	 * 4. Hacer clic en "Send"
	 */


	// Verificar si PATH_INFO existe, si no, usar una cadena vacía
	$path_info = isset($_GET['PATH_INFO']) ? $_GET['PATH_INFO'] : '';
	echo "Hola mundo<br/>";
	echo $path_info;
	echo "<br/> {$_SERVER['REQUEST_METHOD'] } ";


	// Verificar si hay parámetros antes de hacer el explode
	$parameters = $path_info ? explode('/', $path_info) : [];
	$recurso = !empty($parameters) ? $parameters[0] : '';
	$request_method = $_SERVER['REQUEST_METHOD'];

	// Obtener el ID si existe
	$id = isset($parameters[1]) ? $parameters[1] : null;

	// Obtener el body de la petición para POST y PUT
	$data = null;
	if ($request_method === 'POST' || $request_method === 'PUT') {
		$data = json_decode(file_get_contents('php://input'), true);
	}

	echo "<hr><br/><br/>"; 

	// Llamar al método correspondiente de la clase Producto
	$resultado = '';
	switch ($request_method) {
		case 'GET':
			$resultado = Producto::get($id);
			break;
		case 'POST':
			$resultado = Producto::post($data);
			break;
		case 'PUT':
			$resultado = Producto::put($data);
			break;
		case 'DELETE':
			$resultado = Producto::delete($id);
			break;
		default:
			$resultado = "Método HTTP no soportado";
	}

	echo $resultado . "<br />";

	
?> 