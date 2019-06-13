
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institucional extends CI_Controller {

	public function index()
	{
		$this->load->view('home');
	}

	public function Empresa()
	{
		$this->load->view('empresa');
	}

	public function Servicoes()
	{
		$this->load->view('servicos');
	}
}
