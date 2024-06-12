<ul class="moments-grid">
	<?php foreach (collection('moments/all') as $moment) : ?>
		<li>
			<a href="<?= $moment->url() ?>" class="moment">
				<?php
                snippet('moments-image', ['moment' => $moment, 'type' => 'grid']);
	    ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>