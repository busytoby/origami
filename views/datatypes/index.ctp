<div class="datatypes index">
<h2><?php __('Datatypes');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('validation_proc');?></th>
	<th><?php echo $paginator->sort('format');?></th>
	<th><?php echo $paginator->sort('table');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($datatypes as $datatype):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $datatype['Datatype']['id']; ?>
		</td>
		<td>
			<?php echo $datatype['Datatype']['name']; ?>
		</td>
		<td>
			<?php echo $datatype['Datatype']['validation_proc']; ?>
		</td>
		<td>
			<?php echo $datatype['Datatype']['format']; ?>
		</td>
		<td>
			<?php echo $datatype['Datatype']['table']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $datatype['Datatype']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $datatype['Datatype']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $datatype['Datatype']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $datatype['Datatype']['id'])); ?>
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
		<li><?php echo $html->link(__('New Datatype', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Attributes', true), array('controller'=> 'attributes', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Attribute', true), array('controller'=> 'attributes', 'action'=>'add')); ?> </li>
	</ul>
</div>
