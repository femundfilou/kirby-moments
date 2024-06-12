<?php if ($page->date()->isNotEmpty()) : ?>
	<?php snippet('moments-icon/clock'); ?>
	<time class="moment-time" datetime="<?= $page->date()->toMomentsTimestamp() ?>"><?= $page->date()->toMomentsDate() ?></time>
<?php endif; ?>