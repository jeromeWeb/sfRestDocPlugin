<h1><?php echo $service->getTitle() ?></h1>

<div id="content-inner">
    <div id="content-main">
        <p><?php echo __($service->getDescription()) ?></p>
        
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
        
        <div class="field field-doc-sample-request">
            <h2><?php echo __("Exemple de requête") ?></h2>
           	<?php foreach ($service->getSamples() as $sample):?>
          	<?php include_partial("sample", array("sample" => $sample))?>
            <?php endforeach;?>
        </div>
    </div>
    <div id="content-sidebar">
        <div class="api-doc-about">
            <h2><?php echo __("Informations du service") ?></h2>
            <table>
                <tbody>
                    <tr class="odd">
                        <td><?php echo __("Authentification requise ?") ?></td>
                        <td><?php echo $service->getSecurity()?__("Oui"):__("Non")?></td>
                    </tr>
                    <tr class="even">
                        <td><?php echo __("Format de réponse") ?></td>
                        <td><?php echo implode("<br />", explode(" ",$service->getResponseFormat()))?></td>
                    </tr>
                    <tr class="odd">
                        <td><?php echo __("Méthode HTTP") ?></td>
                        <td><?php echo $service->getMethod()?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="clear"></div>
