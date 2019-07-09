<?php

class Conducteur extends Db
{

    const TABLE_NAME =  'conducteur';

    protected $id_conducteur;
    protected $nom;
    protected $prenom;


    /* Setters */ // Faut-il créer des setters pour ID et created_at??
    public function setId_conducteur($id_conducteur)
    {
        $this->id_conducteur = $id_conducteur;
        return $this;
    }


    public function setNom($nom)
    {
        // Il faudra faire de validations
        $this->nom = $nom;
        return $this;
    }

    public function setPrenom($prenom)
    {
        // Il faudra faire de validations
        $this->prenom = $prenom;
        return $this;
    }
    
    /* Getters */
    public function getId_conducteur()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function save()
    {
        $data = [
            'id_conducteur'     => $this->id_conducteur,
            'nom'      => $this->nom,
            'prenom'  => $this->prenom,
        ];

        $id_conducteur = $this->dbCreate(self::TABLE_NAME, $data);

        $this->id = $id_conducteur;
    }

    public static function findAll()
    {
        $data = Db::dbFind(self::TABLE_NAME);
        return $data;
    }


    // ...

    public static function user_vue($id_conducteur)
    {

        // J'utilise getDb de la classe Db qui me donne un pointeur PDO.
        $bdd = Db::getDb();

        // Définition de la requête
        $req = "SELECT *
				FROM `association`
				INNER JOIN vehicule ON vehicule.id_vehicule =  association.id_vehicule
                WHERE association.id_conducteur = " . $id_conducteur;

        $res = $bdd->query($req);
        $films = $res->fetchAll(PDO::FETCH_ASSOC);

        return $films;
    }

    public static function findOne(int $id_conducteur)
    {
        $request = [
            ['id', '=', $id_conducteur]
        ];
        $element = Db::dbFind(self::TABLE_NAME, $request);
        if (count($element) > 0) $element = $element[0];
        else return;

        $conducteur = new User; //permet de créer un nouvel objet 
        $conducteur->setId_conducteur($element['id_conducteur']);
        $conducteur->setNom($element['nom']);
        $conducteur->setPrenom($element['prenom']);
        return $conducteur;
    }

    public function update()
    {
        if ($this->id > 0) {
            $data = [
                "id"   => $this->getId_conducteur(),
                "nom"  => $this->getNom(),
                "prenom"   => $this->getPrenom(),
            ];
            Db::dbUpdate(self::TABLE_NAME, $data);
            return $this;
        }
        return;
    }


    public function delete()
    {
        $data = ["id_conducteur"   => $this->getId_conducteur(),];
        Db::dbDelete(self::TABLE_NAME, $data);
        return;
    }
}
