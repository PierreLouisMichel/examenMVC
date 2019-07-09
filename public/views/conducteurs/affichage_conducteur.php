<?php ob_start(); ?>
<h1><?= $conducteur->getNom() ?> : </h1>

<div>
    <table>
        <tr>
            <th>Avatar</th>
            <th>Nom</th>
            <th>email</th>
            <th>Date de création</th>
        </tr>
        <tr>
            <td><?= $conducteur->getId_conducteur() ?></td>
            <td><?= $conducteur->getNom() ?></td>
            <td><?= $conducteur->getPrenom() ?></td>
        </tr>

    </table>
</div>
<div>
    <h4>Liste des véhicules utilisé par <?= $conducteur->getNom() ?> : </h4>
    <table>
        <tr class="text-center">
            <th>&nbsp;</th>
            <th>Id du Véhicule</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Couleur</th>
            <th>Immatriculation</th>
        </tr>
        <?php foreach ($vehicules as $vehicule) : ?>
            <tr class="text-center">
                <td><a href="<?= url_vehicule($vehicule['id_vehicule']) ?>" class="btn btn-primary btn-sm">Voir Véhicule</a></td>
                <td class="align-middle"><?= $vehicule['id_vehicule'] ?></td>
                <td class="align-middle"><?= $vehicule['marque'] ?></td>
                <td class="align-middle"><?= $vehicule['modele'] ?></td>
                <td class="align-middle"><?= $vehicule['color'] ?></td>
                <td class="align-middle"><?= $vehicule['immatriculation'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>