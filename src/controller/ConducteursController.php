<?php

class ConducteursController
{

    public function affichage_conducteur()
    {
        $conducteurs = Conducteur::findAll();
        view('conducteurs.affichage_conducteurs', compact('conducteurs')); 
    }

    public function show($id)
    {
        $conducteur = Conducteur::findOne($id);
        $vehicules = Conducteur::conducteur_vue($id);
        view('conducteurs.affichage_conducteur', compact('conducteur', 'vehicules'));
    }
    /*
    public function conducteur_vu()
    {
        $Films = User:: conducteur_vue();
        view('conducteurs.affichage_conducteur', compact('films'));
    }
*/
    public function add_conducteur()
    {
        view('conducteurs.add_conducteur');
    }

    public function save()
    {
        /* A faire lorsque les POST soient complets. Entre les guimets du $_POST va nom du champ dans le formulaire*/
        if (!empty($_POST)) {
            $conducteur = new Conducteur;

            $conducteur->setName($_POST['name']);
            $conducteur->setPassword($_POST['password']);
            $conducteur->setEmail($_POST['email']);
            if (isset($_POST['avatar'])) {
                $conducteur->setAvatar($_POST['avatar']);
            }

            $conducteur->save();
        }

        view('pages.add_conducteur');
    }

    public function edit($id)
    {
        $conducteur = Conducteur::findOne($id);

        view('conducteurs.edit', compact('conducteur'));
    }

    public function update($id)
    {
        $conducteur = User::findOne($id); /* User en vert correspond à User du fichier 'User'.php*/
        $conducteur->setName($_POST['name']);
        $conducteur->setEmail($_POST['email']);
        $conducteur->setPassword($_POST['password']);
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
