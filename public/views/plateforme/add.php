<?php ob_start(); ?>


<?= $errors; ?>
<!-- formulaire -->
<?= $formulaireHtml; ?>


<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>