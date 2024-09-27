<?php

class MomentPage extends Kirby\Cms\Page
{
    public function url($options = null): string
    {
        $parent = option('femundfilou.kirby-moments.pageid') ? page(option('femundfilou.kirby-moments.pageid')) : site()->getMomentsStorePage();
        if (!$parent) {
            return '';
        }
        return $parent->url() . '/' . $this->slug();
    }

    public function image(string $filename = null): Kirby\Cms\File|null
    {
        if (!$filename) {
            return $this->parent()->images()->template('moment')->findBy('name', $this->slug());
        }

        return parent::image($filename);
    }
}
