<?php echo $this->Admin->formCreate('Newsletter', 'post'); ?>
	
	<fieldset>
		<legend>Newsletter</legend>
		<?php echo $this->Form->hidden('id'); ?>
		<?php echo $this->Admin->input('assunto', array('label' => 'Assunto', 'help' => 'Assunto do E-mail')) ?>
		<?php echo $this->Admin->input('url', array('label' => 'URL', 'help' => 'URL do HTML')) ?>
		<?php echo $this->Admin->input('template_id', array('label' => 'Template', 'help' => 'Escolha o Template')) ?>
	</fieldset>

	<fieldset id="fsCamposDinamicos">
		<legend>Campos dinâmicos</legend>
		
		<?php
		if( isset($fields) ):
		foreach ($fields as $key => $field) {
			?>
			<div class="dynamicFields" data-index="<?= $key ?>">
				<?php echo $this->Form->hidden('NewsletterField.'.$key.'.id'); ?>
				<?php echo $this->Admin->input('NewsletterField.'.$key.'.value', array('label' => 'Content')) ?>
				<?php echo $this->Html->link('<i class="icon-trash icon-white"></i>', array(), array('escape' => false, 'class' => 'btn btn-danger btn-small btnDelField', 'title' => 'Excluir')); ?>
			</div>
			<?php
		}
		endif;
		?>

	</fieldset>
	
	<div class="form-actions">
		<?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-primary btn-large', 'div' => false)); ?>
		<a class="btn btn-large" href="<?php echo Router::url('/admin/newsletters')?>">Cancelar</a>
	</div>
	
<?php echo $this->Form->end(); ?>