<div class="attributes form">
<?php echo $form->create('Attribute');?>
	<fieldset>
 		<legend><?php __('Add Attribute');?></legend>
	<?php
		echo $form->input('datatype_id');
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Attributes', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Datatypes', true), array('controller'=> 'datatypes', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Datatype', true), array('controller'=> 'datatypes', 'action'=>'add')); ?> </li>
	</ul>
</div>
