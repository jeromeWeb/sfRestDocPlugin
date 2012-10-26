<?php use_stylesheet("../sfRestDocPlugin/css/prettify.css")?>
<?php use_javascript("../sfRestDocPlugin/js/google-code-prettify/prettify.js")?>

    <div class="field field-doc-url">
        <h2><?php echo __("Description") ?></h2>
	    <p><?php echo __($service->getDescription()) ?></p>
    </div>
    
    <div class="field field-doc-url">
        <h2><?php echo __("URL du service") ?></h2>
        <p><?php echo $service->getUrl() ?></p>
    </div>
    
    <div class="field field-doc-params">
    <h2><?php echo __("Paramètres") ?></h2>
    <?php if ($service->hasParameter()):?>
        <table>
            <tbody>
            	<?php foreach ($service->getParams() as $param):?>
            	<?php include_partial("param", array("param" => $param))?>
                <?php endforeach;?>
            </tbody>
        </table>
        <?php else:?>
        <p><?php echo __("Aucun paramètre")?></p>
    <?php endif;?>
    </div>

    <?php if ($service->getDocumentation()): ?>
    <div class="field field-doc-sample-request">
        <h2><?php echo __("A propos de ce service") ?></h2>
        <?php echo $service->getDocumentation() ?>
    </div>
    <?php endif;?>

	<?php if ($service->hasSample()):?>        
    <div class="field field-doc-sample-request">
        <h2><?php echo __("Exemple de requête") ?></h2>
       	<?php foreach ($service->getSamples() as $sample):?>
      	<?php include_partial("sample", array("sample" => $sample))?>
        <?php endforeach;?>
    </div>
    
    <script type="text/javascript">
	prettyPrint();
	</script>
	
    <?php endif;?>