<div class="headline">
    <h3 style="z-index:0;">Viewing all <span class='muted'>Messages</span>
    </h3></div><br>
<br>
<?php if ($contacts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone no</th>
			<th>Description</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($contacts as $contact): ?>		<tr>

			<td><?php echo $contact->name; ?></td>
			<td><?php echo $contact->email; ?></td>
			<td><?php echo $contact->phone_no; ?></td>
			<td><?php echo $contact->description; ?></td>
			<td>
				<?php echo Html::anchor('contact/delete/'.$contact->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Messages.</p>

<?php endif; ?><p>

</p>
