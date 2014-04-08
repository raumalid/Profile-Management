
<?php echo Form::open(array('enctype' => 'multipart/form-data', "class" => "formee well", 'style' => "margin-top:20px; margin-left:30px; width:1000px; margin-right:30px;", 'enctype' => "multipart/form-data")); ?>
<br/>
<div class="grid-12-12" style="margin-top:-10px;">
    <div class="grid-3-12">
        <?php echo Html::anchor('faculty/', '<< Back', array('class' => 'btn btn-danger', 'style' => 'color:#fff;')); ?>
    </div>
</div>	
<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('Faculty  id <em class="formee-req">*</em>', 'id'); ?>
        <?php echo Form::input('id', Input::post('id', isset($faculty) ? $faculty->id : ''), array('class' => 'required', 'placeholder' => 'Faculty  id')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('Title <em class="formee-req">*</em>', 'title'); ?>
        <?php
        echo Form::select('title', Input::post('title', isset($faculty) ? $faculty->title : ''), array(
            'Dr' => 'Dr.',
            'Mr' => 'Mr.',
            'Ms' => 'Ms.',
            'Mrs' => 'Mrs.'));
        ?>

    </div>

    <div class="grid-4-12">
        <?php echo Form::label('Name <em class="formee-req">*</em>', 'name'); ?>
        <?php echo Form::input('name', Input::post('name', isset($faculty) ? $faculty->name : ''), array('class' => 'required', 'placeholder' => 'Name')); ?>

    </div>

</div>
<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('Designation <em class="formee-req">*</em>', 'designation'); ?>


        <?php echo Form::input('designation', Input::post('designation', isset($faculty) ? $faculty->designation : ''), array('class' => 'required', 'placeholder' => 'Designation')); ?>

    </div>

    <div class="grid-4-12">
        <?php echo Form::label('Department <em class="formee-req">*</em>', 'department'); ?>

        <?php echo Form::input('department', Input::post('department', isset($faculty) ? $faculty->department : ''), array('class' => 'required', 'placeholder' => 'Department')); ?>

    </div>

    <div class="grid-4-12">
        <?php echo Form::label('College <em class="formee-req">*</em>', 'college'); ?>


        <?php echo Form::input('college', Input::post('college', isset($faculty) ? $faculty->college : ''), array('class' => 'required', 'placeholder' => 'College')); ?>

    </div>
</div>
<div class="grid-12-12">
    <div class="grid-6-12">
        <?php echo Form::label('Phone <em class="formee-req">*</em>', 'phone', array('class' => 'control-label')); ?>


        <?php echo Form::input('phone', Input::post('phone', isset($faculty) ? $faculty->phone : ''), array('class' => 'required', 'placeholder' => 'Phone')); ?>

    </div>

    <div class="grid-6-12">
        <?php echo Form::label('Email <em class="formee-req">*</em>', 'email', array('class' => 'control-label')); ?>


        <?php echo Form::input('email', Input::post('email', isset($faculty) ? $faculty->email : ''), array('class' => 'required', 'placeholder' => 'Email')); ?>

    </div>
</div>
<div class="grid-12-12">
    <div class="grid-6-12">
        <?php echo Form::label('Qualification <em class="formee-req">*</em>', 'education', array('class' => 'control-label')); ?>


        <?php echo Form::input('education', Input::post('education', isset($faculty) ? $faculty->education : ''), array('class' => 'required', 'placeholder' => 'Education')); ?>

    </div>

    <div class="grid-6-12">
        <?php echo Form::label('Research interest <em class="formee-req">*</em>', 'research_interest', array('class' => 'control-label')); ?>


        <?php echo Form::input('research_interest', Input::post('research_interest', isset($faculty) ? $faculty->research_interest : ''), array('class' => 'required', 'placeholder' => 'Research interest')); ?>

    </div>
</div>
<div class="grid-12-12">
    <div class="grid-6-12">
        <?php echo Form::label('Image', 'image', array('class' => 'control-label')); ?>
        <?php echo Form::file('image', array('class' => 'formee-large')); ?>

    </div>

    <div class="grid-4-12">
        <label class='control-label'>&nbsp;</label>
        <div class='controls'>
            <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
    </div></div>
<?php echo Form::close(); ?>