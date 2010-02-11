<div class="datatypes form">
<?php echo $form->create('Datatype');?>
	<fieldset>
 		<legend><?php __('Edit Datatype');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('validation_proc');
		echo $html->link(__('Generate Validation Proc', true), array('action'=>'generatevalidationproc'));
		echo '<br><br>';
		echo $form->input('format');
		echo 'Valid formats are : blank (empty format field), origami_phone, origami_postal, origami_ssn, origami_date<br><br>';
		echo $form->input('table');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Datatype.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Datatype.id'))); ?></li>
		<li><?php echo $html->link(__('List Datatypes', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Attributes', true), array('controller'=> 'attributes', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Attribute', true), array('controller'=> 'attributes', 'action'=>'add')); ?> </li>
	</ul>
</div>
