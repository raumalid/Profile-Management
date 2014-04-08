<h2>Editing <span class='muted'>Publication</span></h2>
<br>

<?php echo render('publication/_form'); ?>
<p>
	<?php echo Html::anchor('publication/view/'.$publication->id, 'View'); ?> |
	<?php echo Html::anchor('publication', 'Back'); ?></p>
