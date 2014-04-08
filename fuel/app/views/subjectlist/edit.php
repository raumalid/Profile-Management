<h2>Editing <span class='muted'>Subjectlist</span></h2>
<br>

<?php echo render('subjectlist/_form'); ?>
<p>
	<?php echo Html::anchor('subjectlist/view/'.$subjectlist->id, 'View'); ?> |
	<?php echo Html::anchor('subjectlist', 'Back'); ?></p>
