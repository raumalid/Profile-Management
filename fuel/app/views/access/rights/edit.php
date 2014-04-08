<h2>Editing <span class='muted'>Access_right</span></h2>
<br>

<?php echo render('access/rights/_form'); ?>
<p>
	<?php echo Html::anchor('access/rights/view/'.$access_right->id, 'View'); ?> |
	<?php echo Html::anchor('access/rights', 'Back'); ?></p>
