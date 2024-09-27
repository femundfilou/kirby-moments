<?php
if ($image = $moment->image()) :
    $type = $type ?? 'lightbox';
    $sizes = $type === 'grid' ? option('femundfilou.kirby-moments.thumbs.sizes.grid', 'auto') : option('femundfilou.kirby-moments.thumbs.sizes.lightbox', '100vw');
    ?>
	<figure class="moment-image">
		<picture>
			<?php if ($type === 'grid') : ?>
				<?php if (option('femundfilou.kirby-moments.thumbs.srcsets.grid-avif')) : ?>
					<source srcset="<?= $image->srcset(option('femundfilou.kirby-moments.thumbs.srcsets.grid-avif')) ?>" sizes="<?= $sizes ?>" type="image/avif">
				<?php endif; ?>
				<?php if (option('femundfilou.kirby-moments.thumbs.srcsets.grid-webp')) : ?>
					<source srcset="<?= $image->srcset(option('femundfilou.kirby-moments.thumbs.srcsets.grid-webp')) ?>" sizes="<?= $sizes ?>" type="image/webp">
				<?php endif; ?>
				<img alt="<?= $moment->alt()->or($moment->text())->or($moment->title()) ?>" src="<?= $image->crop(600)->url() ?>" srcset="<?= $image->srcset(option('femundfilou.kirby-moments.thumbs.srcsets.grid')) ?>" sizes="<?= $sizes ?>" width="<?= $image->crop(600)->width() ?>" height="<?= $image->crop(600)->height() ?>">
			<?php else : ?>
				<?php if (option('femundfilou.kirby-moments.thumbs.srcsets.lightbox-avif')) : ?>
					<source srcset="<?= $image->srcset(option('femundfilou.kirby-moments.thumbs.srcsets.lightbox-avif')) ?>" sizes="<?= $sizes ?>" type="image/avif">
				<?php endif; ?>
				<?php if (option('femundfilou.kirby-moments.thumbs.srcsets.lightbox-webp')) : ?>
					<source srcset="<?= $image->srcset(option('femundfilou.kirby-moments.thumbs.srcsets.lightbox-webp')) ?>" sizes="<?= $sizes ?>" type="image/webp">
				<?php endif; ?>
				<img alt="<?= $moment->alt()->or($moment->text())->or($moment->title()) ?>" src="<?= $image->crop(900)->url() ?>" srcset="<?= $image->srcset(option('femundfilou.kirby-moments.thumbs.srcsets.lightbox')) ?>" sizes="<?= $sizes ?>" width="<?= $image->crop(900)->width() ?>" height="<?= $image->crop(900)->height() ?>">
			<?php endif; ?>
		</picture>
	</figure>
	<div class="moment-image-footer">
		<?php snippet('moments-image-footer', ['page' => $moment]); ?>
	</div>
<?php endif; ?>