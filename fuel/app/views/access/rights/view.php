<h2>Viewing <span class='muted'>#<?php echo $access_right->id; ?></span></h2>

<p>
	<strong>Page:</strong>
	<?php echo $access_right->page; ?></p>
<p>
	<strong>Admin:</strong>
	<?php echo $access_right->admin; ?></p>
<p>
	<strong>Faculty:</strong>
	<?php echo $access_right->faculty; ?></p>
<p>
	<strong>User:</strong>
	<?php echo $access_right->user; ?></p>

<?php echo Html::anchor('access/rights/edit/'.$access_right->id, 'Edit'); ?> |
<?php echo Html::anchor('access/rights', 'Back'); ?>