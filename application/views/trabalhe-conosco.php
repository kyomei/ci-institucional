<?php $this->load->view('commons/header.php');?>
	<div class="container my-5">
		<div class="page-header">
			<h1>Trabalhe conosco</h1>
			<?php print_r($formErrors); echo form_error('email');?>
		</div>
		<div class="row">
			<div class="col-md-8">
				
				<!-- Start .\ Mensagem de validação do formulário  -->
				<?php if($formErrors): ?>
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<ul>
							<?=$formErrors?>
						</ul>
					</div>
				<?php else: 
						if($this->session->flashdata('success_msg')){
							
						?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Sucesso!</strong> <?=$this->session->flashdata('success_msg') ?>
					</div>
							<?php } ?>
				<?php endif; ?>				
				<!-- End .\ Mensagem de validação do formulário  -->

				<!-- Start .\ Formulário de contato -->
				<?= form_open_multipart(base_url('trabalhe-conosco'), array("method"=>"POST")); ?>
					<div class="form-group">
						<label for="nome">Nome</label>
						<?= form_input(array("name"=>"nome","id"=>"nome"),set_value('nome'),  array("class"=>"form-control  is-invalid","required"=>"", "type"=>"text", "placeholder"=>"Nome"));?>
						<div class="invalid-feedback">Por favor, escolha um nome de usuário.</div>
					</div>
					<div class="form-group">
						<label for="email">Email address</label>
						<?= form_input(array("name"=>"email", "id"=>"email"), set_value('email'), array("class"=>"form-control", "required"=>"", "type"=>"text", "placeholder"=>"Email")); ?>
						<small id="emailHelp" class="form-text text-muted">Ex.: email@example.com</small>
					</div>
					<div class="form-group">
						<label for="assunto">Telefone de Contato</label>
						<?= form_input(array("name"=>"telefone", "id"=>"telefone"), set_value('telefone'), array("class"=>"form-control", "required"=>"", "type"=>"text", "placeholder"=>"Telefone de Contato")); ?>
					</div>
					<div class="form-group">
						<label for="mensagem">Mensagem</label>
						<?= form_textarea(array("name"=>"mensagem","id"=>"mensagem"), set_value('mensagem'), array("class"=>"form-control", "required"=>"", "type"=>"text","placeholder"=>"Mensagem")); ?>
					</div>
					<div class="form-group">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupFileAddon01">Currículo</span>
							</div>
							<div class="custom-file">
								<?=	form_upload(array("name"=>"curriculo","id"=>"curriculo"), set_value('curriculo'), array("class"=>"custom-input-file","required"=>""));	?>
								<label class="custom-file-label" for="curriculo">Escolher arquivo</label>
							</div>
						</div>
					</div>
					<?= form_submit(array("name"=>"Enviar", "id"=>"enviar"), "Enviar",array("class"=>"btn btn-dark float-right")); ?>
				<?= form_close(); ?>
				<!-- End .\ Formulário de contato -->
			</div>
			<div class="col-md-4">
				<!-- Start .\ Informaçoes de contato -->
				<h4>Telefones</h4>
				<p>+55 99 99999-9999 | +55 88 8888-88888</p>
				<hr />
				<h4>E-mail</h4>
				<p>contato@empresa.com.br</p>
				<hr />
				<h4>Endereço</h4>
				<p>R. Quinze de ABCD - Praia vip, Vila lelopa - ES</p>
				<hr />
				<!-- End .\ Informaçoes de contato -->

				<!-- maps -->
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.726640476743!2d-46.41774638502262!3d-23.542332384692273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce64491e33284f%3A0xd3cd58a2fd18b76b!2sGuaianazes!5e0!3m2!1spt-BR!2sbr!4v1560529862266!5m2!1spt-BR!2sbr" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>

<?php $this->load->view('commons/footer.php');?>
