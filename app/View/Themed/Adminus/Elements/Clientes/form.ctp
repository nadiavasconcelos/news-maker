<?php echo $this->Admin->formCreate('Cliente', 'post'); ?>
	
	<fieldset>
		<legend>Adicionar</legend>
		<?php echo $this->Form->hidden('id'); ?>
		<?php echo $this->Admin->input('nome', array('label' => 'Nome', 'help' => 'Cliente')) ?>
	</fieldset>
	
	<div class="form-actions">
		<?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-primary btn-large', 'div' => false)); ?>
		<a class="btn btn-large" href="<?php echo Router::url('/admin/clientes')?>">Cancelar</a>
	</div>
	
<?php echo $this->Form->end(); ?>
