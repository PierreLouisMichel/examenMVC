<?php ob_start(); ?>
<form class="form" method="post" action="<?= url_edit_conducteur($conducteur->getId_conducteur()) ?>">
    <input class="form-control" type="hidden" name="id_conducteur" value="<?= $conducteur->getId_conducteur() ?>">
    <input class="form-control" type="text" name="nom" value="<?= $conducteur->getNom() ?>">
    <input class="form-control" type="text" name="prenom" value="<?= $conducteur->getPrenom() ?>">
    <input type="submit" value="Envoyer">
</form>
<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>