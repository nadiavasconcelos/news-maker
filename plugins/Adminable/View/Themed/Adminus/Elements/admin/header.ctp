<?php
if(!defined('CURRENT_VIEW'))
	define('CURRENT_VIEW', $this->params['controller'] . '/' . $this->params['action']);

$cssList = array('admin');

if (isset($this->viewVars['requestCss']))
	$cssList[] = $this->viewVars['requestCss'];

echo $this->Html->css($cssList);
?>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />