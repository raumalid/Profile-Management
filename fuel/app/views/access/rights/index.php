<h2>Listing <span class='muted'>Access_rights</span></h2>
<br>
<?php if ($access_rights): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Page</th>
			<th>Admin</th>
			<th>Faculty</th>
			<th>User</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($access_rights as $access_right): ?>		<tr>

			<td><?php echo $access_right->page; ?></td>
			<td><?php echo $access_right->admin; ?></td>
			<td><?php echo $access_right->faculty; ?></td>
			<td><?php echo $access_right->user; ?></td>
			<td>
				<?php echo Html::anchor('access/rights/view/'.$access_right->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('access/rights/edit/'.$access_right->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('access/rights/delete/'.$access_right->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Access_rights.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('access/rights/create', 'Add new Access right', array('class' => 'btn btn-success')); ?>

</p>
