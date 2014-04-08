<h2>Listing <span class='muted'>Subjects</span></h2>
<br>
<?php if ($subjects): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Faculty  id</th>
			<th>Course id</th>
			<th>Course name</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($subjects as $subject): ?>		<tr>

			<td><?php echo $subject->faculty_id; ?></td>
			<td><?php echo $subject->course; ?></td>
			
			<td>
				<?php echo Html::anchor('subjects/view/'.$subject->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('subjects/edit/'.$subject->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('subjects/delete/'.$subject->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Subjects.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('subjects/create', 'Add new Subject', array('class' => 'btn btn-success')); ?>

</p>
