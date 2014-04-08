<?php echo Form::open(array("class" => "formee well")); ?>


<div class="grid-12-12" style='margin-top:15px;'>
    <div class='grid-4-12'>
        <?php echo Form::label('Start year', 'start_year', array('class' => 'control-label')); ?>

        <div class="controls">
            <?php echo createYears(1920, 2500, 'start_year', Input::post('start_year', isset($student_batch) ? $student_batch->start_year : date('Y')-4)); ?>

        </div>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('End year', 'end_year', array('class' => 'control-label')); ?>

        <div class="controls">
            <?php echo createYears(1920, 2500, 'end_year', Input::post('dob_year', isset($student_batch) ? $student_batch->end_year : date('Y'))); ?>

        </div>
    </div>
    <div class="grid-4-12">
        <label class='control-label'>&nbsp;</label>
        <div class='controls'>
            <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
    </div>
</div>
<?php echo Form::close(); ?>