<?php
require_once __DIR__ . '/../model/Utilisateur.php';
require_once __DIR__ . '/../model/Projet.php'; // Pour la liste des projets dans l'affectation

class UtilisateurController
{
    private $utilisateurModel;
    private $projetModel;

    public function __construct($db)
    {
        $this->utilisateurModel = new Utilisateur($db);
        $this->projetModel = new Projet($db); // Besoin du model projet pour l'affectation
    }

    /**
     * Affiche la liste des utilisateurs (peut-être pas nécessaire dans les vues demandées, mais utile pour la logique).
     */
    public function listUtilisateurs()
    {
        $utilisateurs = $this->utilisateurModel->getAllUtilisateurs();
        if ($utilisateurs !== false) {
            // Si vous aviez une vue pour la liste des utilisateurs, vous l'incluriez ici
            // include __DIR__ . '/../view/utilisateursList.php';
            echo "Liste des utilisateurs (fonctionnalité non demandée dans les vues):";
            echo "<pre>";
            print_r($utilisateurs);
            echo "</pre>";
        } else {
            echo "Impossible d'afficher la liste des utilisateurs.";
        }
    }

    /**
     * Méthode pour afficher le formulaire d'affectation d'un utilisateur à un projet.
     */
    public function affectationForm()
    {
        $utilisateurs = $this->utilisateurModel->getAllUtilisateurs();
        $projets = $this->projetModel->getAllProjets();
        if ($utilisateurs !== false && $projets !== false) {
            include __DIR__ . '/../view/affectation.php'; // Inclure la vue en passant les données
        } else {
            echo "Impossible d'afficher le formulaire d'affectation.";
        }
    }

    /**
     * Traite le formulaire d'affectation d'un utilisateur à un projet et effectue l'affectation.
     */
    public function affecterUtilisateurProjet()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_utilisateur = $_POST['id_utilisateur'] ?? '';
            $id_projet = $_POST['id_projet'] ?? '';

            if (empty($id_utilisateur) || empty($id_projet)) {
                echo "Veuillez sélectionner un utilisateur et un projet.";
                $this->affectationForm(); // Réafficher le formulaire avec message d'erreur
                return;
            }

            if ($this->utilisateurModel->affecterUtilisateurProjet($id_utilisateur, $id_projet)) {
                // Redirection vers la liste des projets après l'affectation réussie
                header('Location: index.php?action=listProjets');
                exit();
            } else {
                echo "Erreur lors de l'affectation de l'utilisateur au projet.";
                $this->affectationForm(); // Réafficher le formulaire avec message d'erreur
            }
        } else {
            // Si on accède à affecterUtilisateurProjet sans POST, rediriger vers le formulaire
            header('Location: index.php?action=affectationForm');
            exit();
        }
    }
}
