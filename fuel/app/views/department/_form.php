<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('Department id', 'department_id', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('department_id', Input::post('department_id', isset($department) ? $department->department_id : ''), array('class' => 'span4', 'placeholder'=>'Department id')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Department name', 'department_name', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('department_name', Input::post('department_name', isset($department) ? $department->department_name : ''), array('class' => 'span4', 'placeholder'=>'Department name')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('description', Input::post('description', isset($department) ? $department->description : ''), array('class' => 'span4', 'placeholder'=>'Description')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>