<?php ob_start(); ?>

<h1 class="text-center">Affichage des vehicules.</h1>
<table class="table">
    <thead>
        <tr class="text-center">
            <th>Id du Véhicule</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Couleur</th>
            <th>Immatriculation</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vehicules as $vehicule) : ?>
            <tr class="text-center">
                <td class="align-middle"><?= $vehicule['id_vehicule'] ?></td>
                <td class="align-middle"><?= $vehicule['marque'] ?></td>
                <td class="align-middle"><?= $vehicule['modele'] ?></td>
                <td class="align-middle"><?= $vehicule['color'] ?></td>
                <td class="align-middle"><?= $vehicule['immatriculation'] ?></td>
                <td class="align-middle"><a href="<?= url_edit_vehicule($vehicule['id_vehicule']) ?>"><i class="film-icon fas fa-pen-square"></i>lien</a></td>
                <td class="align-middle"><a href="<?= url_delete_vehicule($vehicule['id_vehicule']) ?>"><i class="film-icon fas fa-trash-alt"></i>lien</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>