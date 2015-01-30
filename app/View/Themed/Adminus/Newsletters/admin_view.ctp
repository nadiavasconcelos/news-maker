<?php
if (!empty($newsletter)):
	echo $newsletter['Newsletter']['content'];
else :
	echo $this->Admin->warning('Template não encontrado');
endif;
?>