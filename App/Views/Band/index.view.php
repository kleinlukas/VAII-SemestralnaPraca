<?php

/** @var \App\Models\Band[] $bands */
/** @var \Framework\Support\LinkGenerator $link */
?>
<section class="info">
    <div class="crud-header">
        <div>
            <h2>SPRÁVA KAPIEL</h2>
            <p class="info-text">Zoznam zaregistrovaných kapiel.</p>
        </div>
        <a href="<?= $link->url('band.create') ?>" class="btn-login">+ PRIDAŤ KAPELU</a>
    </div>

    <?php if (empty($bands)) : ?>
        <div class="card">
            <p>V databáze sa zatiaľ nenachádzajú žiadne kapely.</p>
        </div>
    <?php else : ?>
        <div class="table-wrapper">
            <table class="crud-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Názov kapely</th>
                    <th>Žáner</th>
                    <th>Kontakt (E-mail)</th>
                    <th>Prestavba</th>
                    <th>Popis</th>
                    <th>Akcie</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($bands as $band) : ?>
                    <tr>
                        <td>#<?= e($band->getId()) ?></td>
                        <td><strong><?= e($band->getName()) ?></strong></td>
                        <td><span class="badge"><?= e($band->getGenre()) ?></span></td>
                        <td><?= e($band->getEmail()) ?></td>
                        <td><?= e($band->getSetupTime()) ?> min</td>
                        <td><?= e($band->getDescription()) ?></td>
                        <td class="crud-actions">
                            <a href="<?= $link->url('band.edit', ['id' => $band->getId()]) ?>"
                               class="btn-filter">Upraviť</a>
                            <form method="post" action="<?= $link->url('band.delete') ?>" class="inline-form">
                                <input type="hidden" name="id" value="<?= e($band->getId()) ?>">
                                <button type="submit" class="btn-remove">Zmazať</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>