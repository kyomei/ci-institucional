
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// Configuração cache global na classe, ou seja para todos os métodos que possuem views como saída
		$this->output->cache(1440); // Corresponde a 24 hrs até o cache ser atualizado
	}
	public function FaleConosco()
	{
		$data['title'] = "LCI | Fale Conosco";
		$data['description'] = "Entre em contato conosco";
		$this->load->view('fale-conosco', $data);
	}

	public function TrabalheConosco()
	{
		$data['title'] = "LCI | Trabalhe Conosco";
		$data['description'] = "Venha trabalhar conosco";
		$this->load->view('trabalhe-conosco', $data);
	}

}
