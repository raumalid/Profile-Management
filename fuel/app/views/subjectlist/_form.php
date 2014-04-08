<?php echo Form::open(array("class" => "formee well")); ?>

<div class="grid-12-12" style="margin-top:-10px;">
    <div class="grid-3-12">
        <?php echo Html::anchor('subjectlist/', '<< Back', array('class' => 'btn btn-danger', 'style' => 'color:#fff;')); ?>
    </div>
</div>		<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('Course  id <em class="formee-req">*</em>', 'course_id'); ?>
        <?php echo Form::input('course_id', Input::post('course_id', isset($subjectlist) ? $subjectlist->course_id : ''), array('class' => 'required', 'placeholder' => 'Course id')); ?>
    </div>

    <div class="grid-4-12">
        <?php echo Form::label('Course Name <em class="formee-req">*</em>', 'course_name'); ?>
        <?php echo Form::input('course_name', Input::post('course_name', isset($subjectlist) ? $subjectlist->course_name : ''), array('class' => 'required', 'placeholder' => 'Name')); ?>

    </div>
    <div class="grid-4-12">
        <label class='control-label'>&nbsp;</label>
        <div class='controls'>
            <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
    </div>
</div>



<?php echo Form::close(); ?>