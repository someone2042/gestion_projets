<!DOCTYPE html>
<html>

<head>
    <title>Liste des Projets</title>
</head>

<body>
    <h1>Liste des Projets</h1>
    <a href="index.php?action=addProjetForm">Ajouter un projet</a> | <a href="index.php?action=affectationForm">Affecter un utilisateur</a>
    <table border="1">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projets as $projet): ?>
                <tr>
                    <td><?php echo htmlspecialchars($projet['titre']); ?></td>
                    <td><?php echo htmlspecialchars($projet['description']); ?></td>
                    <td><?php echo htmlspecialchars($projet['date_debut']); ?></td>
                    <td><?php echo htmlspecialchars($projet['date_fin']); ?></td>
                    <td><?php echo htmlspecialchars($projet['statut']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>