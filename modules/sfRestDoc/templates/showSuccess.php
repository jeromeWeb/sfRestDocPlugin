<h1><?php echo $service->getTitle() ?></h1>

<?php include_partial("service_info", array("service" => $service))?>
<?php include_partial("service_main", array("service" => $service))?>
