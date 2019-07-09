<?php ob_start(); ?>
<form class="form" method="post" action="<?= url('affichage_vehicule') ?>">
    <input class="form-control" type="text" name="marque" placeholder="Marque">
    <input class="form-control" type="text" name="modele" placeholder="Modele">
    <input class="form-control" type="text" name="color" placeholder="Couleur">
    <input class="form-control" type="text" name="immatriculation" placeholder="Immatriculation">
    <input type="submit" value="Envoyer">
</form>
<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>