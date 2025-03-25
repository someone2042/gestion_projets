<?php



require_once __DIR__ . '/config/database.php';
$db = connectDB();


require_once __DIR__ . '/controller/ProjetController.php';
require_once __DIR__ . '/controller/UtilisateurController.php';


$projetController = new ProjetController($db);
$utilisateurController = new UtilisateurController($db);


$action = $_GET['action'] ?? 'listProjets';


switch ($action) {
    case 'listProjets':
        $projetController->listProjets();
        break;
    case 'addProjetForm':
        $projetController->addProjetForm();
        break;
    case 'addProjet':
        $projetController->addProjet();
        break;
    case 'affectationForm':
        $utilisateurController->affectationForm();
        break;
    case 'affecterUtilisateurProjet':
        $utilisateurController->affecterUtilisateurProjet();
        break;
    default:

        $projetController->listProjets();
        break;
}
