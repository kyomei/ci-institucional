
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
			// Monta a mensagem
			$msg = " <span style='font-size:18px'><p><strong>Você tem uma nova mensagem:</strong><br />";
			$msg .= "Via: <u>".base_url($_SERVER['REQUEST_URI'])."</u></p>";
			$msg .= "<p><strong>Detalhes da Mensagem:</strong></p>";
			$msg .= "<p><strong>Nome</strong> ".$formData['nome']."<br />";
			$msg .= "<strong>Email</strong> ".$formData['email']."<br />";
			$msg .= "<strong>Assunto</strong> ".$formData['assunto']."<br />";
			$msg .= "<strong>Mensagem</strong> ".$formData['mensagem']."</p>";
			$msg .= "<p><strong>Enviado em:</strong> ".date("d/m/Y")."</p>";
			$msg .= "<p>Obrigado!</p></span>";
			// Envia email para visitante e para o email do site
			$emailStatusToVisitante = $this->SendEmail("site@ieatprofissionalizante.com.br", "LCI Institucional", $formData['email'], $formData['nome'], $formData['assunto'], "Recebemos sua mensagem, em breve um de nossos representantes entrará em contato");
			$emailStatusToAdmin = $this->SendEmail("site@ieatprofissionalizante.com.br", "Fale conosco - Instituto","teste@ieatprofissionalizante.com.br" , "Fale conosco - ".$formData['nome'], "Nova mensagem através do seu site", $msg);
			
			// Verifica se foi enviado
			if(($emailStatusToVisitante) && ($emailStatusToAdmin)) {
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

		// Regras de validação
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('telefone', 'telefone', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('mensagem', 'Mensagem', 'trim|required|min_length[10]');
		
		// Verifica se houve errors, e exibe em forma de lista não ordenada
		if($this->form_validation->run() == FALSE) {
			$data['formErrors'] = validation_errors('<li>', '</li>');
		} else {
			$uploadCurriculo = $this->UploadFile('curriculo');

			// Verifica se houve algum erro passa para $data['formErrors']
			if($uploadCurriculo['error']) {
				$data['formErrors'] = $uploadCurriculo['message'];
			} else {
				// Envia email para visitante e para o email do site
				$formData = $this->input->post();
				
				// Monta a mensagem
				$msg = " <span style='font-size:18px'><p><strong>Você tem uma nova mensagem:</strong><br />";
				$msg .= "Via: <u>".base_url($_SERVER['REQUEST_URI'])."</u></p>";
				$msg .= "<p><strong>Detalhes da Mensagem:</strong></p>";
				$msg .= "<p><strong>Nome</strong> ".$formData['nome']."<br />";
				$msg .= "<strong>Email</strong> ".$formData['email']."<br />";
				$msg .= "<strong>Assunto</strong> Currículo<br />";
				$msg .= "<strong>Mensagem</strong> ".$formData['mensagem']."</p>";
				$msg .= "<strong>Curricu</strong>";
				$msg .= "<p><strong>Enviado em:</strong> ".date("d/m/Y")."</p>";
				$msg .= "<p>Obrigado!</p></span>";

				$emailStatusToVisitante = $this->SendEmail("site@ieatprofissionalizante.com.br", "LCI Institucional - Currículo Recebido", $formData['email'], $formData['nome'], "LCI Institucional - Currículo enviado", "Recebemos seu currículo, ele está sendo armazenado em nossa base de dados");
				$emailStatusToAdmin = $this->SendEmail("site@ieatprofissionalizante.com.br", "Trabalhe conosco - Instituto","teste@ieatprofissionalizante.com.br" , "Trabalhe conosco novo currículo de ".$formData['nome'], "Nova mensagem através do seu site", $msg, $uploadCurriculo['fileData']['full_path']);
				
				if(($emailStatusToVisitante) && ($emailStatusToAdmin)) {
					$this->session->set_flashdata('success_msg', 'Contato recebido com sucesso!');
					$data['formErrors'] = null;	
				} else {
					$data['formErrors'] = "Desculpe! Não foi possível enviar o seu contato. tente novamente mais tarde.";
				}
			}			
		}
		$this->load->view('trabalhe-conosco', $data);
	}

	
	private function SendEmail($from, $fromName, $to, $toName, $subject, $message, $attach = null)
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

		if($attach)
			$this->email->attach($attach);
			
		$this->email->subject($subject);
		$this->email->message($message);

		if($this->email->send())
			return true;
		else
			return false;
	}

	private function UploadFile($inputFileName)
	{
		$this->load->library('upload');

		$path ="../curriculos";

		// Define as configurações do arquivo
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'doc|docx|pdf|zip|rar';
		$config['max_size'] = '5120';
		$config['encrypt_name'] = TRUE;

		// Se não existir diretório crie
		if(!is_dir($path))
			mkdir($path, 0777, $recursive = true);

		// Inicia biblioteca com config definidas
		$this->upload->initialize($config);
		
		// Verifica se não foi feito upload exibe os errors
		if(!$this->upload->do_upload($inputFileName)) {
			$data['error'] = true;
			$data['message'] = $this->upload->display_errors();
		} else {
			$data['error'] = false;
			$data['fileData'] = $this->upload->data();
		}
		return $data;
	}
}
