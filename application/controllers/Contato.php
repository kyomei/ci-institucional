
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		// Configuração cache global na classe, ou seja para todos os métodos que possuem views como saída
		//$this->output->cache(1440); // Corresponde a 24 hrs até o cache ser atualizado
	}
	public function FaleConosco()
	{
		$data['title'] = "LCI | Fale Conosco";
		$data['description'] = "Entre em contato conosco";

		// Regras de validação		
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]', array('required' => 'Você deve preencher a %s.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array('required' => 'Você deve preencher a %s.'));
		$this->form_validation->set_rules('assunto', 'Assunto', 'trim|required|min_length[5]', array('required' => 'Você deve preencher a %s.'));
		$this->form_validation->set_rules('mensagem', 'Mensagem', 'trim|required|min_length[5]', array('required' => 'Você deve preencher a %s.'));

		if($this->form_validation->run() == FALSE) {
			$data['formErrors'] = validation_errors('<li>', '</li>');	
		} else {
			$this->session->set_flashdata('success_msg', 'Contato recebido com sucesso!');			
			$data['formErrors'] = null;
		}
		
		$this->load->view('fale-conosco', $data);
	}

	public function TrabalheConosco()
	{
		$data['title'] = "LCI | Trabalhe Conosco";
		$data['description'] = "Venha trabalhar conosco";
		$this->load->view('trabalhe-conosco', $data);
	}

}
