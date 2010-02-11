<div class="datatypes form">
<?php echo $form->create('Datatype');?>
	<fieldset>
 		<legend><?php __('Add Datatype');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('validation_proc');
		echo $html->link(__('Generate Validation Proc', true), array('action'=>'generatevalidationproc'));
		echo $form->input('format');
		echo $form->input('table');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Datatypes', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Attributes', true), array('controller'=> 'attributes', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Attribute', true), array('controller'=> 'attributes', 'action'=>'add')); ?> </li>
	</ul>
</div>
