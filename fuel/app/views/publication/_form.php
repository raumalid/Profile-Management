<?php echo Form::open(array("class"=>"formee well")); ?>
<div class="grid-12-12" style="margin-top:-10px;">
    <div class="grid-3-12">
        <?php echo Html::anchor('faculty/', '<< Back', array('class' => 'btn btn-danger', 'style' => 'color:#fff;')); ?>
    </div>
</div>		<div class="grid-12-12">
                    <div class="grid-8-12">
		<?php echo Form::label('Description <em class="formee-req">*</em>', 'description'); ?>
        	<?php echo Form::input('description', Input::post('description', isset($publication) ? $publication->description : ''), array('class' => 'required', 'placeholder'=>'Description')); ?>
			</div>
    		<div class="grid-4-12">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
		</div>
	
</div>
<?php echo Form::close(); ?>