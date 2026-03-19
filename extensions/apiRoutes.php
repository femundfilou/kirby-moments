<?php
return [
    [
        'pattern' => 'moinframe-moments/tokens',
        'method' => 'GET',
        'action' => function () {
            $user = kirby()->user();
            if (!$user) {
                throw new \Exception('Unauthorized');
            }
            return \Moinframe\Moments\Tokens::list($user->id());
        },
    ],
    [
        'pattern' => 'moinframe-moments/tokens',
        'method' => 'POST',
        'action' => function () {
            $user = kirby()->user();
            if (!$user) {
                throw new \Exception('Unauthorized');
            }
            $name = trim(kirby()->request()->body()->get('name', ''));
            if (empty($name)) {
                throw new \Exception('Token name is required');
            }
            return \Moinframe\Moments\Tokens::create($user->id(), $name);
        },
    ],
    [
        'pattern' => 'moinframe-moments/tokens/(:any)',
        'method' => 'DELETE',
        'action' => function (string $tokenId) {
            $user = kirby()->user();
            if (!$user) {
                throw new \Exception('Unauthorized');
            }
            \Moinframe\Moments\Tokens::delete($user->id(), $tokenId);
            return ['status' => 'ok'];
        },
    ],
];
