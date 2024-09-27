<?php

$momentsPage = page(option('femundfilou.kirby-moments.pageid'));

// Add redirect routes if store and page are different
if ($momentsPage && !$momentsPage->is($page)) {
	go($momentsPage ?? $site->url(), 301);
}

snippet('layout/moments', slots: true);
snippet('moments');
endsnippet();
