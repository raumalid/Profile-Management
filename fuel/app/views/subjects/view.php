<h2>Viewing <span class='muted'>#<?php echo $subject->id; ?></span></h2>

<p>
	<strong>Faculty  id:</strong>
	<?php echo $subject->faculty__id; ?></p>
<p>
	<strong>Course id:</strong>
	<?php echo $subject->course_id; ?></p>
<p>
	<strong>Course name:</strong>
	<?php echo $subject->course_name; ?></p>

<?php echo Html::anchor('subjects/edit/'.$subject->id, 'Edit'); ?> |
<?php echo Html::anchor('subjects', 'Back'); ?>