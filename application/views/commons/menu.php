<ul class="navbar-nav mr-auto">
	<li class="nav-item <<?=($this->router->fetch_class() == 'Institucional' && $this->router->fetch_method()	== 'index')	?	'active'	:	null;	?>">
		<a class="nav-link" href="<?=base_url();?>">Home <span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item <?=($this->router->fetch_class() == 'Institucional' && $this->router->fetch_method()	== 'Empresa')	?	'active'	:	null;	?>">
		<a class="nav-link" href="<?=base_url('empresa');?>">A Empresa</a>
	</li>
	<li class="nav-item <?=($this->router->fetch_class() == 'Institucional' && $this->router->fetch_method()	== 'Servicoes')	?	'active'	:	null;	?>">
		<a class="nav-link" href="<?=base_url('servicos');?>">Serviços</a>
	</li>
	<li class="nav-item <?=($this->router->fetch_class() == 'Contato' && $this->router->fetch_method()	== 'TrabalheConosco')	?	'active'	:	null;	?>">
		<a class="nav-link" href="<?=base_url('trabalhe-conosco');?>">Trabalhe Conosco</a>
	</li>
	<li class="nav-item <?=($this->router->fetch_class() == 'Contato' && $this->router->fetch_method()	== 'FaleConosco')	?	'active'	:	null;	?>">
		<a class="nav-link" href="<?=base_url('fale-conosco');?>">Fale Conosco</a>
	</li>
</ul>
