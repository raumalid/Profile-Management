<h2>Listing <span class='muted'>Publications</span></h2>
<br>
<?php echo Html::anchor('employees/create', '<i class="icon-plus icon-white"></i> Add New Employee', array('class' => 'btn btn-inverse', 'style' => "color:#fff; float:right; margin-top:60px;margin-right:43px; margin-bottom:5px;")); ?>

<?php if ($publications): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Faculty  id</th>
			<th>Description</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($publications as $publication): ?>		<tr>

			<td><?php echo $publication->id; ?></td>
			<td><?php echo $publication->description; ?></td>
			
			<td>
				<?php echo Html::anchor('publication/view/'.$publication->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('publication/edit/'.$publication->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('publication/delete/'.$publication->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Publications.</p>

<?php endif; ?><p>
	
</p>
