<?php if ($publication): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($publication as $publications): ?>		<tr>

	
			<td><?php echo $publications->description; ?></td>
			
		</tr>
<?php endforeach; ?>	</tbody>
</table>
<?php endif;?>

