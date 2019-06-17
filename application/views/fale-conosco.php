<?php $this->load->view('commons/header.php');?>
	<div class="container my-5">
		<div class="page-header">
			<h1>Fale conosco</h1>
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
				<form method="POST">
					<div class="form-group">
						<label for="nome">Nome</label>
						<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?php echo $formErrors ? set_value('nome') : null; ?>">
					</div>
					<div class="form-group">
						<label for="email">Email address</label>
						<input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" value="<?php echo $formErrors ? set_value('email') : null; ?>">
						<small id="emailHelp" class="form-text text-muted">Ex.: email@example.com</small>
					</div>
					<div class="form-group">
						<label for="assunto">Assunto</label>
						<input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto" value="<?php echo $formErrors ? set_value('assunto') : null; ?>">
					</div>
					<div class="form-group">
						<label for="mensagem">Mensagem</label>
						<textarea class="form-control" id="mensagem" name="mensagem" rows="8"><?php echo $formErrors ? set_value('mensagem') : null; ?></textarea>
					</div>
					<div class="form-group">
						<label for="captcha">Captcha - <?php print_r($this->session->userdata()); ?></label>
						<div class="d-flex">
							<?=$captcha_image?>
							<input id="captcha" name="captcha" placeholder="Captcha" class="form-control ml-2" type="text" value="">
						</div>
					</div>
					<button type="submit" class="btn btn-dark">Enviar</button>
				</form>
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
