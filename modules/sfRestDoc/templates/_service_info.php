    <div class="rest-doc-about">
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
