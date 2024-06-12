# TrackApp - Application de Monitoring des Performances des Modules IoT

TrackApp est une application web développée avec le framework Laravel, conçue pour collecter en temps réel les performances des modules IoT connectés. Cette application permet de surveiller l'état de fonctionnement des modules, de visualiser les données collectées sous forme de graphiques et de recevoir des notifications en cas de dysfonctionnement.

## Rapport de Réalisation

### Création de la Base de Données
Une base de données a été créée pour répertorier les modules IoT, leurs détails et l'historique de fonctionnement. Les tables nécessaires ont été conçues pour stocker les informations pertinentes, telles que les modules, les types de mesure et les données collectées.

### Formulaire d'Inscription des Modules

Un formulaire a été mis en place pour permettre l'inscription de nouveaux modules dans l'application. Ce formulaire recueille les informations nécessaires sur les modules, telles que leur nom, leur emplacement, etc., et les enregistre dans la base de données.

- Route pour ajouter un module : `/admin/modules/create`
![Capture d'écran](screenshots/3-formulaire_d_ajout_d_un_module.png)

- Route pour mofifier le module d'identifiant 1 : `/admin/admin/modules/edit/2`
![Capture d'écran](screenshots/4-formulaire_de_modification_d_un_module.png)

### Page de Visualisation de l'État de Fonctionnement des Modules

Une page de visualisation a été développée pour afficher l'état de fonctionnement des modules. Cette page présente des informations telles que la valeur mesurée actuelle, la durée de fonctionnement, le nombre de données envoyées et l'état de marche. De plus, un graphique interactif permet de suivre l'évolution de la valeur mesurée au fil du temps.
![Capture d'écran](screenshots/0-page_de_visualisation_des_données.png)



### Notifications Visuelles en Cas de Dysfonctionnement

Des notifications visuelles ont été intégrées à l'interface pour alerter les utilisateurs en cas de dysfonctionnement d'un module. Ces notifications sont conçues pour attirer l'attention de l'utilisateur et lui permettre de réagir rapidement aux problèmes détectés.

### Script de Génération Automatique d'État des Modules

Un script côté serveur a été développé pour générer automatiquement l'état des modules. Ce script surveille en permanence l'état des modules et déclenche des notifications en cas de dysfonctionnement. Il assure ainsi une surveillance continue et proactive de l'état des modules.

### Génération de Données Numériques et Stockage dans la Base de Données

Les modules ont été configurés pour générer des données numériques sur les mesures qu'ils effectuent, telles que la température, la vitesse, etc. Ces données sont ensuite stockées dans la base de données, permettant ainsi de conserver un historique des mesures réalisées. De plus, les modules peuvent tomber en panne et refonctionner de manière aléatoire, assurant ainsi une simulation réaliste de leur fonctionnement dans des conditions variées. La génération de l'historique des données se poursuit de manière transparente même lors de la navigation sur l'interface web de l'application de test.


## Routes

### Public Routes

- **GET /** : Affiche la page d'accueil de l'application.
- **GET /module/{slug}** : Affiche les détails d'un module spécifique selon son slug.
- **GET /api/module** : Récupère les données des modules via une API.
- **GET /api/module/{slug}** : Récupère les données d'un module spécifique via une API.

### Routes d'Administration

#### Modules

- **GET /admin/modules** : Affiche la liste des modules enregistrés.
- **GET /admin/modules/show/{id}** : Affiche les détails d'un module spécifique.
- **GET /admin/modules/create** : Affiche le formulaire de création d'un nouveau module.
- **GET /admin/modules/edit/{id}** : Affiche le formulaire d'édition d'un module spécifique.
- **POST /admin/modules/store** : Enregistre un nouveau module.
- **PUT /admin/modules/update/{module}** : Met à jour les informations d'un module.
- **PUT /admin/modules/speed/{module}** : Met à jour rapidement les informations d'un module.
- **DELETE /admin/modules/delete/{module}** : Supprime un module.

#### Types de Mesure

- **GET /admin/measured_types** : Affiche la liste des types de mesure enregistrés.
- **GET /admin/measured_types/show/{id}** : Affiche les détails d'un type de mesure spécifique.
- **GET /admin/measured_types/create** : Affiche le formulaire de création d'un nouveau type de mesure.
- **GET /admin/measured_types/edit/{id}** : Affiche le formulaire d'édition d'un type de mesure spécifique.
- **POST /admin/measured_types/store** : Enregistre un nouveau type de mesure.
- **PUT /admin/measured_types/update/{measured_type}** : Met à jour les informations d'un type de mesure.
- **PUT /admin/measured_types/speed/{measured_type}** : Met à jour rapidement les informations d'un type de mesure.
- **DELETE /admin/measured_types/delete/{measured_type}** : Supprime un type de mesure.

#### Données Collectées

- **GET /admin/data_collecteds** : Affiche la liste des données collectées.
- **GET /admin/data_collecteds/show/{id}** : Affiche les détails d'une donnée collectée spécifique.
- **GET /admin/data_collecteds/create** : Affiche le formulaire de création d'une nouvelle donnée collectée.
- **GET /admin/data_collecteds/edit/{id}** : Affiche le formulaire d'édition d'une donnée collectée spécifique.
- **POST /admin/data_collecteds/store** : Enregistre une nouvelle donnée collectée.
- **PUT /admin/data_collecteds/update/{data_collecteds}** : Met à jour les informations d'une donnée collectée.
- **PUT /admin/data_collecteds/speed/{data_collecteds}** : Met à jour rapidement les informations d'une donnée collectée.
- **DELETE /admin/data_collecteds/delete/{data_collecteds}** : Supprime une donnée collectée.

Ces routes sont essentielles pour naviguer dans l'application et interagir avec les modules IoT simulés.
