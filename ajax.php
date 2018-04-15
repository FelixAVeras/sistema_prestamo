<?

include('connection.php');

class Ajax {
	public $buscador;

	public function Buscar($a) {
		$db = new Connection();
		$this->buscador = $db->real_escape_string($a);
		$sql = $db->query("SELECT * FROM customer WHERE name LIKE '%filtro%';");

		while($array = $db->recorrer($sql)) {
			$resultado[] = $array['name'];
		}

		return $resultado;
	}
}

$busqueda = new Ajax();
echo json_encode($busqueda->Buscar($_GET['term']));

?>