<?php
return [
    'getMomentsStorePage' => function () {
        return option('moinframe.moments.storeid') ? kirby()->page(option('moinframe.moments.storeid')) : site();
    },
    'getMomentsPage' => function () {
        $pageid = option('moinframe.moments.pageid');
        if (!$pageid) {
            return site()->getMomentsStorePage();
        }
        if ($pageid === '/') {
            return site()->homePage();
        }
        return kirby()->page($pageid);
    }
];
