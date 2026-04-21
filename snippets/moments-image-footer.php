<?php

use Kirby\Toolkit\Str;
?>
<?php if ($page->date()->isNotEmpty()) : ?>
    <?php if ($page->text()->isNotEmpty()) : ?>
        <div class="moments-image-footer__text">
            <p><?= Str::unhtml(str_replace(['<br>', '<br/>', '<br />'], "\n", $page->text())) ?></p>
        </div>
    <?php endif; ?>
    <moments-time class="moments-image-footer__time">
        <?php snippet('moments-icon/clock'); ?>
        <time datetime="<?= $page->date()->toMomentsTimestamp() ?>"><?= $page->date()->toMomentsDate() ?></time>
    </moments-time>
<?php endif; ?>