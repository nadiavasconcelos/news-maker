<?php echo $this->Admin->formCreate('Newsletter', 'post'); ?>
	
	<fieldset>
		<legend>Newsletter</legend>
		<?php echo $this->Form->hidden('id'); ?>
		<?php echo $this->Admin->input('assunto', array('label' => 'Assunto', 'help' => 'Assunto do E-mail')) ?>
		<?php echo $this->Admin->input('url', array('label' => 'URL', 'help' => 'URL do HTML')) ?>
		<?php echo $this->Admin->input('cliente_id', array('label' => 'Cliente', 'help' => 'Escolha o Cliente')) ?>
		<?php echo $this->Admin->input('template_id', array('label' => 'Template', 'help' => 'Escolha o Template')) ?>
		<?php //echo $this->Admin->input('content', array('type' => 'textarea', 'class' => 'span9 txtTemplateHeight', 'label' => 'Template', 'help' => 'Código em HTML')) ?>
	</fieldset>

	<fieldset id="fsCamposDinamicos">
		<legend>Campos dinâmicos</legend>
		<!-- <div class="control-group">
			<label class="control-label" for="">FIELD</label>
			<div class="controls">
				<input name="data[NewsletterField][KEY][value]" class="input-xlarge" type="text" value="" id="NewsletterFieldKEYValue">
			</div>
		</div> -->
	</fieldset>
	
	<div class="form-actions">
		<?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-primary btn-large', 'div' => false)); ?>
		<a class="btn btn-large" href="<?php echo Router::url('/admin/newsletters')?>">Cancelar</a>
	</div>
	
<?php echo $this->Form->end(); ?>