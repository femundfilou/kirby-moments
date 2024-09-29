<?php

use Kirby\Data\Yaml;

return [
    'pattern' => 'kirby-moments/token/(:any)/delete',
    'load'    => function (string $token) {
        return [
            'component' => 'k-remove-dialog',
            'props' => [
                'text' => 'Do you really want to delete this token?'
            ]
        ];
    },
    'submit' => function (string $token) {
        $user = kirby()->user();

        $tokens = Yaml::decode($user->app_tokens()->value()) ?? [];
        $tokens = array_filter($tokens, function ($t) use ($token) {
            return $t['token'] !== $token;
        });

        $user->update([
            'app_tokens' => Yaml::encode($tokens)
        ]);

        return true;
    }
];
