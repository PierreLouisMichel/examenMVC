<?php

class ConducteursController
{

    public function affichage_conducteur()
    {
        $conducteurs = Conducteur::findAll();
        view('conducteurs.affichage_conducteurs', compact('conducteurs')); 
    }

    public function add_conducteur()
    {
        view('conducteurs.add_conducteur');
    }

    public function save()
    {
        /* A faire lorsque les POST soient complets. Entre les guimets du $_POST va nom du champ dans le formulaire*/
        if (!empty($_POST)) {
            $conducteur = new Conducteur;

            $conducteur->setNom($_POST['nom']);
            $conducteur->setPrenom($_POST['prenom']);
            $conducteur->save();
        }

        view('conducteurs.add_conducteur');
    }

    public function edit($id)
    {
        $conducteur = Conducteur::findOne($id);

        view('conducteurs.edit', compact('conducteur'));
    }

    public function update($id)
    {
        $conducteur = Conducteur::findOne($id); /* User en vert correspond à User du fichier 'User'.php*/
        $conducteur->setNom($_POST['nom']);
        $conducteur->setPrenom($_POST['prenom']);
        $conducteur->update();

        redirectTo('/affichage_conducteur/' . $id);
    }

    public function delete($id)
    {
        $conducteur = Conducteur::findOne($id);
        $conducteur->delete(); //ici delete doit correspondre à la fonction delete dans le model User.php

        // On redirige vers la liste des étudiants
        //Header('Location: ' . url('conducteur'));
        redirectTo('affichage_conducteurs/');
    }
}
