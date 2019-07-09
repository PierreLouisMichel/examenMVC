<?php ob_start(); ?>

<h1>Bienvenue !</h1>

<p>
    Cum Historia mudat valde, Razgriz revelat ipsum,
    primun daemon seclesus est.
    Cum potensia primum daemon fundet mortem in terram, deinde moritur.
</p>
<a href="<?= url('add_conducteur') ?>">add_conducteur</a><br>
<a href="<?= url('add_vehicule') ?>">add_vehicule</a><br>
<a href="<?= url('add_conducteur') ?>">add_conducteur</a><br>
<a href="<?= url('add_vehicule') ?>">add_vehicule</a><br>
<a href="<?= url('affichage_conducteurs') ?>">affichage_conducteurs</a><br>
<a href="<?= url('affichage_vehicules') ?>">affichage_vehicules</a><br>
<a href="<?= url('types') ?>">Les Types</a><br>



<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>