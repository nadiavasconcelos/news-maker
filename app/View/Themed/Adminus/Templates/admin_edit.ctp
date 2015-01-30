<?php
	$this->viewVars["requestJs"][] = array('admin/templates.js');
?>
<div class="expand-10">
	<?php
	$this->Html->addCrumb('Templates', '/admin/templates');
	$this->Html->addCrumb('Editar', false, array('class' => 'active'));
	?>
	
	<ul class="breadcrumb">
		<?php echo $this->Html->getCrumbs(' <span class="divider">/</span> '); ?>
	</ul>
	
	<div class="content-grid">
		<?php echo $this->element('Templates/form') ?>
	</div>
</div>