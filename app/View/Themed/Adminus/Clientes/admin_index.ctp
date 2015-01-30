<div class="expand-10">
	
	<h2 class="title-grid">Clientes</h2>
	
	<div class="content-grid">
		
		<p><?php echo $this->Html->link('<i class="icon-plus icon-white"></i> Adicionar', array('action' => 'add'), array('escape' => false, 'class' => 'btn btn-success', 'title' => 'Adicionar')); ?></p>
		
		<div id="content">
		
			<?php if (!empty($clientes)): ?>
			
				<table border="0" cellpadding="3" cellspacing="3" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Ações</th>
						</tr>
					</thead>
					<?php $count = 0; ?>
					<?php foreach($clientes as $key => $cliente) : ?>
						<tr class="grid-item strip-<?php echo $count % 2; ?>">
							<td><?php echo $cliente['Cliente']['nome']; ?></td>
							<td width="160">
								<?php echo $this->Html->link('<i class="icon-pencil icon-white"></i>', array('action' => 'edit', $cliente['Cliente']['id']), array('title' => 'Editar', 'escape' => false, 'class' => 'btn btn-small btn-warning')); ?>
								<?php echo $this->Html->link('<i class="icon-trash icon-white"></i>', array('action' => 'del', $cliente['Cliente']['id']), array('escape' => false, 'class' => 'btn btn-danger btn-small', 'title' => 'Excluir'), 'Deseja realmente excluir este cliente?'); ?>
								<?php echo $this->Html->link('<i class="icon-book icon-white"></i>', array('action' => 'edit', $cliente['Cliente']['id']), array('title' => 'Templates', 'escape' => false, 'class' => 'btn btn-small btn-primary')); ?>
								<?php echo $this->Html->link('<i class="icon-th icon-white"></i>', array('action' => 'edit', $cliente['Cliente']['id']), array('title' => 'Newsletters', 'escape' => false, 'class' => 'btn btn-small btn-info')); ?>
							</td>
						</tr>
						<?php $count++ ?>
					<?php endforeach; ?>
					
				</table>
			
				<p><?php echo $this->element('admin/pagination') ?></p>
			
			<?php else : ?>
				
				<?php echo $this->Admin->warning('Não existem clientes!') ?>
				
			<?php endif ?>
		
		</div>
		
	</div>
	
</div>