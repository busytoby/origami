<div class="datatypes view">
<h2><?php  __('Datatype');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $datatype['Datatype']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $datatype['Datatype']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Validation Proc'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $datatype['Datatype']['validation_proc']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Format'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $datatype['Datatype']['format']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Table'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $datatype['Datatype']['table']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Datatype', true), array('action'=>'edit', $datatype['Datatype']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Datatype', true), array('action'=>'delete', $datatype['Datatype']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $datatype['Datatype']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Datatypes', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Datatype', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Attributes', true), array('controller'=> 'attributes', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Attribute', true), array('controller'=> 'attributes', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Attributes');?></h3>
	<?php if (!empty($datatype['Attribute'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Datatype Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($datatype['Attribute'] as $attribute):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $attribute['id'];?></td>
			<td><?php echo $attribute['datatype_id'];?></td>
			<td><?php echo $attribute['name'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'attributes', 'action'=>'view', $attribute['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'attributes', 'action'=>'edit', $attribute['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'attributes', 'action'=>'delete', $attribute['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $attribute['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Attribute', true), array('controller'=> 'attributes', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
