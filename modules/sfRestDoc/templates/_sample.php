<?php use_javascript("../sfRestDocPlugin/js/xRegExp.js")?>
<?php use_javascript("../sfRestDocPlugin/js/shCore.js")?>
<?php if ($sample->getFormat() == "json"):?>
<?php use_javascript("../sfRestDocPlugin/js/shBrushJScript.js")?>
<?php elseif ($sample->getFormat() == "xml"):?>
<?php use_javascript("../sfRestDocPlugin/js/shBrushXml.js")?>
<?php endif;?>

<table>
	<tbody>
		<tr>
			<td class="sample-request-label"><?php echo $sample->getMethod()?></td>
			<td class="sample-request-url"><?php echo $sample->getUrl()?></td>
		</tr>
		<?php if ($sample->getData()):?>
		<tr>
			<td class="sample-request-label"><?php echo __("%method% Data", array("%method%" => $sample->getMethod()))?></td>
			<td class="sample-request-data"><?php echo $sample->getData()?></td>
		</tr>
		<?php endif;?>
	</tbody>
</table>

<pre class="brush: <?php echo ($sample->getFormat() == "json")?"js":$sample->getFormat()?>"><?php echo $sample->getResponse()?></pre>
