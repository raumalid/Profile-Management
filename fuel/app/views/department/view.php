<h2>Viewing <span class='muted'>#<?php echo $department->id; ?></span></h2>

<p>
	<strong>Department id:</strong>
	<?php echo $department->department_id; ?></p>
<p>
	<strong>Department name:</strong>
	<?php echo $department->department_name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $department->description; ?></p>

<?php echo Html::anchor('department/edit/'.$department->id, 'Edit'); ?> |
<?php echo Html::anchor('department', 'Back'); ?>