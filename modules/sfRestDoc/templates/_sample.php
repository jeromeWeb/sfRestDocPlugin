<?php use_stylesheet("../sfRestDocPlugin/css/prettify.css")?>
<?php use_javascript("../sfRestDocPlugin/js/google-code-prettify/prettify.js")?>

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
		<tr>
			<td class="sample-request-label"><?php echo __("HTTP status code")?></td>
			<td class="sample-request-statuscode"><?php echo $sample->getStatusCode()?></td>
		</tr>
	</tbody>
</table>

<pre class="prettyprint linenums"><?php echo $sample->getResponse()?></pre>

<script type="text/javascript">
	prettyPrint();
</script>