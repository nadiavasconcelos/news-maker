<div class="expand-20">
	
	<!-- <h2 class="title-grid"><strong><?php #echo $venture['Venture']['name']; ?></strong> - Galeria de imagens</h2> -->
	<?php
	$this->Html->addCrumb('Empreendimentos', '/admin/ventures');
	$this->Html->addCrumb($venture['Venture']['name'], '/admin/ventures/view/' . $venture['Venture']['id']);
	$this->Html->addCrumb('Imagens', false, array('class' => 'active'));
	?>
	
	<ul class="breadcrumb">
		<?php echo $this->Html->getCrumbs(' <span class="divider">/</span> '); ?>
	</ul>
	
	<div class="content-grid">
		
		<p class="expand-10">
			<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> Adicionar', array('action' => 'add', $venture['Venture']['id']), array('escape' => false, 'class' => 'btn btn-success', 'title' => 'Adicionar imagem')); ?>
			<?php echo $this->Html->link('<i class="icon-chevron-left icon-white"></i> Voltar', '/admin/ventures/index', array('class' => 'btn btn-info', 'escape' => false, 'title' => 'voltar')) ?>
		</p>
		
		<div class="expand-10 clearfix">
			
			<div class="expand-20 clearfix">
				<?php if (isset($venture['Destaque']) && !empty($venture['Destaque'])): ?>
					<h4 class="page-header">Destaque</h4>
					<ul class="thumbnails unstyled">
					<?php foreach ($venture['Destaque'] as $destaque): ?>
						<li class="span3 box-10">
							<div class="thumbnail pagination-centered">
								<?php echo $this->Html->image($destaque['path'] . 'vga_' . $destaque['name'], array('class' => 'thumbnail')) ?>
								<div class="caption">
									<p>
										<span class="editable" data-id="<?php echo $destaque['id'] ?>"><?php echo empty($destaque['legend']) ? 'legenda' : $destaque['legend'] ?></span>
									</p>
								</div>
								<?php echo $this->Html->link('<i class="icon-trash icon-white"></i> apagar', array('action' => 'del', $destaque['id'], $venture['Venture']['id']), array('escape' => false, 'class' => 'btn btn-small btn-danger', 'title' => 'Excluir'), 'Deseja realmente excluir esta imagem?'); ?>
							</div>
						</li>
					<?php endforeach ?>
					</ul>
				<?php endif; ?>
			</div>
			
			<div class="expand-20 clearfix">
				<?php if (isset($venture['Slideshow']) && !empty($venture['Slideshow'])): ?>
					<h4 class="page-header">slide da home</h4>
					<ul class="thumbnails unstyled">
					<?php foreach ($venture['Slideshow'] as $slide): ?>
						<li class="span3 box-10">
							<div class="thumbnail pagination-centered">
								<?php echo $this->Html->image($slide['path'] . 'vga_' . $slide['name'], array('class' => 'thumbnail')) ?>
								<div class="caption">
									<p>
										<span class="editable" data-id="<?php echo $slide['id'] ?>"><?php echo empty($slide['legend']) ? 'legenda' : $slide['legend'] ?></span>
									</p>
								</div>
								<?php echo $this->Html->link('<i class="icon-trash icon-white"></i> apagar', array('action' => 'del', $slide['id'], $venture['Venture']['id']), array('escape' => false, 'class' => 'btn btn-small btn-danger', 'title' => 'Excluir'), 'Deseja realmente excluir esta imagem?'); ?>
							</div>
						</li>
					<?php endforeach ?>
					</ul>
				<?php endif; ?>
			</div>
			
			<div class="expand-20 clearfix">
			<?php if (isset($venture['Logo']) && !empty($venture['Logo'])): ?>
				<h4 class="page-header">Logo</h4>
				<ul class="thumbnails unstyled">
				<?php foreach ($venture['Logo'] as $img): ?>
					<li class="span3 box-10">
						<div class="thumbnail pagination-centered">
							<?php echo $this->Html->image($img['path'] . 'vga_' . $img['name'], array('class' => 'thumbnail')) ?>
							<div class="caption">
								<p>
									<span class="editable" data-id="<?php echo $img['id'] ?>"><?php echo empty($img['legend']) ? 'legenda' : $img['legend'] ?></span>
								</p>
							</div>
							<?php echo $this->Html->link('<i class="icon-trash icon-white"></i> apagar', array('action' => 'del', $img['id'], $venture['Venture']['id']), array('escape' => false, 'class' => 'btn btn-small btn-danger', 'title' => 'Excluir'), 'Deseja realmente excluir esta imagem?'); ?>
						</div>
					</li>
				<?php endforeach ?>
				</ul>
			<?php endif; ?>
			</div>
			
			<div class="expand-20 clearfix">
			
			<?php if (isset($venture['Imagem']) && !empty($venture['Imagem']) && isset($venture['Diferencial']) && !empty($venture['Diferencial'])): ?>
				<?php $venture['Imagem'] = array_merge($venture['Imagem'], $venture['Diferencial']); ?>
			<?php endif ?>
			
			<?php if (!empty($venture['Imagem']) && isset($venture['Upgrade']) && !empty($venture['Upgrade'])): ?>
				<?php $venture['Imagem'] = array_merge($venture['Imagem'], $venture['Upgrade']); ?>
			<?php endif ?>
			
			<?php if (!empty($venture['Imagem']) && isset($venture['StageDestaque']) && !empty($venture['StageDestaque'])): ?>
				<?php $venture['Imagem'] = array_merge($venture['Imagem'], $venture['StageDestaque']); ?>
			<?php endif ?>
			
			<?php $imagens = array(0); ?>
			<?php if (isset($venture['Imagem']) && !empty($venture['Imagem'])): ?>
				
				<h4 class="page-header">Galeria</h4>
				<ul class="thumbnails unstyled">
				<?php foreach ($venture['Imagem'] as $img): ?>
					
					<?php if (in_array($img['id'], $imagens)): ?>
						<?php continue ?>
					<?php else: ?>
						<?php array_push($imagens, $img['id']) ?>
					<?php endif; ?>
					
					<li class="span3 box-10">
						<div class="thumbnail pagination-centered">
							<?php echo $this->Html->image($img['path'] . 'vga_' . $img['name'], array('class' => 'thumbnail')) ?>
							<div class="caption">
								<p>
									<span class="editable" data-id="<?php echo $img['id'] ?>"><?php echo empty($img['legend']) ? 'legenda' : $img['legend'] ?></span>
								</p>
							</div>
							<?php echo $this->Html->link('<i class="icon-trash icon-white"></i> apagar', array('action' => 'del', $img['id'], $venture['Venture']['id']), array('escape' => false, 'class' => 'btn btn-small btn-danger', 'title' => 'Excluir'), 'Deseja realmente excluir esta imagem?'); ?>
						</div>
					</li>
				<?php endforeach ?>
				</ul>
			<?php endif; ?>
			</div>
			
			<div class="expand-20 clearfix">
			<?php if (isset($venture['Planta']) && !empty($venture['Planta'])): ?>
				<h4 class="page-header">Planta</h4>
				<ul class="thumbnails unstyled">
				<?php foreach ($venture['Planta'] as $planta): ?>
					<li class="span3 box-10">
						<div class="thumbnail pagination-centered">
							
							<?php if ($planta['type'] == 'application/pdf'): ?>
								<?php echo $this->Html->link($this->Html->image('icons/icon-pdf.gif', array('align' => 'absmiddle')), $planta['path'] . $planta['name'], array('escape' => false, 'title' => $planta['name'])) ?>
								<br>
							<?php else: ?>
								<?php echo $this->Html->image($planta['path'] . 'vga_' . $planta['name'], array('class' => 'thumbnail')) ?>
								<div class="caption">
									<p>
										<span class="editable" data-id="<?php echo $planta['id'] ?>"><?php echo empty($planta['legend']) ? 'legenda' : $planta['legend'] ?></span>
									</p>
								</div>
							<?php endif; ?>
							
							
							<?php echo $this->Html->link('<i class="icon-trash icon-white"></i> apagar', array('action' => 'del', $planta['id'], $venture['Venture']['id']), array('escape' => false, 'class' => 'btn btn-small btn-danger', 'title' => 'Excluir'), 'Deseja realmente excluir esta imagem?'); ?>
						</div>
					</li>
				<?php endforeach ?>
				</ul>
			<?php endif; ?>
			</div>
			
			<div class="expand-20 clearfix">
			<?php if (isset($venture['Perspectiva']) && !empty($venture['Perspectiva'])): ?>
				<h4 class="page-header">Perspectiva</h4>
				<ul class="thumbnails unstyled">
				<?php foreach ($venture['Perspectiva'] as $perspective): ?>
					<li class="span3 box-10">
						<div class="thumbnail pagination-centered">
							<?php echo $this->Html->image($perspective['path'] . 'vga_' . $perspective['name'], array('class' => 'thumbnail')) ?>
							<div class="caption">
								<p>
									<span class="editable" data-id="<?php echo $perspective['id'] ?>"><?php echo empty($perspective['legend']) ? 'legenda' : $perspective['legend'] ?></span>
								</p>
							</div>
							<?php echo $this->Html->link('<i class="icon-trash icon-white"></i> apagar', array('action' => 'del', $perspective['id'], $venture['Venture']['id']), array('escape' => false, 'class' => 'btn btn-small btn-danger', 'title' => 'Excluir'), 'Deseja realmente excluir esta imagem?'); ?>
						</div>
					</li>
				<?php endforeach ?>
				</ul>
			<?php endif; ?>
			</div>
			
			<div class="expand-20 clearfix">
				<?php if (isset($venture['Bairro']) && !empty($venture['Bairro'])): ?>
					<h4 class="page-header">Bairro</h4>
					<ul class="thumbnails unstyled">
					<?php foreach ($venture['Bairro'] as $bairro): ?>
						<li class="span3 box-10">
							<div class="thumbnail pagination-centered">
								<?php echo $this->Html->image($bairro['path'] . 'vga_' . $bairro['name'], array('class' => 'thumbnail')) ?>
								<div class="caption">
									<p>
										<span class="editable" data-id="<?php echo $bairro['id'] ?>"><?php echo empty($bairro['legend']) ? 'legenda' : $bairro['legend'] ?></span>
									</p>
								</div>
								<?php echo $this->Html->link('<i class="icon-trash icon-white"></i> apagar', array('action' => 'del', $bairro['id'], $venture['Venture']['id']), array('escape' => false, 'class' => 'btn btn-small btn-danger', 'title' => 'Excluir'), 'Deseja realmente excluir esta imagem?'); ?>
							</div>
						</li>
					<?php endforeach ?>
					</ul>
				<?php endif; ?>
			</div>
			
		</div>
		
	</div>

</div>

<?php echo $this->Html->scriptBlock("
jQuery('.editable').eip('" . Router::url('/admin/files/update.ajax', true) . "', { 
	form_type: 'textarea'
});
", array('inline' => false)) ?>