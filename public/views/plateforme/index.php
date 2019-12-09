<?php ob_start(); ?>

<?= $plateforme['p_nom'] ?>
<img width="100%" src="<?= $plateforme['p_image'] ?>" />
<a class="nav-link" href="<?= BASE_URL; ?>/plateforme/update/<?= $plateforme['p_id'] ?>">modifier</a>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>