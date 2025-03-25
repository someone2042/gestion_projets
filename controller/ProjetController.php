<?php
require_once __DIR__ . '/../model/Projet.php';

class ProjetController
{
    private $projetModel;

    public function __construct($db)
    {
        $this->projetModel = new Projet($db);
    }

    public function listProjets()
    {
        $projets = $this->projetModel->getAllProjets();
        if ($projets !== false) {
            include __DIR__ . '/../view/projetsList.php';
        } else {
            echo "Impossible d'afficher la liste des projets.";
        }
    }


    public function addProjetForm()
    {
        include __DIR__ . '/../view/projetAdd.php';
    }

    public function addProjet()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'] ?? '';
            $description = $_POST['description'] ?? null;
            $date_debut = $_POST['date_debut'] ?? null;
            $date_fin = $_POST['date_fin'] ?? null;
            $statut = $_POST['statut'] ?? null;

            if (empty($titre)) {
                echo "Le titre du projet est obligatoire.";
                include __DIR__ . '/../view/projetAdd.php';
                return;
            }

            if ($this->projetModel->addProjet($titre, $description, $date_debut, $date_fin, $statut)) {

                header('Location: index.php?action=listProjets');
                exit();
            } else {
                echo "Erreur lors de l'ajout du projet.";
                include __DIR__ . '/../view/projetAdd.php';
            }
        } else {

            header('Location: index.php?action=addProjetForm');
            exit();
        }
    }
}
