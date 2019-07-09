<?php

class Vehicule extends Db
{

    const TABLE_NAME =  'vehicule';

    protected $id_vehicule;
    protected $marque;
    protected $modele;
    protected $color;
    protected $immatriculation;


    /* Setters */ // Faut-il créer des setters pour ID et created_at??
    public function setId_vehicule($id_vehicule)
    {
        $this->id_vehicule = $id_vehicule;
        return $this;
    }


    public function setMarque($marque)
    {
        // Il faudra faire de validations
        $this->marque = $marque;
        return $this;
    }

    public function setModele($modele)
    {
        // Il faudra faire de validations
        $this->modele = $modele;
        return $this;
    }

    public function setColor($color)
    {
        // Il faudra faire de validations
        $this->color = $color;
        return $this;
    }

    public function setImmatriculation($immatriculation)
    {
        // Il faudra faire de validations
        $this->immatriculation = $immatriculation;
        return $this;
    }

    /* Getters */
    public function getId_vehicule()
    {
        return $this->id_vehicule;
    }

    public function getMarque()
    {
        return $this->marque;
    }

    public function getModele()
    {
        return $this->modele;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    public function save()
    {
        $data = [
            'marque'      => $this->marque,
            'modele'  => $this->modele,
            'color'  => $this->color,
            'immatriculation'  => $this->immatriculation,
        ];

        $id_vehicule = $this->dbCreate(self::TABLE_NAME, $data);

        $this->id = $id_vehicule;
    }

    public static function findAll()
    {
        $data = Db::dbFind(self::TABLE_NAME);
        return $data;
    }


    // ...

    public static function user_vue($id_vehicule)
    {

        // J'utilise getDb de la classe Db qui me donne un pointeur PDO.
        $bdd = Db::getDb();

        // Définition de la requête
        $req = "SELECT *
				FROM `association`
				INNER JOIN conducteur ON conducteur.id_conducteur =  association.id_conducteur
                WHERE association.id_vehicule = " . $id_vehicule;

        $res = $bdd->query($req);
        $vehicules = $res->fetchAll(PDO::FETCH_ASSOC);

        return $vehicules;
    }

    public static function findOne(int $id_vehicule)
    {
        $request = [
            ['id_vehicule', '=', $id_vehicule]
        ];
        $element = Db::dbFind(self::TABLE_NAME, $request);
        if (count($element) > 0) $element = $element[0];
        else return;

        $vehicule = new Vehicule; //permet de créer un nouvel objet 
        $vehicule->setId_vehicule($element['id_vehicule']);
        $vehicule->setMarque($element['marque']);
        $vehicule->setModele($element['modele']);
        $vehicule->setColor($element['color']);
        $vehicule->setImmatriculation($element['immatriculation']);
        return $vehicule;
    }

    public function update()
    {
        if ($this->id > 0) {
            $data = [
                "id_vehicule"   => $this->getId_vehicule(),
                "marque"  => $this->getMarque(),
                "modele"   => $this->getModele(),
                "color"  => $this->getColor(),
                "immatriculation"   => $this->getImmatriculation(),
            ];
            Db::dbUpdate(self::TABLE_NAME, $data);
            return $this;
        }
        return;
    }


    public function delete()
    {
        $data = ["id_vehicule"   => $this->getId_vehicule(),];
        Db::dbDelete(self::TABLE_NAME, $data);
        return;
    }
}
