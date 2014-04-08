<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('Page', 'page', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('page', Input::post('page', isset($access_right) ? $access_right->page : ''), array('class' => 'span4', 'placeholder'=>'Page')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Admin', 'admin', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('admin', Input::post('admin', isset($access_right) ? $access_right->admin : ''), array('class' => 'span4', 'placeholder'=>'Admin')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Faculty', 'faculty', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('faculty', Input::post('faculty', isset($access_right) ? $access_right->faculty : ''), array('class' => 'span4', 'placeholder'=>'Faculty')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('User', 'user', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('user', Input::post('user', isset($access_right) ? $access_right->user : ''), array('class' => 'span4', 'placeholder'=>'User')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>