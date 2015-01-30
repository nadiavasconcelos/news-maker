<?php
if (!empty($template)):
	echo $template['Template']['content'];
else :
	echo $this->Admin->warning('Template não encontrado');
endif;
?>