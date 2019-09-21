<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 2019-02-06
 * Time: 09:43
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
    <div class="container">
        <ul class="nav">
            <?php foreach ($menu as $item): ?>
                <li><a href="/<?= DOMAIN_PATH; ?>?page=<?= $item; ?>" data-id="<?= $item; ?>">task<?= $item; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>
<header class="header">
    <div class="container">
        <h1><?= $title; ?></h1>
    </div>
</header>
<main class="main">
    <div class="container">
        <?= $content; ?>
    </div>
</main>
<footer class="footer">
    <div class="container">
        <?= $footer; ?>
    </div>
</footer>
<script>
    const main = () => {
        let page = window.location.search.substr(-1);
        const link = document.querySelector(`[data-id="${page}"]`);
        link.className = "active";
    }
    window.onload = main;
</script>
</body>
</html>
