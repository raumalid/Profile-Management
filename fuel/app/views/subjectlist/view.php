<h2>Viewing <span class='muted'>#<?php echo $subjectlist->id; ?></span></h2>

<p>
	<strong>Course id:</strong>
	<?php echo $subjectlist->course_id; ?></p>
<p>
	<strong>Course name:</strong>
	<?php echo $subjectlist->course_name; ?></p>

<?php echo Html::anchor('subjectlist/edit/'.$subjectlist->id, 'Edit'); ?> |
<?php echo Html::anchor('subjectlist', 'Back'); ?>