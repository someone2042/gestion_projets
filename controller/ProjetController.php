<?php
require_once __DIR__ . '/../model/Projet.php';

class ProjetController
{
    private $projetModel;

    public function __construct($db)
    {
        $this->projetModel = new Projet($db);
    }

    /**
     * Affiche la liste des projets.
     */
    public function listProjets()
    {
        $projets = $this->projetModel->getAllProjets();
        if ($projets !== false) {
            include __DIR__ . '/../view/projetsList.php'; // Inclure la vue avec les données
        } else {
            echo "Impossible d'afficher la liste des projets."; // Gérer l'erreur d'affichage
        }
    }

    /**
     * Affiche le formulaire d'ajout de projet.
     */
    public function addProjetForm()
    {
        include __DIR__ . '/../view/projetAdd.php';
    }

    /**
     * Traite le formulaire d'ajout de projet et ajoute le projet.
     */
    public function addProjet()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'] ?? '';
            $description = $_POST['description'] ?? null;
            $date_debut = $_POST['date_debut'] ?? null;
            $date_fin = $_POST['date_fin'] ?? null;
            $statut = $_POST['statut'] ?? null;

            if (empty($titre)) {
                echo "Le titre du projet est obligatoire."; // Validation basique
                include __DIR__ . '/../view/projetAdd.php'; // Réafficher le formulaire avec message d'erreur
                return;
            }

            if ($this->projetModel->addProjet($titre, $description, $date_debut, $date_fin, $statut)) {
                // Redirection vers la liste des projets après l'ajout réussi
                header('Location: index.php?action=listProjets');
                exit();
            } else {
                echo "Erreur lors de l'ajout du projet."; // Gérer l'erreur d'ajout
                include __DIR__ . '/../view/projetAdd.php'; // Réafficher le formulaire avec message d'erreur
            }
        } else {
            // Si on accède à addProjet sans POST, rediriger vers le formulaire
            header('Location: index.php?action=addProjetForm');
            exit();
        }
    }
}
