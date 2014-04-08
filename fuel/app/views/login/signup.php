<div class="headline">
    <h3 style="z-index:0;">Create <span class='muted'>Account</span>
    </h3></div><br>
<?php echo Form::open(array("class"=>"formee well")); ?>

	
		<div class="grid-12-12" style="margin-top:20px;">
                    <div class="grid-4-12">
			<?php echo Form::label('Faculty_id', 'faculty_id', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('faculty_id', Input::post('faculty_id', isset($user) ? $user->faculty_id: ''), array('class' => 'formee-large', 'placeholder'=>'Faculty_id')); ?>

			</div>
                    </div>
                    <div class="grid-4-12">
			<?php echo Form::label('Username', 'username', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'formee_large', 'placeholder'=>'Username')); ?>

			</div>
		</div>
		<div class="grid-4-12">
			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::password('password', Input::post('password',''), array('class' => 'formee_large', 'placeholder'=>'Password')); ?>

			</div>
		</div>
                </div>
		
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary','style'=> 'margin-left:30px;')); ?>			</div>
		</div>

<?php echo Form::close(); ?>