<div class="datatypes form">
<?php echo $form->create('Datatype', array('action' => 'generatevalidationproc'));?>
	<fieldset>
 		<legend><?php __('Generate Validation Proc');?></legend>
	<?php
		echo $form->input('validation_array', array('type' => 'textarea'));
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
