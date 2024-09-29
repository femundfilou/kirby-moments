<?php

use Femundfilou\Moments\Token;
use Kirby\Data\Yaml;
use Kirby\Toolkit\Date;

return [
    'pattern' => 'kirby-moments/token/create',
    'load'    => function () {
        $user = kirby()->user();
        $token = Token::create($user->id());
        return [
            'component' => 'k-form-dialog',
            'props' => [
                'fields' => [
                    'text' => [
                        'label'   => 'Name',
                        'type'    => 'text',
                        'placeholder' => 'My iPhone',
                    ],
                ],
                'value' => ['token' => $token]
            ]
        ];
    },
    'submit' => function () {
        $user = kirby()->user();
        $tokens = Yaml::decode($user->app_tokens()->value()) ?? [];
        $tokens[] = [
            'text' => get('text'),
            'token' => get('token'),
            'created' => Date::now()->toString()
        ];

        $user->update([
            'app_tokens' => Yaml::encode($tokens)
        ]);

        return true;
    }
];
