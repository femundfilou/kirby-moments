<?php

declare(strict_types=1);

return function ($site) {
    $store = $site->getMomentsStorePage();
    $limit = option('moinframe.moments.limit', 8);
    if (!$store) {
        return new Kirby\Cms\Collection([]);
    }
    return $store->children()->filterBy('intendedTemplate', 'moment')->sortBy('date', 'desc')->limit($limit);
};
