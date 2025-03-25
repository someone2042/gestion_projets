# Gestion de Projets - Mini-Système MVC en PHP PDO

## Description

Ce projet est un mini-système de gestion de projets développé en PHP, utilisant l'architecture Modèle-Vue-Contrôleur (MVC) et PDO pour l'interaction avec une base de données MySQL. Il permet de gérer des projets et d'assigner des utilisateurs à ces projets.

## Architecture MVC

L'application est structurée selon l'architecture MVC pour une séparation claire des responsabilités :

*   **Modèle (Model):**  Contient les classes qui représentent les données (Projet, Utilisateur) et la logique d'accès aux données via PDO. Les modèles interagissent directement avec la base de données.
*   **Vue (View):**  Contient les fichiers de template (PHP et HTML) responsables de l'affichage des données à l'utilisateur. Les vues reçoivent les données du contrôleur et les présentent à l'utilisateur.
*   **Contrôleur (Controller):**  Agit comme intermédiaire entre le Modèle et la Vue. Il gère la logique applicative, reçoit les requêtes de l'utilisateur, interroge le Modèle pour obtenir ou modifier les données, et choisit la Vue à afficher.

## Prérequis

*   Serveur web avec PHP (ex: Apache, Nginx).
*   Extension PHP PDO MySQL activée.
*   Serveur de base de données MySQL.

## Installation et Configuration

Suivez ces étapes pour installer et configurer l'application localement :

1.  **Création de la Base de Données:**
    *   Créez une base de données MySQL nommée `gestion_projets`.
    *   Importez le script SQL fourni `gestion_projets.sql` (ou le contenu du script SQL généré) dans la base de données `gestion_projets`. Ce script crée les tables `utilisateurs`, `projets`, et `projets_utilisateurs` et insère quelques données d'exemple.

2.  **Configuration de la Connexion à la Base de Données:**
    *   Ouvrez le fichier `config/database.php`.
    *   Modifiez les informations de connexion ( `$host`, `$dbname`, `$username`, `$password` ) pour correspondre à votre configuration MySQL locale.

3.  **Placement des Fichiers du Projet:**
    *   Placez le dossier `gestion_projets` (contenant tous les fichiers du projet) dans le répertoire racine de votre serveur web (par exemple, `htdocs` pour Apache/XAMPP ou `www` pour WAMP).

## Utilisation

1.  **Accéder à l'Application:**
    *   Ouvrez votre navigateur web et accédez à l'URL du projet. Généralement, ce sera quelque chose comme `http://localhost/gestion_projets/index.php` si vous utilisez un serveur local et avez placé le dossier dans le répertoire racine de votre serveur web.

2.  **Fonctionnalités Disponibles:**
    *   **Affichage de la liste des projets:** La page d'accueil affiche une liste de tous les projets dans un tableau.
    *   **Ajout d'un nouveau projet:** Cliquez sur le lien "Ajouter un projet" pour accéder au formulaire d'ajout. Remplissez les informations du projet et soumettez le formulaire.
    *   **Affectation d'un utilisateur à un projet:** Cliquez sur le lien "Affecter un utilisateur" pour accéder au formulaire d'affectation. Sélectionnez un utilisateur et un projet dans les listes déroulantes et soumettez le formulaire pour effectuer l'affectation.

## Structure du Projet

```
gestion_projets/
├── config/
│   └── database.php      # Fichier pour la connexion PDO à la base de données
├── model/
│   ├── Projet.php        # Classe Modèle pour l'entité Projet
│   └── Utilisateur.php   # Classe Modèle pour l'entité Utilisateur
├── controller/
│   ├── ProjetController.php   # Contrôleur gérant les actions liées aux projets
│   └── UtilisateurController.php # Contrôleur gérant les actions liées aux utilisateurs
├── view/
│   ├── projetsList.php    # Vue pour afficher la liste des projets
│   ├── projetAdd.php      # Vue contenant le formulaire d'ajout de projet
│   └── affectation.php    # Vue contenant le formulaire d'affectation utilisateur-projet
├── index.php             # Point d'entrée de l'application (routeur)
└── fichier.sql   # Script SQL pour créer la base de données et les tables (ou contenu du script)
```


*   **`config/database.php`:**  Contient la fonction `connectDB()` pour établir la connexion PDO à la base de données MySQL.
*   **`model/Projet.php` et `model/Utilisateur.php`:**  Classes Modèles contenant les méthodes pour interagir avec les tables `projets` et `utilisateurs` respectivement (récupération de données, ajout, affectation, etc.).
*   **`controller/ProjetController.php` et `controller/UtilisateurController.php`:**  Classes Contrôleurs qui gèrent la logique applicative pour les projets et les utilisateurs. Ils interagissent avec les Modèles et choisissent les Vues à afficher.
*   **`view/projetsList.php`, `view/projetAdd.php`, `view/affectation.php`:** Fichiers de Vue qui définissent la structure HTML et affichent les données fournies par les Contrôleurs.
*   **`index.php`:**  Point d'entrée unique de l'application. Il analyse la requête de l'utilisateur via le paramètre `action` dans l'URL et route la requête vers le Contrôleur et la méthode appropriée.
*   **`gestion_projets.sql`:** Script SQL pour créer la base de données, les tables et insérer des données d'exemple.

## Auteur et Contexte

Ce projet a été réalisé dans le cadre du module "Développement Web Back End" enseigné par Pr. Sara QASSIMI à la Faculté des Sciences et Techniques - Marrakech (FST - UCA).
