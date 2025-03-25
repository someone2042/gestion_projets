<?php
class Projet
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllProjets()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM projets");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des projets : " . $e->getMessage();
            return false;
        }
    }

    public function addProjet($titre, $description = null, $date_debut = null, $date_fin = null, $statut = null)
    {
        try {
            $sql = "INSERT INTO projets (titre, description, date_debut, date_fin, statut) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$titre, $description, $date_debut, $date_fin, $statut]);
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout du projet : " . $e->getMessage();
            return false;
        }
    }
}
