<?php
require_once __DIR__ . '/../model/Utilisateur.php';
require_once __DIR__ . '/../model/Projet.php';

class UtilisateurController
{
    private $utilisateurModel;
    private $projetModel;

    public function __construct($db)
    {
        $this->utilisateurModel = new Utilisateur($db);
        $this->projetModel = new Projet($db);
    }

    public function listUtilisateurs()
    {
        $utilisateurs = $this->utilisateurModel->getAllUtilisateurs();
        if ($utilisateurs !== false) {

            echo "Liste des utilisateurs (fonctionnalité non demandée dans les vues):";
            echo "<pre>";
            print_r($utilisateurs);
            echo "</pre>";
        } else {
            echo "Impossible d'afficher la liste des utilisateurs.";
        }
    }

    public function affectationForm()
    {
        $utilisateurs = $this->utilisateurModel->getAllUtilisateurs();
        $projets = $this->projetModel->getAllProjets();
        if ($utilisateurs !== false && $projets !== false) {
            include __DIR__ . '/../view/affectation.php';
        } else {
            echo "Impossible d'afficher le formulaire d'affectation.";
        }
    }

    public function affecterUtilisateurProjet()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_utilisateur = $_POST['id_utilisateur'] ?? '';
            $id_projet = $_POST['id_projet'] ?? '';

            if (empty($id_utilisateur) || empty($id_projet)) {
                echo "Veuillez sélectionner un utilisateur et un projet.";
                $this->affectationForm();
                return;
            }

            if ($this->utilisateurModel->affecterUtilisateurProjet($id_utilisateur, $id_projet)) {
                header('Location: index.php?action=listProjets');
                exit();
            } else {
                echo "Erreur lors de l'affectation de l'utilisateur au projet.";
                $this->affectationForm();
            }
        } else {
            header('Location: index.php?action=affectationForm');
            exit();
        }
    }
}
