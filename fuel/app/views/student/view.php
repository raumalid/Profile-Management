<h2>Viewing <span class='muted'>#<?php echo $student->id; ?></span></h2>

<p>
	<strong>Registration no:</strong>
	<?php echo $student->registration_no; ?></p>
<p>
	<strong>Roll no:</strong>
	<?php echo $student->roll_no; ?></p>
<p>
	<strong>Name:</strong>
	<?php echo $student->name; ?></p>
<p>
	<strong>Department:</strong>
	<?php echo $student->cgpa; ?></p>
<p>
	<strong>Contact:</strong>
	<?php echo $student->contact; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $student->email; ?></p>
<p>
	<strong>Image:</strong>
        <img src ='<?php echo "$student->image";?>' /></p>

<?php echo Html::anchor('student/edit/'.$student->id, 'Edit'); ?> |
<?php echo Html::anchor('student', 'Back'); ?>