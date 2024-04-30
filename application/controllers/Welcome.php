<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Persona');
	}

	public function index()
	{
		$data['personas'] = $this->Persona->seleccionarTodo();
		$this->load->view('welcome_message', $data);
	}

	public function agregar()
	{
		$persona['nombre'] = $this->input->post('nombre');
		$persona['ApellidoPaterno'] = $this->input->post('ApellidoPaterno');
		$persona['ApellidoMaterno'] = $this->input->post('ApellidoMaterno');
		$persona['FechaNacimiento'] = $this->input->post('FechaNacimiento');
		$persona['genero'] = $this->input->post('genero');
		
		$this->Persona->agregar($persona);
		redirect('welcome');
	}

	public function editar($id_persona){
		$persona['nombre'] = $this->input->post('nombre');
		$persona['ApellidoPaterno'] = $this->input->post('ApellidoPaterno');
		$persona['ApellidoMaterno'] = $this->input->post('ApellidoMaterno');
		$persona['FechaNacimiento'] = $this->input->post('FechaNacimiento');
		$persona['genero'] = $this->input->post('genero');
		
		$this->Persona->actualizar($persona, $id_persona);
		redirect('welcome');
	}

	public function eliminar($id_persona){
		$this->Persona->eliminar($id_persona);
		redirect('welcome');
	}
}
