<?php use_stylesheet("../sfRestDocPlugin/js/sh/styles/shCore.css")?>
<?php use_stylesheet("../sfRestDocPlugin/js/sh/styles/shThemeDefault.css")?>
<?php use_javascript("../sfRestDocPlugin/js/sh/scripts/XRegExp.js")?>
<?php use_javascript("../sfRestDocPlugin/js/sh/scripts/shCore.js")?>
<?php if ($sample->getFormat() == "json"):?>
<?php use_javascript("../sfRestDocPlugin/js/sh/scripts/shBrushJScript.js")?>
<?php elseif ($sample->getFormat() == "xml"):?>
<?php use_javascript("../sfRestDocPlugin/js/sh/scripts/shBrushXml.js")?>
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

<script type="text/javascript">
     SyntaxHighlighter.all()
</script>