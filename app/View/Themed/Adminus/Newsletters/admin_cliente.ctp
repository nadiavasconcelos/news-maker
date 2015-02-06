<?php
// $this->viewVars["requestJs"][] = array('admin/templates.js');
?>
<div class="expand-10">
	
	<h2 class="title-grid">Newsletters</h2>
	
	<div class="content-grid">
		
		<p><?php echo $this->Html->link('<i class="icon-plus icon-white"></i> Adicionar', array('action' => 'add'), array('escape' => false, 'class' => 'btn btn-success', 'title' => 'Adicionar')); ?></p>
		
		<div id="content">
			<?php if (!empty($newsletters)): ?>
			
				<table border="0" cellpadding="3" cellspacing="3" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Data</th>
							<th>Assunto</th>
							<th>Cliente</th>
							<th>Ações</th>
						</tr>
					</thead>
					<?php $count = 0; ?>
					<?php foreach($newsletters as $key => $newsletter) : ?>
						<tr class="grid-item strip-<?php echo $count % 2; ?>">
							<td><?php echo date('d/m/Y', strtotime($newsletter['Newsletter']['created'])); ?></td>
							<td><?php echo $newsletter['Newsletter']['assunto']; ?></td>
							<td><?php echo $newsletter['Template']['Cliente']['nome']; ?></td>
							<td width="160">
								<?php echo $this->Html->link('<i class="icon-pencil icon-white"></i>', array('action' => 'edit', $newsletter['Newsletter']['id']), array('title' => 'Editar', 'escape' => false, 'class' => 'btn btn-small btn-warning')); ?>
								<?php echo $this->Html->link('<i class="icon-trash icon-white"></i>', array('action' => 'del', $newsletter['Newsletter']['id']), array('escape' => false, 'class' => 'btn btn-danger btn-small', 'title' => 'Excluir'), 'Deseja realmente excluir esta newsletter?'); ?>
								<?php echo $this->Html->link('<i class="icon-file icon-white"></i>', array('action' => 'view', $newsletter['Newsletter']['id']), array('title' => 'Visualizar', 'target' => '_blank', 'escape' => false, 'class' => 'btn btn-small btn-primary')); ?>
							</td>
						</tr>
						<?php $count++ ?>
					<?php endforeach; ?>
					
				</table>
			
				<p><?php echo $this->element('admin/pagination') ?></p>
			
			<?php else : ?>
				
				<?php echo $this->Admin->warning('Não existem newsletters') ?>
				
			<?php endif ?>
		
		</div>
		
	</div>
	
</div>