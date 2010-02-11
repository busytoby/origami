<div class="attributes view">
<h2><?php  __('Attribute');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $attribute['Attribute']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Datatype'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($attribute['Datatype']['name'], array('controller'=> 'datatypes', 'action'=>'view', $attribute['Datatype']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $attribute['Attribute']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Attribute', true), array('action'=>'edit', $attribute['Attribute']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Attribute', true), array('action'=>'delete', $attribute['Attribute']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $attribute['Attribute']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Attributes', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Attribute', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Datatypes', true), array('controller'=> 'datatypes', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Datatype', true), array('controller'=> 'datatypes', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Eav Data');?></h3>
	<?php if (!empty($attribute['EavData'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Attribute Id'); ?></th>
		<th><?php __('Entity Id'); ?></th>
		<th><?php __('Value Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($attribute['EavData'] as $eavData):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $eavData['id'];?></td>
			<td><?php echo $eavData['attribute_id'];?></td>
			<td><?php echo $eavData['entity_id'];?></td>
			<td><?php echo $eavData['value_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'eav_data', 'action'=>'view', $eavData['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'eav_data', 'action'=>'edit', $eavData['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'eav_data', 'action'=>'delete', $eavData['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $eavData['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Eav Data', true), array('controller'=> 'eav_data', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
