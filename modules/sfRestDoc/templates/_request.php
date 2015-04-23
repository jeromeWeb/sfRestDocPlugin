<table>
	<tbody>
		<tr>
			<td class="sample-request-label"><?php echo __("Méthode HTTP")?></td>
			<td class="sample-request-statuscode"><?php echo $request->getMethod()?></td>
		</tr>
        <tr>
            <td class="sample-request-label"><?php echo __("Format de paramètre") ?></td>
            <td class="sample-request-statuscode"><?php echo $request->getFormat()?></td>
        </tr>
	</tbody>
</table>

<pre class="prettyprint linenums"><?php echo $request->getResponse()?></pre>
