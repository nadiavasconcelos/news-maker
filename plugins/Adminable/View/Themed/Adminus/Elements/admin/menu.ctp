<ul class="nav">
	<li class="<?php echo ($this->request->params['controller'] == 'users') ? 'active' : ''; ?>">
		<?php echo $this->Html->link('Usuários', '/admin/users'); ?>
	</li>

	<li class="<?php echo ($this->request->params['controller'] == 'clientes') ? 'active' : ''; ?>">
		<?php echo $this->Html->link('Clientes', '/admin/clientes'); ?>
	</li>

	<li class="dropdown">
		<a data-toggle="dropdown" class="dropdown-toggle" href="#">Templates <b class="caret"></b></a>
		<ul class="dropdown-menu">
			<!-- <li class="nav-header">Campanhas</li> -->
			<li><?php echo $this->Html->link('Todos', '/admin/templates') ?></li>
			<li><?php echo $this->Html->link('Novo template', '/admin/templates/add') ?></li>
		</ul>
	</li>

	<li class="dropdown">
		<a data-toggle="dropdown" class="dropdown-toggle" href="#">Newsletters <b class="caret"></b></a>
		<ul class="dropdown-menu">
			<!-- <li class="nav-header">Campanhas</li> -->
			<li><?php echo $this->Html->link('Todas', '/admin/newsletters') ?></li>
			<li><?php echo $this->Html->link('Nova newsletter', '/admin/newsletters/add') ?></li>
		</ul>
	</li>
	
	<li class="divider-vertical"></li>
</ul>