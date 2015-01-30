<script type="text/javascript">
	URL_BASE = "<?php echo Router::url('/', true); ?>";
</script>

<?php
$jsList = array('jquery.min');

if (isset($this->viewVars['requestJs']))
	$jsList[] = $this->viewVars['requestJs'];
?>

<?php echo $this->Html->script($jsList) ?>