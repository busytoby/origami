<div class="attributes index">
<h2><?php __('Attributes');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('datatype_id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($attributes as $attribute):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $attribute['Attribute']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($attribute['Datatype']['name'], array('controller'=> 'datatypes', 'action'=>'view', $attribute['Datatype']['id'])); ?>
		</td>
		<td>
			<?php echo $attribute['Attribute']['name']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $attribute['Attribute']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $attribute['Attribute']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $attribute['Attribute']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $attribute['Attribute']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Attribute', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Datatypes', true), array('controller'=> 'datatypes', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Datatype', true), array('controller'=> 'datatypes', 'action'=>'add')); ?> </li>
	</ul>
</div>
