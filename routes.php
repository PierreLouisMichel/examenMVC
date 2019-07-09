<?php

// Create Router instance
$router = new Router();


$router->get('', 'PagesController@home');


/* Routes pour les usagers */
/* Afficher */
$router->get('/affichage_conducteurs', 'ConducteursController@affichage_user'); // lister tous les usagers
/* Créer */
$router->get('/add_conducteur', 'ConducteursController@add_conducteur');


//afficher le formulaire pour ajouter un usager
$router->post('/add_conducteur', 'ConducteursController@save'); //gérer l'envoi du formulaire d'ajout d'un usager

/* Modifier */
// Formulaire d'update
$router->get('/affichage_conducteur/{id}/edit', 'ConducteursController@edit');

// Traitement de l'update
$router->post('/affichage_conducteur/{id}/edit', 'ConducteursController@update');
/* Supprimer   */
$router->get('/affichage_conducteur/{id}/delete', 'ConducteursController@delete');
$router->get('/affichage_conducteur/{id}', 'ConducteursController@show'); //détails d'un usager par id, cette ligne doit etre apres les ligens 22 et 25 car sinon le '/edit' ne sera pas pris en compte 



/* Routes pour les films */

/* Modifier */
$router->get('/affichage_film/{id}/edit', 'FilmsController@edit'); //afficher le formulaire pour modifier un film
$router->post('/affichage_film/{id}/edit', 'FilmsController@update'); //gérer l'envoi du formulaire de modification d'un film

/* Supprimer */
$router->get('/affichage_film/{id}/delete', 'FilmsController@delete'); //afficher le formulaire pour modifier un film

/* Afficher */
$router->get('/affichage_films', 'FilmsController@affichage_film'); // lister tous les films
$router->get('/affichage_film/{id}', 'FilmsController@show'); //détails d'un film par id

/* Créer  */
$router->get('/add_film', 'FilmsController@add_film'); //afficher le formulaire pour ajouter un film
$router->post('/add_film', 'FilmsController@save'); //gérer l'envoi du formulaire d'ajout d'un film



/* Routes pour les vues */
/* Afficher */
$router->get('/vues', 'VuesController@index'); // lister tous les vues
$router->get('/vue/{id}', 'VuesController@show'); //détails d'une vue par id

/* Créer */
$router->get('/vue-add', 'TypesController@add'); //afficher le formulaire pour ajouter une vue
$router->post('/vue-add', 'TypesController@save'); //gérer l'envoi du formulaire d'ajout d'une vue
/* Modifier */

/* Supprimer */

/* Routes pour les types (genres) */
/* Afficher */
$router->get('/types', 'TypesController@index'); // lister tous les types
$router->get('/type/{id}', 'TypesController@show'); //détails d'un type par id

/* Créer */
$router->get('/type-add', 'TypesController@add'); //afficher le formulaire pour ajouter un type
$router->post('/type-add', 'TypesController@save'); //gérer l'envoi du formulaire d'ajout d'un type

/* Modifier */

/* Supprimer */

// Run it!
$router->run();
