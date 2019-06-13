
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institucional extends CI_Controller {

	public function index()
	{
		$data['title'] = "LCI | Home";
		$data['description'] = "Página inicial";
		$this->load->view('home', $data);
	}

	public function Empresa()
	{
		$data['title'] = "LCI | A Empresa";
		$data['description'] = "Informações sobre a empresa";
		$this->load->view('empresa', $data);
	}

	public function Servicos()
	{
		$data['title'] = "LCI | Serviços";
		$data['description'] = "Informações sobre os serviços prestados";
		$this->load->view('servicos', $data);
	}
}
