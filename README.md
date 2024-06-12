![Kirby Moments](kirby-moments.png)
# Kirby Moments
## Little Moments Matter. Share Yours.

This plugin adds a simple photo feed to your [Kirby CMS](https://getkirby.com) powered website. 

With the help of an Apple Shortcut, you can instantly post photos from your iOS or macOS device to your website. Every of your moments has it's own url you can share. And there also is a rss feed for others to subscribe to.

## Documentation

For more information on how to install and customize the plugin, visit the documentation <https://plugins.femundfilou.com/kirby-moments>

## Installation
You can install this plugin in three different ways, depending on personal preference.

### Install via download

[Download](https://github.com/femundfilou/kirby-moments/releases/latest) and copy the latest release to `/site/plugins/moments`.

### Install as git submodule

```sh
git submodule add https://github.com/femundfilou/kirby-moments.git site/plugins/moments
```

### Install as composer package

```sh
composer require femundfilou/kirby-moments
```

## Create necessary folder

This plugin needs a page to store all images. By default, the plugin will look for a page with the slug `moments` and the template of `moments`.

Create a new page called `Moments` and rename it's txt file to `moments.txt` or `moments.xx.txt` if you're using a multi-language enabled page (`.xx.` being your default language code).

::: info Custom page slug
You can customize the slug being used through the [configuration](/configuration).
:::

## Enable Apple Shortcut

If you want to enable the usage of Apple Shortcuts to upload new images, you have to set a secret in your `site/config/config.php`. This secret protects your website, so only you can upload images to your feed.

> [!WARNING]
> Do not make this token public. Don't commit it to a git repository. If you store > your `config.php` in git, please use a `.env` file to securely store your secrets.
> 
> [How to use .env with Kirby](https://github.com/bnomei/kirby3-dotenv)


```php
return [
	// ... Other options
	"femundfilou.moments.token" => "my-secret"
]
```

## License

MIT

## Credits

© [Justus Kraft](https://github.com/jukra00)
