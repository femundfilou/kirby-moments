<?php
return [
    'file::url' => function ($kirby, $file) {
        if ($kirby->visitor()->prefersJson() && $file->template() === 'moment') {
            return $kirby->url() . '/' . $file->parent()->slug() . '/' . $file->name();
        }
        return $file->mediaUrl();
    }
];
