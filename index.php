<?php

use Kirby\Cms\App as Kirby;
use Kirby\Filesystem\F;

require __DIR__ . '/models/Moments.php';
require __DIR__ . '/models/Moment.php';

F::loadClasses([
    'moinframe\\moments\\menu' => 'src/Menu.php',
    'moinframe\\moments\\tokens' => 'src/Tokens.php',
], __DIR__);


Kirby::plugin('moinframe/moments', [
    'options' => [
        'dateformat' => '',
        'overview' => false,
        'pageid' => '',
        'storeid' => 'moments',
        'feed' => [
            'active' => false,
            'language' => ''
        ],
        'limit' => 8,
        'lightbox' => true,
        'thumbs' => [
            'sizes' => [
                'grid' => '(min-width: 900px) 25vw, (min-width: 600px) 33vw, (min-width: 400px) 50vw, 100vw'
            ],
            'srcsets' => [
                'lightbox' => [
                    '300w'  => ['width' => 300, 'height' => 300],
                    '600w'  => ['width' => 600, 'height' => 600],
                    '900w'  => ['width' => 900, 'height' => 900],
                    '1800w' => ['width' => 1800, 'height' => 1800]
                ],
                'lightbox-webp' => [
                    '300w'  => ['width' => 300, 'format' => 'webp', 'height' => 300],
                    '600w'  => ['width' => 600, 'format' => 'webp', 'height' => 600],
                    '900w'  => ['width' => 900, 'format' => 'webp', 'height' => 900],
                    '1800w' => ['width' => 1800, 'format' => 'webp', 'height' => 1800]
                ],
                'grid' => [
                    '300w'  => ['width' => 300, 'height' => 300, 'crop' => true],
                    '600w'  => ['width' => 600, 'height' => 600, 'crop' => true],
                    '900w'  => ['width' => 900, 'height' => 900, 'crop' => true]
                ],
                'grid-webp' => [
                    '300w'  => ['width' => 300, 'format' => 'webp', 'height' => 300, 'crop' => true],
                    '600w'  => ['width' => 600, 'format' => 'webp', 'height' => 600, 'crop' => true],
                    '900w'  => ['width' => 900, 'format' => 'webp', 'height' => 900, 'crop' => true]
                ],
            ]
        ],
        'token' => '',
        'tokens' => true,
    ],
    'blueprints' => [
        'files/moment' => __DIR__ . '/blueprints/files/moment.yml',
        'pages/moments' => __DIR__ . '/blueprints/pages/moments.yml',
        'blocks/moments' => __DIR__ . '/blueprints/blocks/moments.yml',
        'sections/moments' => __DIR__ . '/blueprints/sections/moments.yml',
    ],
    'areas' => [
        'moments' => require __DIR__ . '/areas/moments.php',
    ],
    'api' => [
        'routes' => option('moinframe.moments.tokens', true) !== false ? require __DIR__ . '/extensions/apiRoutes.php' : [],
    ],
    'collections' => [
        'moments/all' => require_once __DIR__ . '/collections/moments/all.php'
    ],
    'components' => require __DIR__ . '/extensions/components.php',
    'hooks' => require __DIR__ . '/extensions/hooks.php',
    'fieldMethods' => require __DIR__ . '/extensions/fieldMethods.php',
    'pageModels' => [
        'moments' => 'MomentsPage',
        'moment'  => 'MomentPage',
    ],
    'routes' => require __DIR__ . '/extensions/routes.php',
    'siteMethods' => require __DIR__ . '/extensions/siteMethods.php',
    'sections' => [
        'moments-tokens' => require __DIR__ . '/sections/tokens.php',
    ],
    'snippets' => [
        'moments' => __DIR__ . '/snippets/moments.php',
        'moments-image' => __DIR__ . '/snippets/moments-image.php',
        'moments-image-footer' => __DIR__ . '/snippets/moments-image-footer.php',
        'moments-icon/clock' => __DIR__ . '/snippets/moments-icon/clock.php',
        'moments-icon/close' => __DIR__ . '/snippets/moments-icon/close.php',
        'moments-icon/prev' => __DIR__ . '/snippets/moments-icon/prev.php',
        'moments-icon/next' => __DIR__ . '/snippets/moments-icon/next.php',
        'moments-lightbox' => __DIR__ . '/snippets/moments-lightbox.php',
        'layout/moments' => __DIR__ . '/snippets/layout/moments.php',
        'blocks/moments' => __DIR__ . '/snippets/blocks/moments.php',
    ],
    'templates' => [
        'moment' => __DIR__ . '/templates/moment.php',
        'moments' => __DIR__ . '/templates/moments.php',
        'feed.xsl' => __DIR__ . '/templates/feed.xsl.php',
        'feed' => __DIR__ . '/templates/feed.php'
    ],
    'translations' => require __DIR__ . '/extensions/translations.php',
]);
