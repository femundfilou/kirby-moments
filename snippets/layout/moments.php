<!DOCTYPE html>
<html lang="<?= $kirby->language()?->code() ?? 'en' ?>">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $page->title() ?></title>
	<?= css('/media/plugins/femundfilou/kirby-moments/reset.css'); ?>
	<?= css('/media/plugins/femundfilou/kirby-moments/moments.css'); ?>
</head>

<body>
	<?= $slot ?>
	<?= js('/media/plugins/femundfilou/kirby-moments/moments.min.js'); ?>
</body>

</html>