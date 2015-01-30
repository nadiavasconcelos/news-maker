<script type="text/javascript">
	URL_BASE = "<?php echo Router::url('/admin/', true); ?>";
	URL_BASE_SITE = "<?php echo Router::url('/', true); ?>";
</script>

<?php
$jsList = array('jquery-1.7.1.min', 'jquery.maskedinput-1.3', 'jquery.maskMoney', 'jquery.tipsy', 'jquery.jgrowl', 'bootstrap.min', 'app.form', 'admin');

if (isset($this->viewVars['requestJs']))
	$jsList[] = $this->viewVars['requestJs'];
	
echo $this->Html->script($jsList);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>