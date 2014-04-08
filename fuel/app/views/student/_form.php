
<?php echo Form::open(array("class" => "formee well",'enctype' => 'multipart/form-data', 'style' => "margin-top:20px; margin-left:0px; width:1100px; font-size=3em;")); ?>
<br/>
<div class="grid-12-12" style="margin-top:-10px;">
    <div class="grid-3-12">
        <?php echo Html::anchor('student/', '<< Back', array('class' => 'btn btn-danger', 'style' => 'color:#fff;')); ?>
    </div>
</div>

<div class="grid-12-12">
    <div class="grid-6-12">
        <?php echo Form::label('Registration No <em class="formee-req">*</em>', 'registration_no'); ?>
        <?php echo Form::input('registration_no', Input::post('registration_no', isset($student) ? $student->id : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Registration_no','style' => "font-size=50px;")); ?>
    </div>
    <div class="grid-6-12">
        <?php echo Form::label('Roll_No <em class="formee-req">*</em>', 'roll_no'); ?>
        <?php echo Form::input('roll_no', Input::post('roll_no', isset($student) ? $student->roll_no: ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Roll No')); ?>
    </div>
</div>
<div class="grid-12-12">
    
    <div class="grid-6-12">
        <?php echo Form::label('Name <em class="formee-req">*</em>', 'name'); ?>
        <?php echo Form::input('name', Input::post('name', isset($student) ? $student->name : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Name')); ?>
    </div>
    <div class="grid-6-12">
        <?php echo Form::label('cgpa <em class="formee-req">*</em>', 'cgpa'); ?>
        <?php echo Form::input('cgpa', Input::post('cgpa', isset($student) ? $student->cgpa : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'cgpa')); ?>
        </div>
</div>
    
<div class="grid-12-12">
    <div class="grid-6-12">
        <?php echo Form::label('Phone No <em class="formee-req">*</em>', 'contact'); ?>
        <?php echo Form::input('contact', Input::post('contact', isset($student) ? $student->contact : ''), array( 'class' => 'formee-large','required', 'placeholder' => 'Phone No')); ?>
    </div>
    <div class="grid-6-12">
        <?php echo Form::label('Email <em class="formee-req">*</em>', 'email'); ?>
        <?php echo Form::input('email', Input::post('email', isset($student) ? $student->email : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Email')); ?>
    </div>
    
</div>
<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('Image', 'image'); ?>
        <?php echo Form::file('image', array('class' => 'formee-large')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('Year of Passing <em class="formee-req">*</em>', 'email'); ?>
        <?php echo createYears(1920, 2500, 'year', Input::post('year',isset($student)?$student->year : date('Y'))); ?>
    </div>
  
    <div class="grid-4-12 ">
        <input  class="btn btn-success" type='submit'  value="Save" style="margin-left:0px;margin-top: 32px;width:100px">
    </div>   
</div>

<?php echo Form::close(); ?>