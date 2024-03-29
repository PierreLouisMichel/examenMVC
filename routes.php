<?php

// Create Router instance
$router = new Router();


$router->get('', 'PagesController@home');


/* Routes pour les conducteurs */
/* Afficher */
$router->get('/affichage_conducteur', 'ConducteursController@affichage_conducteur'); // lister tous les conducteurs
/* Créer */
$router->get('/add_conducteur', 'ConducteursController@add_conducteur');//afficher le formulaire pour modifier un conducteur
$router->post('/affichage_conducteur', 'ConducteursController@save'); //gérer l'envoi du formulaire d'ajout d'un conducteur

/* Modifier */
// Formulaire d'update
$router->get('/affichage_conducteur/{id}/edit', 'ConducteursController@edit');

// Traitement de l'update
$router->post('/affichage_conducteur/{id}/edit', 'ConducteursController@update');

/* Supprimer   */
$router->get('/affichage_conducteur/{id}/delete', 'ConducteursController@delete');
$router->get('/affichage_conducteur/{id}', 'ConducteursController@show'); //détails d'un usager par id, cette ligne doit etre apres les lignes 22 et 25 car sinon le '/edit' ne sera pas pris en compte 



/* Routes pour les véhicules */

/* Modifier */
$router->get('/affichage_vehicule/{id}/edit', 'VehiculesController@edit'); //afficher le formulaire pour modifier un véhicule
$router->post('/affichage_vehicule/{id}/edit', 'VehiculesController@update'); //gérer l'envoi du formulaire de modification d'un véhicule

/* Supprimer */
$router->get('/affichage_film/{id}/delete', 'VehiculesController@delete'); //afficher le formulaire pour modifier un véhicule

/* Afficher */
$router->get('/affichage_vehicules', 'VehiculesController@affichage_vehicule'); // lister tous les véhicules
$router->get('/affichage_vehicule/{id}', 'VehiculesController@show'); //détails d'un véhicule par id

/* Créer  */
$router->get('/add_vehicule', 'VehiculesController@add_vehicule'); //afficher le formulaire pour ajouter un véhicule
$router->post('/affichage_vehicule', 'VehiculesController@save'); //gérer l'envoi du formulaire d'ajout d'un véhicule



/* Routes pour les vues */
/* Afficher */
$router->get('/vues', 'VuesController@index'); // lister tous les vues
$router->get('/vue/{id}', 'VuesController@show'); //détails d'une vue par id

/* Créer */
$router->get('/vue-add', 'TypesController@add'); //afficher le formulaire pour ajouter une vue
$router->post('/vue-add', 'TypesController@save'); //gérer l'envoi du formulaire d'ajout d'une vue


// Run it!
$router->run();
