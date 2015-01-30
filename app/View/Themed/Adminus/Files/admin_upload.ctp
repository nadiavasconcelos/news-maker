<div class="expand-20">
	
	<h2 class="title-grid">Upload de imagem</h2>
	
	<div class="content-grid">
		
		<?php
		echo $this->element("Cuploadify.uploadify",  array(
			"plugin" => "Cuploadify",
			"dom_id" => "file_upload",
			"session_id" => CakeSession::id(),
			"include_scripts" => array(),
			"options" => array(
				"script" => "/cuploadify/tests/upload",
				"folder" => "/files",
				"buttonText" => "ADD FILE",
				"auto" => true,
				"multi" => true,
			)
		));?>
		
	</div>
	
</div>