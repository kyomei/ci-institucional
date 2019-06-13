<?php 
	if($this->router->fetch_class() == 'Institucional') {
		$active = $this->router->fetch_method();
	}

?>
<ul class="navbar-nav mr-auto">
	<li class="nav-item <?=($active == 'index') ? 'active': null; ?> ">
		<a class="nav-link" href="<?=base_url();?>">Home <span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item <?=($active == 'Empresa') ? 'active': null; ?>">
		<a class="nav-link" href="<?=base_url('empresa');?>">A Empresa</a>
	</li>
	<li class="nav-item <?=($active == 'Servicos') ? 'active': null; ?>">
		<a class="nav-link" href="<?=base_url('servicos');?>">Serviços</a>
	</li>
	<li class="nav-item <?=($active == 'trabalhe-conosco') ? 'active': null; ?>">
		<a class="nav-link" href="<?=base_url('trabalhe-conosco');?>">Trabalhe Conosco</a>
	</li>
	<li class="nav-item <?=($active == 'fale-conosco') ? 'active': null; ?>">
		<a class="nav-link" href="<?=base_url('fale-conosco');?>">Fale Conosco</a>
	</li>
</ul>
