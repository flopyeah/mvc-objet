<?php ob_start(); ?>

    <?php foreach($articles as $article): ?>

        Titre : <?= $article['art_title']; ?><br>

    <?php endforeach; ?>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>