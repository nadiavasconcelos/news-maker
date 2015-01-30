<?php echo $this->Admin->formCreate('Template', 'post'); ?>
	
	<fieldset>
		<legend>Template</legend>
		<?php echo $this->Form->hidden('id'); ?>
		<?php echo $this->Admin->input('cliente_id', array('label' => 'Cliente', 'help' => 'Escolha o Cliente')) ?>
		<?php echo $this->Admin->input('titulo', array('label' => 'Título', 'help' => 'Identificação do Template')) ?>
		<?php echo $this->Admin->input('content', array('type' => 'textarea', 'class' => 'span9 txtTemplateHeight', 'label' => 'Template', 'help' => 'Código em HTML')) ?>
	</fieldset>

	<fieldset>
		<legend>Campos dinâmicos</legend>

		<?php
		if( isset($fields) ):
		foreach ($fields as $key => $field) {
			?>
			<div class="dynamicFields" data-index="<?= $key ?>">
				<?php echo $this->Form->hidden('Field.'.$key.'.id'); ?>
				<?php echo $this->Admin->input('Field.'.$key.'.field', array('label' => 'Campo')) ?>
				<?php echo $this->Admin->input('Field.'.$key.'.name', array('label' => 'Name', 'help' => 'Texto que será substituído na Newsletter')) ?>
				<?php echo $this->Admin->input('Field.'.$key.'.type', array('type' => 'select', 'label' => 'Tipo', 'options' => array(
					'text' => 'Text',
					'textarea' => 'Textarea'
				) )) ?>
				<?php echo $this->Html->link('<i class="icon-trash icon-white"></i>', array(), array('escape' => false, 'class' => 'btn btn-danger btn-small btnDelField', 'title' => 'Excluir')); ?>
			</div>
			<?php
		}
		endif;
		?>

		<p><?php echo $this->Html->link('<i class="icon-plus icon-white"></i> Adicionar campo', array(), array('escape' => false, 'class' => 'btn btn-success', 'id' => 'btnAddField', 'title' => 'Adicionar')); ?></p>
	</fieldset>
	
	<div class="form-actions">
		<?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-primary btn-large', 'div' => false)); ?>
		<a class="btn btn-large" href="<?php echo Router::url('/admin/clientes')?>">Cancelar</a>
	</div>
	
<?php echo $this->Form->end(); ?>
