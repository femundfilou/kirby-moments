---
title: Getting Started
---

After you have added the plugin to your Kirby installation, these are the next steps.

### 1. Content Storage

This plugin uses a page to store all images. By default, the plugin will look for a page with the slug `moments` and the template of `moments`. It will generate a new page if it does not exist.

You can customize the slug being used: see the [configuration](./02-configuration.md). If you change the slug after initialization, be sure to delete the previously generated page.


### 2. Add page template to blueprint

To list the generated page, you need to add the template to a pages section in your `site.yml` blueprint.

```yaml
sections:
  pages:
    type: pages
    templates:
      - default
      - moments
```

You can also add the page to your sidebar: see the [panel](./03-customization/04-panel.md) section.

### 3. Usage

To display the grid of your moments for your websites visitors, you have three options.

#### 3.1 Set the overview page to public

By default, the moments overview page (listing all moments) is disabled and visitors are redirected to the homepage instead. If you want to use it, you can enable it in the [configuration](./02-configuration.md#moments-overview-page).

#### 3.2 Use the block

```yml
blocks:
  type: blocks
  fieldsets:
    - moments
```

#### 3.3 Use the snippet

```html
<?php snippet('moments'); ?>
```

#### 3.4 Add the styles
If you use the **snippet** or **block** on your pages, you have to include the styles in the head of your page.

```html
<head>
  <?= css(Kirby::plugin('moinframe/moments')->asset('moments.css')->url()) ?>
</head>
```

#### 3.5 Set display page

To make the lightbox aware of the page, where your moments are displayed, you can adjust the `pageid` in your configuration. [See how](../02-configuration.md#set-display-page)

### 4. Connect via Apple Shortcut

You can use an Apple Shortcut to upload images quickly. See the [configuration](./05-shortcuts.md).
