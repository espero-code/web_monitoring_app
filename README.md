## Routes

### Public Routes

- **GET /**: Affiche la page d'accueil de l'application.
- **GET /module/{slug}**: Affiche les détails d'un module spécifique selon son slug.
- **GET /api/module**: Récupère les données des modules via une API.
- **GET /api/module/{slug}**: Récupère les données d'un module spécifique via une API.

### Routes d'Administration

#### Modules

- **GET /admin/modules**: Affiche la liste des modules enregistrés.
- **GET /admin/modules/show/{id}**: Affiche les détails d'un module spécifique.
- **GET /admin/modules/create**: Affiche le formulaire de création d'un nouveau module.
- **GET /admin/modules/edit/{id}**: Affiche le formulaire d'édition d'un module spécifique.
- **POST /admin/modules/store**: Enregistre un nouveau module.
- **PUT /admin/modules/update/{module}**: Met à jour les informations d'un module.
- **PUT /admin/modules/speed/{module}**: Met à jour rapidement les informations d'un module.
- **DELETE /admin/modules/delete/{module}**: Supprime un module.

#### Types de Mesure

- **GET /admin/measured_types**: Affiche la liste des types de mesure enregistrés.
- **GET /admin/measured_types/show/{id}**: Affiche les détails d'un type de mesure spécifique.
- **GET /admin/measured_types/create**: Affiche le formulaire de création d'un nouveau type de mesure.
- **GET /admin/measured_types/edit/{id}**: Affiche le formulaire d'édition d'un type de mesure spécifique.
- **POST /admin/measured_types/store**: Enregistre un nouveau type de mesure.
- **PUT /admin/measured_types/update/{measured_type}**: Met à jour les informations d'un type de mesure.
- **PUT /admin/measured_types/speed/{measured_type}**: Met à jour rapidement les informations d'un type de mesure.
- **DELETE /admin/measured_types/delete/{measured_type}**: Supprime un type de mesure.

#### Données Collectées

- **GET /admin/data_collecteds**: Affiche la liste des données collectées.
- **GET /admin/data_collecteds/show/{id}**: Affiche les détails d'une donnée collectée spécifique.
- **GET /admin/data_collecteds/create**: Affiche le formulaire de création d'une nouvelle donnée collectée.
- **GET /admin/data_collecteds/edit/{id}**: Affiche le formulaire d'édition d'une donnée collectée spécifique.
- **POST /admin/data_collecteds/store**: Enregistre une nouvelle donnée collectée.
- **PUT /admin/data_collecteds/update/{data_collecteds}**: Met à jour les informations d'une donnée collectée.
- **PUT /admin/data_collecteds/speed/{data_collecteds}**: Met à jour rapidement les informations d'une donnée collectée.
- **DELETE /admin/data_collecteds/delete/{data_collecteds}**: Supprime une donnée collectée.
