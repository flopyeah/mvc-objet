<?php ob_start(); ?>

<?php var_dump($var); ?>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>