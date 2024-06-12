<?php

require __DIR__ . '/models/Moments.php';
require __DIR__ . '/models/Moment.php';

Kirby\Cms\App::plugin('femundfilou/moments', [
    'blueprints' => [
        'files/moment' => __DIR__ . '/blueprints/files/moment.yml',
        'pages/moments' => __DIR__ . '/blueprints/pages/moments.yml',
        'blocks/moments' => __DIR__ . '/blueprints/blocks/moments.yml',
        'sections/moments' => __DIR__ . '/blueprints/sections/moments.yml',
    ],
    'collections' => [
        'moments/all' => require_once __DIR__ . '/collections/moments/all.php'
    ],
    'components' => [
        'file::url' => function ($kirby, $file) {
            if ($kirby->visitor()->prefersJson() && $file->template() === 'moment') {
                return $kirby->url() . '/' . $file->parent()->slug() . '/' . $file->name();
            }

            return $file->mediaUrl();
        }
    ],
    'options' => [
        'dateformat' => '',
        'pageid' => '',
        'storeid' => 'moments',
        'feed' => [
            'active' => true
        ],
        'thumbs' => [
            'sizes' => [
                'grid' => '(min-width: 900px) 25vw, (min-width: 600px) 33vw, (min-width: 400px) 50vw, 100vw'
            ],
            'srcsets' => [
                'lightbox' => [
                    '300w'  => ['width' => 300, 'height' => 300],
                    '600w'  => ['width' => 600, 'height' => 600],
                    '900w'  => ['width' => 900, 'height' => 900],
                    '1800w'  => ['width' => 1800, 'height' => 1800]
                ],
                'lightbox-avif' => [
                    '300w'  => ['width' => 300, 'format' => 'avif', 'height' => 300],
                    '600w'  => ['width' => 600, 'format' => 'avif', 'height' => 600],
                    '900w'  => ['width' => 900, 'format' => 'avif', 'height' => 900],
                    '1800w'  => ['width' => 1800, 'format' => 'avif', 'height' => 1800]
                ],
                'lightbox-webp' => [
                    '300w'  => ['width' => 300, 'format' => 'webp', 'height' => 300],
                    '600w'  => ['width' => 600, 'format' => 'webp', 'height' => 600],
                    '900w'  => ['width' => 900, 'format' => 'webp', 'height' => 900],
                    '1800w'  => ['width' => 1800, 'format' => 'webp', 'height' => 1800]
                ],
                'grid' => [
                    '300w'  => ['width' => 300, 'height' => 300, 'crop' => true],
                    '600w'  => ['width' => 600, 'height' => 600, 'crop' => true],
                    '900w'  => ['width' => 900, 'height' => 900, 'crop' => true]
                ],
                'grid-avif' => [
                    '300w'  => ['width' => 300, 'format' => 'avif', 'height' => 300, 'crop' => true],
                    '600w'  => ['width' => 600, 'format' => 'avif', 'height' => 600, 'crop' => true],
                    '900w'  => ['width' => 900, 'format' => 'avif', 'height' => 900, 'crop' => true]
                ],
                'grid-webp' => [
                    '300w'  => ['width' => 300, 'format' => 'webp', 'height' => 300, 'crop' => true],
                    '600w'  => ['width' => 600, 'format' => 'webp', 'height' => 600, 'crop' => true],
                    '900w'  => ['width' => 900, 'format' => 'webp', 'height' => 900, 'crop' => true]
                ],
            ]
        ],
        'token' => '',
    ],
    'fieldMethods' => [
        'toMomentsTimestamp' => function ($field) {
            // Check if 'intl' extension is loaded
            if (option('date.handler') === 'intl') {
                // Use ICU date format pattern
                $format = 'yyyy-MM-dd\'T\'HH:mm:ssXXX';
            } else {
                // Use PHP date format
                $format = 'c';
            }

            return $field->exists() && $field->isNotEmpty() ? $field->toDate($format) : '';
        },
        'toMomentsDate' => function ($field) {
            if ($format = option('femundfilou.moments.dateformat')) {
                $format = $format;
            } elseif (option('date.handler') === 'intl') {
                $format = 'MM/dd/YYYY';
            } else {
                $format = 'm/d/Y';
            }

            return $field->exists() && $field->isNotEmpty() ? $field->toDate($format) : '';
        }
    ],
    'pageModels' => [
        'moments' => 'MomentsPage',
        'moment'  => 'MomentPage',
    ],
    'routes' => function () {
        $momentsPage = option('femundfilou.moments.pageid') ? page(option('femundfilou.moments.pageid')) : null;
        $momentsStore = option('femundfilou.moments.storeid') ? page(option('femundfilou.moments.storeid')) : null;
        $redirectRoutes = [];
        $feedRoutes = [];
        // Don't add routes if store is missing
        if (!$momentsStore) {
            return [];
        }
        // Check if store and page are different
        $useStorePageOnly = !$momentsPage || ($momentsPage && $momentsPage->is($momentsStore));
        // Set slug for routes
        $momentsSlug = $useStorePageOnly ? $momentsStore->uid() : $momentsPage->uid();
        // Add redirect routes if store and page are different
        if (!$useStorePageOnly) {
            $redirectRoutes = [
                [
                    'pattern' => '/' . $momentsSlug . '/(:all)',
                    'method' => 'GET',
                    'action' => function ($id) use ($momentsStore) {
                        if ($id === 'feed.xml') {
                            $this->next();
                        }
                        if ($id === 'feed.xsl') {
                            $this->next();
                        }
                        $page = $momentsStore->children()->find($id);
                        if (!$page) {
                            $page = site()->errorPage();
                        }
                        return site()->visit($page);
                    }
                ],
                [
                    'pattern' => '/' . $momentsStore->uid() . '/(:all)',
                    'method' => 'GET',
                    'action' => function ($id) use ($momentsPage) {
                        go($momentsPage . '/' . $id, 302);
                    }
                ]
            ];
        }

        if (false !== option('femundfilou.moments.feed.active', false)) {
            $feedRoutes = 	[
                [
                    'pattern' => '/' . $momentsSlug . '/feed.xsl',
                    'action' => function () {
                        kirby()->response()->type('text/xsl');

                        return Page::factory([
                            'slug' => 'feed',
                            'template' => 'feed',
                            'model' => 'feed',
                            'content' => [
                                'title' => t('feed'),
                            ],
                        ])->render(contentType: 'xsl');
                    }
                ],
                [
                    'pattern' => '/' . $momentsSlug . '/feed.xml',
                    'method' => 'GET',
                    'action' => function () {
                        kirby()->response()->type('text/xml');

                        return Page::factory([
                            'slug' => 'feed',
                            'template' => 'feed',
                            'model' => 'feed',
                            'content' => [
                                'title' => t('feed'),
                            ],
                        ])->render();
                    }
                ]
            ];
        }
        return [
            ...$redirectRoutes,
            ...$feedRoutes,
            [
                'pattern' => '/v1/moments/new',
                'method' => 'POST',
                'action' => function () {
                    // Check for the Authorization Header
                    $authHeader = kirby()->request()->header('Authorization');
                    $token = option('femundfilou.moments.token', '');

                    // Verify Bearer Token
                    if (!$token || !$authHeader || $authHeader !== 'Bearer ' . $token) {
                        return [
                            'status' => 'error',
                            'message' => 'Unauthorized access.'
                        ];
                    }

                    // Get the page where the file will be stored
                    $page = site()->getMomentsStorePage();
                    if (!$page) {
                        return [
                            'status' => 'error',
                            'message' => 'Page not found.'
                        ];
                    }

                    // Handle the file upload
                    try {
                        // Expecting file in the 'file' field
                        $upload = kirby()->request()->file('file');
                        if ($upload && $upload['error'] === 0) {
                            kirby()->impersonate('kirby');
                            $fileInfo = pathinfo($upload['name']);
                            $extension = $fileInfo['extension'];
                            $name = crc32(microtime()) . $extension;
                            $page->createFile([
                                'source'   => $upload['tmp_name'],
                                'filename' => $name,
                                'template' => 'moment',
                                'content' => [
                                    'date' => date('Y-m-d H:i:s'),
                                    'text' => ''
                                ]
                            ]);

                            // Success response with page URL
                            return [
                                'status' => 'success',
                                'url'    => $page->url(),
                            ];
                        } else {
                            throw new Exception('No file uploaded.');
                        }
                    } catch (Exception $e) {
                        return [
                            'status' => 'error',
                            'message' => 'Failed to upload image: ' . $e->getMessage(),
                        ];
                    }
                }
            ]
        ];
    },
    'siteMethods' => [
        'getMomentsStorePage' => function () {
            return option('femundfilou.moments.storeid') ? page(option('femundfilou.moments.storeid')) : null;
        },
        'getMomentsPage' => function () {
            return option('femundfilou.moments.pageid') ? page(option('femundfilou.moments.pageid')) : site()->getMomentsStorePage();
        }
    ],
    'snippets' => [
        'moments' => __DIR__ . '/snippets/moments.php',
        'moments-image' => __DIR__ . '/snippets/moments-image.php',
        'moments-image-footer' => __DIR__ . '/snippets/moments-image-footer.php',
        'moments-icon/clock' => __DIR__ . '/snippets/moments-icon/clock.php',
        'moments-icon/close' => __DIR__ . '/snippets/moments-icon/close.php',
        'moments-icon/prev' => __DIR__ . '/snippets/moments-icon/prev.php',
        'moments-icon/next' => __DIR__ . '/snippets/moments-icon/next.php',
        'layout/moments' => __DIR__ . '/snippets/layout/moments.php',
        'blocks/moments' => __DIR__ . '/snippets/blocks/moments.php',
    ],
    'templates' => [
        'moment' => __DIR__ . '/templates/moment.php',
        'moments' => __DIR__ . '/templates/moments.php',
        'feed.xsl' => __DIR__ . '/templates/feed.xsl.php',
        'feed' => __DIR__ . '/templates/feed.php'
    ],
    'translations' => [
        'de' => [
            'femundfilou.moments.aria-label.close' => 'Zurück zur Übersicht',
            'femundfilou.moments.aria-label.prev' => 'Vorheriges Foto',
            'femundfilou.moments.aria-label.next' => 'Nächstes Foto'
        ],
        'en' => [
            'femundfilou.moments.aria-label.close' => 'Back to overview',
            'femundfilou.moments.aria-label.prev' => 'Previous photo',
            'femundfilou.moments.aria-label.next' => 'Next photo'
        ],
        'fr' => [
            'femundfilou.moments.aria-label.close' => "Retour à l'aperçu",
            'femundfilou.moments.aria-label.prev' => 'Photo précédente',
            'femundfilou.moments.aria-label.next' => 'Photo suivante'
        ],
        'es' => [
            'femundfilou.moments.aria-label.close' => 'Volver a la vista general',
            'femundfilou.moments.aria-label.prev' => 'Foto anterior',
            'femundfilou.moments.aria-label.next' => 'Foto siguiente'
        ],
        'it' => [
            'femundfilou.moments.aria-label.close' => 'Torna alla panoramica',
            'femundfilou.moments.aria-label.prev' => 'Foto precedente',
            'femundfilou.moments.aria-label.next' => 'Foto successiva'
        ],
    ],
]);
