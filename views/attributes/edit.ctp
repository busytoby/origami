<div class="attributes form">
<?php echo $form->create('Attribute');?>
	<fieldset>
 		<legend><?php __('Edit Attribute');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('datatype_id');
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Attribute.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Attribute.id'))); ?></li>
		<li><?php echo $html->link(__('List Attributes', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Datatypes', true), array('controller'=> 'datatypes', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Datatype', true), array('controller'=> 'datatypes', 'action'=>'add')); ?> </li>
	</ul>
</div>
