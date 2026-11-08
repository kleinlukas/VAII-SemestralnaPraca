<?php

/** @var string $contentHTML */
/** @var \Framework\Support\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk-SK">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Oficiálna stránka festivalu Noise Fest 2026.">
    <meta name="author" content="Lukáš Klein">
    <title>NOISE FEST 2026</title>
    <link rel="stylesheet" href="<?= $link->asset('css/style.css') ?>">
</head>
<body>

<header class="header">
    <nav class="header-menu" aria-label="Hlavné menu">
        <ul>
            <li><a href="<?= $link->url('home.index') ?>#lineup">LINE-UP</a></li>
            <li><a href="<?= $link->url('band.index') ?>#kapely">KAPELY</a></li>
            <li><a href="<?= $link->url('home.index') ?>#areal">AREÁL</a></li>
            <li><a href="<?= $link->url('home.index') ?>#kontakt">KONTAKT</a></li>
        </ul>
    </nav>

    <div class="logo">
        <a href="<?= $link->url('home.index') ?>">
            <span class="logo-sub">FESTIVAL</span>
            <span class="logo-main">NOISE FEST</span>
        </a>
    </div>

    <div class="header-actions">
        <a href="<?= $link->url('home.program') ?>" class="btn-login">PRIHLÁSENIE</a>
    </div>
</header>

<main>
    <?= $contentHTML ?>
</main>

<footer id="kontakt" class="site-footer">
    <p><strong>NOISE FEST 2026</strong></p>
    <address>
        Kontakt: <a href="mailto:info@noisefest.sk">info@noisefest.sk</a>
    </address>
    <p>© Copyrights NOISE FEST 2026</p>
</footer>

</body>
</html>