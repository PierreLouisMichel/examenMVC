<?php ob_start(); ?>

<h1 class="text-center">Affichage des conducteurs.</h1>
<table class="table">
    <thead>
        <tr class="text-center">
            <th>Id du Conducteur</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($conducteurs as $conducteur) : ?>
            <tr class="text-center">
                <td class="align-middle"><?= $conducteur['id_conducteur'] ?></td>
                <td class="align-middle"><?= $conducteur['nom'] ?></td>
                <td class="align-middle"><?= $conducteur['prenom'] ?></td>
                <td class="align-middle"><a href="<?= url_edit_conducteur($conducteur['id_conducteur']) ?>">Modifier</a></td>
                <td class="align-middle"><a href="<?= url_delete_conducteur($conducteur['id_conducteur']) ?>">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>