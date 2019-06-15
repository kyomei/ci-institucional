
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

		// Verifica se houve errors, e exibe em forma de lista não ordenada
		if($this->form_validation->run() == FALSE) {
			$data['formErrors'] = validation_errors('<li>', '</li>');	
		} else {
			$formData = $this->input->post();
			$emailStatus = $this->SendEmailToAdmin("teste@ieatprofissionalizante.com.br", "LCI Institucional", $formData['email'], $formData['nome'], $formData['assunto'], $formData['mensagem'], 'teste@ieatprofissionalizante.com.br', 'Site página Fale Conosco');
			
			// Verifica se foi enviado
			if($emailStatus) {
				$this->session->set_flashdata('success_msg', 'Contato recebido com sucesso!');	
				$data['formErrors'] = null;		
			} else {
				$data['formErrors'] = "<strong>Desculpe!</strong> Não foi possível enviar o seu contato, tente novamente mais tarde.";
			}
		}
		
		$this->load->view('fale-conosco', $data);
	}

	public function TrabalheConosco()
	{
		$data['title'] = "LCI | Trabalhe Conosco";
		$data['description'] = "Venha trabalhar conosco";
		$this->load->view('trabalhe-conosco', $data);
	}

	private function SendEmailToAdmin($from, $fromName, $to, $toName, $subject, $message, $reply = null, $replyName = null) 
	{
		$this->load->library('email');

		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.ieatprofissionalizante.com.br';
		$config['smtp_user'] = 'teste@ieatprofissionalizante.com.br';
		$config['smtp_pass'] = 'teste123';
		$config['newline'] = '\r\n';

		$this->email->initialize($config);
		
		$this->email->from($from, $fromName);
		$this->email->to($to, $toName);

		if($reply)
			$this->email->reply_to($reply, $replyName);

		$this->email->subject($subject);
		$this->email->message($message);

		if($this->email->send())
			return true;
		else
			return false;
			
	}

}
