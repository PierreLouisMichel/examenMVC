<?php
class VehiculesController
{

    public function affichage_vehicule()
    {
        $vehicules = Vehicule::findAll();
        view('vehicules.affichage_vehicules', compact('vehicules'));
    }

    public function show($id)
    {
        $vehicule = Vehicule::findOne($id);
        $vues = Vehicule::vehicule_vue($id);

        view('vehicules.affichage_vehicule', compact('vehicule', 'vues'));
    }

    public function add_vehicule()
    {
        view('vehicules.add_vehicule');
    }

    public function save()
    {
        //A faire lorsque les POST soient complets. Entre les guimets du $_POST va nom du champ dans le formulaire

        if (!empty($_POST)) {

            $vehicule = new Vehicule;

            $vehicule->setMarque($_POST['marque']);
            $vehicule->setModele($_POST['modele']);
            $vehicule->setColor($_POST['color']);
            $vehicule->setImmatriculation($_POST['immatriculation']);

            $vehicule->save();

            $vehicules = Vehicule::findAll();
            view('vehicules.affichage_vehicules', compact('vehicules'));
        }
        else
        {
            echo "NN";
        }

    }


    public function edit($id)
    {
        $vehicule = Vehicule::findOne($id);
        $types = Type::findAll();

        view('vehicules.edit', compact('vehicule', 'types'));
    }

    public function update($id)
    {
        if (!empty($_POST)) {
            $vehicule = Vehicule::findOne($id);

            $vehicule->setMarque($_POST['marque']);
            $vehicule->setModele($_POST['modele']);
            $vehicule->setColor($_POST['color']);
            $vehicule->setImmatriculation($_POST['immatriculation']);

            //$vehicule->update($posterUpdate, $gifUpdate);

            redirectTo('affichage_vehicules');
        }
    }

    public function delete($id)
    {
        $vehicule = Vehicule::findOne($id);
        $vehicule->delete();

        redirectTo('affichage_vehicules');
    }
}
