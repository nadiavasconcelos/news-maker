<?php echo $this->Html->script('modernizr'); ?>

<?php
if ($this->params['action'] != 'display')
	define('CURRENT_VIEW', $this->params['controller'] . '/' . $this->params['action']);
else
	define('CURRENT_VIEW', $this->params['controller'] . '/' . $this->params['pass'][0]);
?>

<?php
$cssList = array(CURRENT_VIEW);
if (isset($this->viewVars['requestCss'])):
	$cssList[] = $this->viewVars['requestCss'];
endif;
?>

<?php echo $this->Html->css($cssList); ?>
<?php echo $this->fetch('meta'); ?>
<?php echo $this->fetch('css'); ?>