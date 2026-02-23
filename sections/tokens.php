<?php

return [
    'props' => [
        'label' => function (?string $label = null) {
            return $label ?? t('moinframe.moments.panel.tokens.label');
        },
    ],
    'computed' => [
        'disabled' => function () {
            return !option('moinframe.moments.tokens');
        },
        'tokens' => function () {
            $user = $this->model();
            if (!$user instanceof \Kirby\Cms\User) {
                return [];
            }
            return \Moinframe\Moments\Tokens::list($user->id());
        }
    ]
];
