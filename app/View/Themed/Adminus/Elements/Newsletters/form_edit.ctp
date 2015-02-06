<?php echo $this->Admin->formCreate('Newsletter', 'post'); ?>
	
	<fieldset>
		<legend>Newsletter</legend>
		<?php echo $this->Form->hidden('id'); ?>
		<?php echo $this->Admin->input('assunto', array('label' => 'Assunto', 'help' => 'Assunto do E-mail')) ?>
		<?php echo $this->Admin->input('url', array('label' => 'URL', 'help' => 'URL do HTML')) ?>
		<?php echo $this->Admin->input('template_id', array('type' => 'hidden')) ?>
	</fieldset>

	<fieldset id="fsCamposDinamicos">
		<legend>Campos dinâmicos</legend>
		
		<?php
		if( isset($fields) ):
		foreach ($fields as $key => $field) {
			// debug( $field ); die();
			?>
			<div class="dynamicFields" data-index="<?= $key ?>">
				<?php echo $this->Form->hidden('NewsletterField.'.$key.'.id'); ?>
				<?php echo $this->Form->hidden('NewsletterField.'.$key.'.newsletter_id'); ?>
				<?php echo $this->Form->hidden('NewsletterField.'.$key.'.field_id'); ?>
				<?php echo $this->Admin->input('NewsletterField.'.$key.'.value', array('label' => $field['Field']['field'])) ?>
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