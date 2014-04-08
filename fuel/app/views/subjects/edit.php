<h2>Editing <span class='muted'>Subject</span></h2>
<br>

<?php echo render('subjects/_form'); ?>
<p>
	<?php echo Html::anchor('subjects/view/'.$subject->id, 'View'); ?> |
	<?php echo Html::anchor('subjects', 'Back'); ?></p>
