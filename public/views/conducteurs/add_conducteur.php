<?php ob_start(); ?>
<form class="form" method="post" action="<?= url('affichage_conducteur') ?>">
    <input class="form-control" type="text" name="nom" placeholder="Nom">
    <input class="form-control" type="text" name="prenom" placeholder="Prenom">
    <input type="submit" value="Envoyer">
</form>
<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>