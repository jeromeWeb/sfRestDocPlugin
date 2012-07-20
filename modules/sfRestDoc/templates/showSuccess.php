<h1><?php echo $service->getTitle() ?></h1>

<div id="content-main">
	<?php include_partial("service_main", array("service" => $service))?>
</div>

<div id="content-sidebar">
	<?php include_partial("service_info", array("service" => $service))?>
</div>
