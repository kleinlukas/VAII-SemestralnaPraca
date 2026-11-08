<?php

/** @var \App\Models\Band $band */
/** @var \Framework\Support\LinkGenerator $link */
?>
<section class="info">
    <div class="form-container card">
        <h2>UPRAVIŤ KAPELU</h2>

            <form method="post" action="<?= $link->url('band.edit', ['id' => $band->getId()]) ?>" class="crud-form">
                <div class="form-group">
                    <label for="name">Názov kapely</label>
                    <input type="text" id="name" name="name" value="<?= e($band->getName()) ?>" required>
                </div>

                <div class="form-group">
                    <label for="genre">Žáner</label>
                    <input type="text" id="genre" name="genre" value="<?= e($band->getGenre()) ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Kontaktný e-mail</label>
                    <input type="email" id="email" name="email" value="<?= e($band->getEmail()) ?>" required>
                </div>

                <div class="form-group">
                    <label for="setup_time">Čas prestavby pódia (minúty)</label>
                    <input type="number" id="setup_time" name="setup_time"
                           value="<?= e($band->getSetupTime()) ?>" min="5" max="180" required>
                </div>

                <div class="form-group">
                    <label for="description">Popis kapely</label>
                    <textarea id="description" name="description" rows="4"><?= e($band->getDescription()) ?></textarea>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn-publish">Uložiť zmeny</button>
                    <a href="<?= $link->url('band.index') ?>" class="btn-filter">Zrušiť</a>
                </div>
            </form>
    </div>
</section>
