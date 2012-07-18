                    <tr>
                        <td class="param">
                            <p><?php echo __($param->getRawValue()->getName())?></p>
                            <?php if ($param->getRawValue()->getRequired()):?>
                            <strong><?php echo __("requis") ?></strong>
                            <?php  else:?>
							<small><?php echo __("optionnel")?></small>
                            <?php  endif;?>
                        </td>
                        <td class="param-description">
                            <p><?php  echo __($param->getRawValue()->getDescription())?></p>
                            <?php if ($param->getRawValue()->getSample()):?>
                            <p><strong><?php echo __("Exemple de valeur :") ?></strong> <tt><?php echo __($param->getSample())?></tt></p>
                            <?php endif;?>
                        </td>
                    </tr>
                    