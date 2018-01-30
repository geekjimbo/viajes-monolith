<?php

namespace App;

use App\Pasajero;
use App\Conductor;
use App\Ruta;


class TestViajes 
{
    protected $pasajero;
    protected $conductor;
    protected $viaje;

	public function __construct()
	{
	    $this->pasajero = new Pasajero;
	    $this->conductor = new Conductor;
	    $this->viaje = new Ruta;
	}

	public function run() {
		// res
		$res = new \stdClass;

		//create pasajero
		$params = new \stdClass;
		$params->nombre = "Dr. A. Shausser";
		$res->message = $this->pasajero->crear($params);

		//create conductor
		$params = new \stdClass;
		$params->nombre = "Sr. Henry Kissinger";
		$params->estado = "inactivo";
		$res->message = $this->conductor->crear($params);

		//create viaje
		$params = new \stdClass;
		$params->origen = "san josé";
		$params->destino = "heredia";
		$params->pasajero_id = 7;
		$params->conductor_id = 18;
		$res->message = $this->viaje->crear($params);

		//list pasajero
		$res->message = $this->pasajero->listar($params);

		//list conductor
		$res->message = $this->conductor->listar($params);

		//list ruta
		$res->message = $this->viaje->listar($params);	

		return $res;	
	}
}
