# Quickstart

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

After install, the plugin will create the store page itself and set it to published.

::: info Custom page slug
You can customize the slug being used through the [configuration](/configuration). If you change the slug after initialization, be sure to delete the previously generated page.
:::

## Enable Apple Shortcut

If you want to enable the usage of Apple Shortcuts to upload new images, you have to set a secret in your `site/config/config.php`. This secret protects your website, so only you can upload images to your feed.

:::warning Caution!
Do not make this token public. Don't commit it to a git repository. If you store your `config.php` in git, please use a `.env` file to securely store your secrets. 

[How to use .env with Kirby](https://github.com/bnomei/kirby3-dotenv)
:::

```php
return [
	// ... Other options
	"femundfilou.kirby-moments.token" => "my-secret"
]
```
