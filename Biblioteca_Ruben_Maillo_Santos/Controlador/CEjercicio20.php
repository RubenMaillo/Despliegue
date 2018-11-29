<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CEjercicio20 extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index(){
		$this->load->view('header20');
		$this->load->view('contenido20');
		$this->load->view('footer20');
	}

	public function Libros(){
		$titulo = $this->input->post('titulo');
		$autor = $this->input->post('autor');
		$tema = $this->input->post('tema');

		$datos['resultTitulo'] = $titulo;
		$datos['resultAutor'] = $autor;
		$datos['resultTema'] = $tema;

		$this->load->view('header20');
		$this->load->view('vistaLibros', $datos);
		$this->load->view('footer20');
	}

	public function Socios(){
		$dni = $this->input->post('dni');
		$nombre = $this->input->post('nombre');

		$datos['resultDni'] = $dni;
		$datos['resultNombre'] = $nombre;

		$this->load->view('header20');
		$this->load->view('vistaSocios',$datos);
		$this->load->view('footer20');
	}

	public function vistaSocios(){
		$datos['resultDni'] = "";
		$datos['resultNombre'] = "";

		$this->load->view('header20');
		$this->load->view('vistaSocios', $datos);
		$this->load->view('footer20');
	}

	public function anadirSocio(){

		$xml = new DomDocument ("1.0", "UTF-8");
		$xml -> LOAD ("xml/listaSocios.xml");

		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$dni = $this->input->post('dni');
		$domicilio = $this->input->post('domicilio');
		$telefono = $this->input->post('telefono');
		$fechaAlta = $this->input->post('fechaAlta');
		$fechaBaja = $this->input->post('fechaBaja');

		if($id!="" && $nombre!="" && $dni!="" && $domicilio!="" && $telefono!="" && $fechaAlta!="" && $fechaBaja!=""){

			if(is_numeric($telefono)){

				$arrayletras = array('T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E');
				$res = intval(substr($dni, 0, 8))%23;

				if($arrayletras[$res] == substr($dni, 8, 9)){

					$repe=false;
					$socios=simplexml_load_file("xml/listaSocios.xml");

					foreach ($socios as $socio) {

						if($socio->dni==$dni){
							
							$repe=true;
							 
						}

					}

					if($repe){

						echo "<script>alert('El DNI introducido ya se encuentra registrado.')</script>";

						$this->load->view('header20');
						$this->load->view('anadirSocio');
						$this->load->view('footer20');
						
					}
					else{

						$SOCIOSTag = $xml->getElementsByTagname('lista_socios')->item(0);
						$socioTag = $xml->createElement("socio");

						$idTag = $xml->createElement("id_socio", $id);
						$nombreTag = $xml->createElement("nombre_apellidos", $nombre);
						$dniTag = $xml->createElement("dni", $dni);
						$domicilioTag = $xml->createElement("domicilio", $domicilio);
						$telefonoTag = $xml->createElement("telefono", $telefono);
						$fechaAltaTag = $xml->createElement("fecha_alta", $fechaAlta);
						$fechaBajaTag = $xml->createElement("fecha_baja", $fechaBaja);

						$socioTag->appendChild($idTag);
						$socioTag->appendChild($nombreTag);
						$socioTag->appendChild($dniTag);
						$socioTag->appendChild($domicilioTag);
						$socioTag->appendChild($telefonoTag);
						$socioTag->appendChild($fechaAltaTag);
						$socioTag->appendChild($fechaBajaTag);


						$SOCIOSTag->appendChild($socioTag);

						$xml->save("xml/listaSocios.xml");

						echo "<script>alert('Se ha añadido un nuevo socio.')</script>";

						$this->vistaSocios();
						

					}

				}
				else{

					echo "<script>alert('El DNI introducido no es válido.')</script>";

					$this->load->view('header20');
					$this->load->view('anadirSocio');
					$this->load->view('footer20');

				}

			}
			else{

				echo "<script>alert('El teléfono debe ser numérico.')</script>";

				$this->load->view('header20');
				$this->load->view('anadirSocio');
				$this->load->view('footer20');

			}
		
		}
		else{

			echo "<script>alert('Debe rellenar todos los campos')</script>";

			$this->load->view('header20');
			$this->load->view('anadirSocio');
			$this->load->view('footer20');

		}


		
		
	}


	public function datosSocio($dni){
		$datos['resDni'] = $dni;
		$this->load->view('header20');
		$this->load->view('datosSocios', $datos);
		$this->load->view('footer20');
		
	}

	public function vistaAnadirSocio(){
		$this->load->view('header20');
		$this->load->view('anadirSocio');
		$this->load->view('footer20');
	}
}
