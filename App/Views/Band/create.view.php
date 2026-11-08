<?php

/** @var \Framework\Support\LinkGenerator $link */
?>
<section class="info">
    <div class="form-container card">
        <h2>PRIDAŤ NOVÚ KAPELU</h2>

        <form method="post" action="<?= $link->url('band.create') ?>" class="crud-form">
            <div class="form-group">
                <label for="name">Názov kapely</label>
                <input type="text" id="name" name="name" required placeholder="napr. Band 1 (230k)">
            </div>

            <div class="form-group">
                <label for="genre">Žáner</label>
                <input type="text" id="genre" name="genre" required placeholder="napr. Hard Rock">
            </div>

            <div class="form-group">
                <label for="email">Kontaktný e-mail</label>
                <input type="email" id="email" name="email" required placeholder="kontakt@kapela.sk">
            </div>

            <div class="form-group">
                <label for="setup_time">Čas prestavby pódia (minúty)</label>
                <input type="number" id="setup_time" name="setup_time" value="30" min="5" max="180" required>
            </div>

            <div class="form-group">
                <label for="description">Popis kapely</label>
                <textarea id="description" name="description" rows="4" placeholder="Stručný popis kapely..."></textarea>
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn-publish">Pridať kapelu</button>
                <a href="<?= $link->url('band.index') ?>" class="btn-filter">Späť na zoznam</a>
            </div>
        </form>
    </div>
</section>
