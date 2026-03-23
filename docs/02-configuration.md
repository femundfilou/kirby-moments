---

title: Configuration

---

You can change aspects of the plugin in your `site/config/config.php`.

## Limit the number of moments

You can change the limit of moments displayed in the grid. By default, the moments section will display 8 moments at once.

```php
return [
  'moinframe.moments' => [
    'limit' => 20,
  ]
];
```

## Use overview page

The moments overview page (listing all moments) is disabled by default and visitors are redirected to the homepage instead. You can enable it if you do not want to use the block or have a simple landing page for your moments.

```php
return [
  'moinframe.moments' => [
    'overview' => true,
  ]
];
```

## Set display page

If you don't use the public overview page, you need to adjust the visible page of your moments.This will make the lightbox and rss feed aware of the page your images are display on, but still upload all images to your storage page. The storage page will redirect to this page. In this example, the images will still be stored in the page `moments` but display as `https://your-website.test/stories/image-1`.

```php
return [
  'moinframe.moments' => [
    'pageid' => 'stories',
  ]
];
```

## Use your homepage as the display page

This will make moment URLs appear at the root level of your site. In this example, the images will be stored in `moments` but display as `https://your-website.test/image-1`. The RSS feed will also be available at `https://your-website.test/feed.xml`.


```php
return [
  'moinframe.moments' => [
    'pageid' => '/',
  ]
];
```


## RSS Feed

The RSS feed is disabled by default, but you can enable it and also change the language.
```php
return [
  'moinframe.moments' => [
    'feed' => [
      'active' => true,
      'language' => 'en'
    ],
  ]
];
```

## Enhanced Lightbox

The JavaScript-enhanced lightbox is enabled by default. When enabled, clicking a moment opens it in an overlay without a full page reload, with keyboard navigation (arrow keys, escape) and URL updates via the History API. The lightbox is progressively enhanced - it still works without JavaScript. You can disable it like this:

```php
return [
  'moinframe.moments' => [
    'lightbox' => false,
  ]
];
```

## Change date format

You can change, how the date is being displayed. By default, the plugin will check whether you're using `intl` or `datetime` in your installation and will set a date based on the kirby language. You can overwrite the format like this:

```php
return [
  'moinframe.moments' => [
    'dateformat' => 'dd.MM.YYYY',
  ]
];
```


## Token system

If you don't need the upload API or token management, you can disable the token system entirely. This removes the token API routes and the upload endpoint (`/v1/moments/new`) from your site.

```php
return [
  'moinframe.moments' => [
    'tokens' => false,
  ]
];
```


## Use a different page for storage

You can change the page used to store all images by changing the slug here. Be sure to also change your template to `moments`, e.g. rename the content file to `moments.txt` or `moments.xx.txt` on a multi-language page. You can also delete the currently used store page and the plugin will generate a new store page automatically.

```php
return [
  'moinframe.moments' => [
    'storeid' => 'momentsstore',
  ]
];
```

##  Change the thumbnails

You can adjust the thumbnails being created by modifying the srcsets. You can also set `xx-webp` to `null` if you don't want to use this format.

```php
return [
  'moinframe.moments' => [
    'thumbs' => [
      'sizes' => [
        'grid' => '(min-width: 900px) 25vw, (min-width: 600px) 33vw, (min-width: 400px) 50vw, 100vw',
        'lightbox' => '100vw',
      ],
      'srcsets' => [
        'lightbox' => [
          '300w'  => ['width' => 300, 'height' => 300],
          '600w'  => ['width' => 600, 'height' => 600],
          '900w'  => ['width' => 900, 'height' => 900],
          '1800w'  => ['width' => 1800, 'height' => 1800]
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
        'grid-webp' => [
          '300w'  => ['width' => 300, 'format' => 'webp', 'height' => 300, 'crop' => true],
          '600w'  => ['width' => 600, 'format' => 'webp', 'height' => 600, 'crop' => true],
          '900w'  => ['width' => 900, 'format' => 'webp', 'height' => 900, 'crop' => true]
        ],
      ]
    ],
  ]
];
```
