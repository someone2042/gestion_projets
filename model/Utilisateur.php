<?php
class Utilisateur
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function getAllUtilisateurs()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM utilisateurs");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des utilisateurs : " . $e->getMessage();
            return false;
        }
    }


    public function affecterUtilisateurProjet($id_utilisateur, $id_projet)
    {
        try {
            $sql = "INSERT INTO projets_utilisateurs (id_utilisateur, id_projet) VALUES (?, ?)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$id_utilisateur, $id_projet]);
        } catch (PDOException $e) {
            echo "Erreur lors de l'affectation de l'utilisateur au projet : " . $e->getMessage();
            return false;
        }
    }
}
