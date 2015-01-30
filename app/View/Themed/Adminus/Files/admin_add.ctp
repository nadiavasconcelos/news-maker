<div class="expand-20">
	
	<!-- <h2 class="title-grid"><strong><?php #echo $venture['Venture']['name']; ?></strong> - Galeria de imagens</h2> -->
	
	<?php
	$this->Html->addCrumb('Empreendimentos', '/admin/ventures');
	$this->Html->addCrumb($venture['Venture']['name'], '/admin/ventures/view/' . $venture['Venture']['id']);
	$this->Html->addCrumb('Imagens', '/admin/files/index/' . $venture['Venture']['id']);
	$this->Html->addCrumb('Adicionar', false, array('class' => 'active'));
	?>
	
	<ul class="breadcrumb">
		<?php echo $this->Html->getCrumbs(' <span class="divider">/</span> '); ?>
	</ul>
	
	<div class="content-grid">
		
		<?php echo $this->Form->create('File', array('type' => 'file', 'class' => 'form-horizontal')) ?>
		
		<fieldset>
			<legend>Upload</legend>
			
			<?php echo $this->Form->input('extension', array('type' => 'hidden')) ?>
			<?php echo $this->Form->input('venture_id', array('type' => 'hidden', 'value' => $venture['Venture']['id'])) ?>
			
			<div class="control-group">
				<label for="optionsCheckbox2" class="control-label">Destaque</label>
				<div class="controls">
					<label class="checkbox">
						<?php echo $this->Form->input('main', array('type' => 'checkbox', 'label' => 'imagem principal', 'div' => false)) ?>
					</label>
				</div>
			</div>
			
			<div class="control-group">
				<label for="optionsCheckbox2" class="control-label">Logotipo</label>
				<div class="controls">
					<label class="checkbox">
						<?php echo $this->Form->input('logo', array('type' => 'checkbox', 'label' => 'logotipo para exibição na apresentação e no slide', 'div' => false)) ?>
					</label>
				</div>
			</div>
			
			<div class="control-group">
				<label for="appendedInput" class="control-label">Galeria</label>
				<div class="controls">
					<?php echo $this->Form->input('type', array('type' => 'select', 'options' => array('' => 'Selecione...', 'image' => 'imagem do empreendimento', 'perspective' => 'imagem da perspectiva', 'plan' => 'imagem da planta', 'bairro' => 'Imagem do bairro', 'slide' => 'Imagem para o slide da home'), 'class' => 'input-medium', 'label' => false, 'div' => false)) ?>
					<p class="help-block">Selecione onde deseja subir as imagens</p>
				</div>
			</div>
			
			<div class="control-group">
				<label for="appendedInput" class="control-label">Imagem</label>
				<div class="controls">
					<?php echo $this->Form->input('name.', array('type' => 'file', 'multiple' => 'multiple', 'class' => 'input-small', 'label' => false, 'div' => false)); ?>
					<p class="help-block">Apenas jpg/jpeg com máximo de 2mb.<br /> Se a imagem for para o Slider da Home, a largura deverá ser maior que 1600px e altura maior que 447px</p>
				</div>
			</div>
			
		</fieldset>
		
		<div class="form-actions">
			<?php echo $this->Form->submit('Enviar', array('class' => 'btn btn-primary btn-large', 'div' => false)); ?>
			<a class="btn btn-large">Cancelar</a>
		</div>
		
		<?php echo $this->Form->end(); ?>
		
	</div>

</div>