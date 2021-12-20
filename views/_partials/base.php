<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <title><?= $title ?? 'UQTR - Gestion des activités' ?></title>
</head>
<body>

<?php require __DIR__ . '/header/header.php'; ?>

<div>
    <?= $content ?? '' ?>
</div>
<?php require __DIR__ . '/footer/footer.php'; ?>
</body>
</html>