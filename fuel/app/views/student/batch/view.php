<h2>Viewing <span class='muted'>#<?php echo $student_batch->id; ?></span></h2>

<p>
	<strong>Start year:</strong>
	<?php echo $student_batch->start_year; ?></p>
<p>
	<strong>End year:</strong>
	<?php echo $student_batch->end_year; ?></p>

<?php echo Html::anchor('student/batch/edit/'.$student_batch->id, 'Edit'); ?> |
<?php echo Html::anchor('student/batch', 'Back'); ?>