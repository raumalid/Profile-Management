<div class="headline">
    <h3 style="z-index:0;">List of <span class='muted'>Subjects</span>
    </h3></div><br>

<br>
<?php echo Html::anchor('subjectlist/create', '<i class="icon-plus icon-white"></i> Add New Subject', array('class' => 'btn btn-inverse', 'style' => "color:#fff; float:right; margin-top:30px;margin-right:10px; margin-bottom:5px;")); ?>
<?php if ($subjectlists): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Course id</th>
			<th>Course name</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($subjectlists as $subjectlist): ?>		<tr>

			<td><?php echo $subjectlist->course_id; ?></td>
			<td><?php echo $subjectlist->course_name; ?></td>
			<td>
				<?php echo Html::anchor('subjectlist/edit/'.$subjectlist->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('subjectlist/delete/'.$subjectlist->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Subjects.</p>

<?php endif; ?><p>
	

</p>
