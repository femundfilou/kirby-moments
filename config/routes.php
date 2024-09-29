<?php

/**
 * Defines routes for the Kirby Moments plugin
 * @return array Routes configuration
 */

use Kirby\Cms\Page;

return function () {
    $momentsPage = option('femundfilou.kirby-moments.pageid') ? page(option('femundfilou.kirby-moments.pageid')) : null;
    $momentsStore = option('femundfilou.kirby-moments.storeid') ? page(option('femundfilou.kirby-moments.storeid')) : null;

    if (!$momentsStore) {
        return [];
    }

    $useStorePageOnly = !$momentsPage || ($momentsPage && $momentsPage->is($momentsStore));
    $momentsSlug = $useStorePageOnly ? $momentsStore->uid() : $momentsPage->uid();

    $routes = [];

    if (!$useStorePageOnly) {
        $routes = array_merge($routes, getRedirectRoutes($momentsSlug, $momentsStore, $momentsPage));
    }

    if (option('femundfilou.kirby-moments.feed.active', true) !== false) {
        $routes = array_merge($routes, getFeedRoutes($momentsSlug));
    }

    $routes[] = getNewMomentRoute();

    return $routes;
};

/**
 * Get redirect routes for moments
 * @param string $momentsSlug
 * @param Page $momentsStore
 * @param Page|null $momentsPage
 * @return array
 */
function getRedirectRoutes($momentsSlug, $momentsStore, $momentsPage)
{
    return [
        [
            'pattern' => "/{$momentsSlug}/(:all)",
            'method' => 'GET',
            'action' => function ($id) use ($momentsStore) {
                if (in_array($id, ['feed.xml', 'feed.xsl'])) {
                    return $this->next();
                }
                $page = $momentsStore->children()->find($id) ?? site()->errorPage();
                return site()->visit($page);
            }
        ],
        [
            'pattern' => "/{$momentsStore->uid()}/(:all)",
            'method' => 'GET',
            'action' => function ($id) use ($momentsPage) {
                go("{$momentsPage}/{$id}", 302);
            }
        ]
    ];
}

/**
 * Get feed routes
 * @param string $momentsSlug
 * @return array
 */
function getFeedRoutes($momentsSlug)
{
    return [
        [
            'pattern' => "/{$momentsSlug}/feed.xsl",
            'action' => function () {
                return renderFeedPage('text/xsl', 'xsl');
            }
        ],
        [
            'pattern' => "/{$momentsSlug}/feed.xml",
            'method' => 'GET',
            'action' => function () {
                return renderFeedPage('text/xml');
            }
        ]
    ];
}

/**
 * Render feed page
 * @param string $contentType
 * @param string|null $renderType
 * @return Kirby\Cms\Page
 */
function renderFeedPage($contentType, $renderType = 'html')
{
    kirby()->response()->type($contentType);
    return Page::factory([
        'slug' => 'feed',
        'template' => 'feed',
        'model' => 'feed',
        'content' => ['title' => t('feed')],
    ])->render(contentType: $renderType);
}

/**
 * Get route for creating new moment
 * @return array
 */
function getNewMomentRoute()
{
    return [
        'pattern' => '/v1/moments/new',
        'method' => 'POST',
        'action' => function () {
            if (!verifyToken()) {
                return ['status' => 'error', 'message' => 'Unauthorized access.'];
            }

            $page = site()->getMomentsStorePage();
            if (!$page) {
                return ['status' => 'error', 'message' => 'Page not found.'];
            }

            try {
                $file = uploadFile($page);
                return ['status' => 'success', 'url' => $page->url()];
            } catch (Exception $e) {
                return ['status' => 'error', 'message' => 'Failed to upload image: ' . $e->getMessage()];
            }
        }
    ];
}

/**
 * Verify bearer token
 * @return bool
 */
function verifyToken()
{
    $authHeader = kirby()->request()->header('X-MOMENTS-TOKEN');
    $token = option('femundfilou.kirby-moments.token', '');
    return $token && $authHeader && $authHeader === "{$token}";
}

/**
 * Upload file to page
 * @param Kirby\Cms\Page $page
 * @return Kirby\Cms\File
 * @throws Exception
 */
function uploadFile($page)
{
    $upload = kirby()->request()->file('file');
    if (!$upload || $upload['error'] !== 0) {
        throw new Exception('No file uploaded or upload error.');
    }

    kirby()->impersonate('kirby');
    $extension = pathinfo($upload['name'], PATHINFO_EXTENSION);
    $filename = crc32(microtime()) . ".{$extension}";

    return $page->createFile([
        'source'   => $upload['tmp_name'],
        'filename' => $filename,
        'template' => 'moment',
        'content'  => ['date' => date('Y-m-d H:i:s'), 'text' => '']
    ]);
}
