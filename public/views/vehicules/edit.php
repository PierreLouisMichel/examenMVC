<?php ob_start(); ?>
<form class="form" method="post" action="<?=url_edit_vehicule($vehicule->getId_vehicule())?>">
    <input class="form-control" type="hidden" name="id_vehicule" value="<?= $vehicule->getId_vehicule() ?>">
    <input class="form-control" type="text" name="marque" value="<?= $vehicule->getMarque() ?>">
    <input class="form-control" type="text" name="modele" value="<?= $vehicule->getModele() ?>">
    <input class="form-control" type="text" name="color" value="<?= $vehicule->getColor() ?>">
    <input class="form-control" type="text" name="immatriculation" value="<?= $vehicule->getImmatriculation() ?>">
    <input type="submit" value="Envoyer">
</form>
<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>