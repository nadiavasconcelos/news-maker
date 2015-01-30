<?php
	$this->viewVars["requestJs"][] = array('admin/ajaxcalls.js', 'admin/newsletters.js');
?>
<div class="expand-10">
	<?php
	$this->Html->addCrumb('Newsletters', '/admin/newsletters');
	$this->Html->addCrumb('Adicionar', false, array('class' => 'active'));
	?>
	
	<ul class="breadcrumb">
		<?php echo $this->Html->getCrumbs(' <span class="divider">/</span> '); ?>
	</ul>
	
	<div class="content-grid">
		<?php echo $this->element('Newsletters/form') ?>
	</div>
</div>