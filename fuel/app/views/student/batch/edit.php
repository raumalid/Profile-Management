<h2>Editing <span class='muted'>Student_batch</span></h2>
<br>

<?php echo render('student/batch/_form'); ?>
<p>
	<?php echo Html::anchor('student/batch/view/'.$student_batch->id, 'View'); ?> |
	<?php echo Html::anchor('student/batch', 'Back'); ?></p>
