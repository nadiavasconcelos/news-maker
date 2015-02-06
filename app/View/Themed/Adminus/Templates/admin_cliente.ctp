<?php
// $this->viewVars["requestJs"][] = array('admin/templates.js');
?>
<div class="expand-10">
	
	<h2 class="title-grid">Templates</h2>
	
	<div class="content-grid">
		
		<p><?php echo $this->Html->link('<i class="icon-plus icon-white"></i> Adicionar', array('action' => 'add'), array('escape' => false, 'class' => 'btn btn-success', 'title' => 'Adicionar')); ?></p>
		
		<div id="content">
			<?php if (!empty($templates)): ?>
			
				<table border="0" cellpadding="3" cellspacing="3" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Template</th>
							<th>Cliente</th>
							<th>Ações</th>
						</tr>
					</thead>
					<?php $count = 0; ?>
					<?php foreach($templates as $key => $template) : ?>
						<tr class="grid-item strip-<?php echo $count % 2; ?>">
							<td><?php echo $template['Template']['titulo']; ?></td>
							<td><?php echo $template['Cliente']['nome']; ?></td>
							<td width="160">
								<?php echo $this->Html->link('<i class="icon-pencil icon-white"></i>', array('action' => 'edit', $template['Template']['id']), array('title' => 'Editar', 'escape' => false, 'class' => 'btn btn-small btn-warning')); ?>
								<?php echo $this->Html->link('<i class="icon-trash icon-white"></i>', array('action' => 'del', $template['Template']['id']), array('escape' => false, 'class' => 'btn btn-danger btn-small', 'title' => 'Excluir'), 'Deseja realmente excluir este template?'); ?>
								<?php echo $this->Html->link('<i class="icon-file icon-white"></i>', array('action' => 'view', $template['Template']['id']), array('title' => 'Visualizar', 'target' => '_blank', 'escape' => false, 'class' => 'btn btn-small btn-primary')); ?>
								<?php echo $this->Html->link('<i class="icon-th icon-white"></i>', array('controller' => 'newsletters', 'action' => 'template', $template['Template']['id']), array('title' => 'Newsletters', 'escape' => false, 'class' => 'btn btn-small btn-info')); ?>
							</td>
						</tr>
						<?php $count++ ?>
					<?php endforeach; ?>
					
				</table>
			
				<p><?php echo $this->element('admin/pagination') ?></p>
			
			<?php else : ?>
				
				<?php echo $this->Admin->warning('Não existem templates') ?>
				
			<?php endif ?>
		
		</div>
		
	</div>
	
</div>