<?php ob_start(); ?>

<h1>Bienvenue !</h1>

<p>
    <?php foreach ($plateformes as $plateforme): ?>
        <a href="plateforme/<?= $plateforme['p_id']; ?>/<?= $plateforme['p_slug']; ?>"><?= $plateforme['p_nom']; ?><br>
    <?php endforeach; ?>
</p>
<p><a class="nav-link" href="<?= BASE_URL; ?>/plateforme/add">Ajouter</a></p>


<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>