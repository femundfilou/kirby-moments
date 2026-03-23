---
title: Snippets
---


### Overwrite the layout

The plugin ships with a minimal layout snippet (`layout/moments`) that wraps both the grid and the single-moment views. It contains a bare HTML document with no navigation, fonts, or meta tags, so you will most likely want to replace it with your own snippet if you use the overview page.

Just copy the [source of the original snippet](https://github.com/moinframe/kirby-moments/blob/main/snippets/layout/moments.php). and put it in your `site/snippets/layout/moments.php`.


### Change an icon

The icons used by the plugin are also snippets. This means, you can overwrite them, too.
If you want to overwrite the `clock` icon, simply create a snippet `/site/snippets/moments-icon/clock.php` and put in your svg code.

Here you can find [all icons used](https://github.com/moinframe/kirby-moments/blob/main/snippets/moments-icon).

### Adjust the overlay of each moment

Each moment displays information such as the date in a snippet called `moments-image-footer.php`. If you want to change that, just create a snippet with the same name in your installation.

See the [source of the original snippet](https://github.com/moinframe/kirby-moments/blob/main/snippets/moments-image-footer.php).
