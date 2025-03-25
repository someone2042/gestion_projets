<!DOCTYPE html>
<html>

<head>
    <title>Ajouter un Projet</title>
</head>

<body>
    <h1>Ajouter un Projet</h1>
    <form action="index.php?action=addProjet" method="post">
        <div>
            <label for="titre">Titre du projet:</label>
            <input type="text" id="titre" name="titre" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div>
            <label for="date_debut">Date de début:</label>
            <input type="date" id="date_debut" name="date_debut">
        </div>
        <div>
            <label for="date_fin">Date de fin:</label>
            <input type="date" id="date_fin" name="date_fin">
        </div>
        <div>
            <label for="statut">Statut:</label>
            <input type="text" id="statut" name="statut">
        </div>
        <div>
            <button type="submit">Ajouter le projet</button>
        </div>
    </form>
    <a href="index.php?action=listProjets">Retour à la liste des projets</a>
</body>

</html>