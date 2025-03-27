<?php
	class Producto{
		// declaración de propiedades
	    public $var = 'un valor predeterminado';
	    private $id;
	    private $nombre;
	    private $precio;

	    // declaración de métodos
	    public function displayVar() {
	        echo $this->var;
	    }
	    
	    public function __construct($id = null, $nombre = null, $precio = null) {
	        $this->id = $id;
	        $this->nombre = $nombre;
	        $this->precio = $precio;
	    }

	    public static function get($id) {
	        // Simulación de obtener un producto
	        return "Se ejecutó get: {$id}";
	    }

	    public static function post($data) {
	        // Simulación de crear un producto
	        return "Se ejecutó post con datos: " . json_encode($data);
	    }

	    public static function put($data) {
	        // Simulación de actualizar un producto
	        return "Se ejecutó put con datos: " . json_encode($data);
	    }

	    public static function delete($id) {
	        // Simulación de eliminar un producto
	        return "Se ejecutó delete: {$id}";
	    }
	}
?>










