<?php

return [
    'system.loadPlugins:after' => function () {
        $kirby = Kirby::instance();
        $storeId = option('moinframe.moments.storeid', 'moments');

        if ($kirby->page($storeId)?->exists()) {
            return;
        }

        $kirby->impersonate('kirby');
        $momentsPage = $kirby->site()->createChild([
            'slug' => $storeId,
            'template' => 'moments',
            'content' => [
                'title' => t('moinframe.moments.panel.section.label'),
                'uuid' => 'moments'
            ]
        ]);
        $momentsPage->changeStatus('unlisted');
        $kirby->impersonate('nobody');
    },
];
