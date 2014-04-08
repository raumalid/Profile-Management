<?php echo Form::open(array("class"=>"formee", 'style' => "margin-top:20px; margin-left:30px; width:1000px; margin-right:30px;", 'enctype' => "multipart/form-data")); ?>
<br />
		<div class="grid-12-12" style="margin-top:-10px; ">
                    <div class="grid-5-12">
			<?php echo Form::label('Name <em class="formee-req">*</em>', 'name', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('name', Input::post('name', isset($contact) ? $contact->name : ''), array('class' => 'required', 'placeholder'=>'Name')); ?>

			</div>
                    </div>
		</div>
		<div class="grid-12-12">
                    <div class="grid-5-12">
			<?php echo Form::label('Email <em class="formee-req">*</em>', 'email', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('email', Input::post('email', isset($contact) ? $contact->email : ''), array('class' => 'required', 'placeholder'=>'Email')); ?>

			</div>
		</div>
                </div>
		<div class="grid-12-12">
                    <div class="grid-5-12">
			<?php echo Form::label('Phone no <em class="formee-req">*</em>', 'phone_no', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('phone_no', Input::post('phone_no', isset($contact) ? $contact->phone_no : ''), array('class' => 'required', 'placeholder'=>'Phone no')); ?>

			</div>
		</div>
                </div>
		<div class="grid-12-12">
                    <div class="grid-5-12">
			<?php echo Form::label('Description <em class="formee-req">*</em>', 'description', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::textarea('description', Input::post('description', isset($contact) ? $contact->description : ''), array('class' => 'required', 'rows' => 8, 'placeholder'=>'Description')); ?>

			</div>
		</div>
                </div>
<br />
<div class="grid-12-12">&nbsp;</div>
		<div class="grid-12-12">
			<div class='grid-5-12'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
                
<?php echo Form::close(); ?>