<!DOCTYPE html>
<html>

<head>
    <title>Affecter un Utilisateur à un Projet</title>
</head>

<body>
    <h1>Affecter un Utilisateur à un Projet</h1>
    <form action="index.php?action=affecterUtilisateurProjet" method="post">
        <div>
            <label for="utilisateur">Utilisateur:</label>
            <select id="utilisateur" name="id_utilisateur" required>
                <option value="">Sélectionner un utilisateur</option>
                <?php foreach ($utilisateurs as $utilisateur): ?>
                    <option value="<?php echo htmlspecialchars($utilisateur['id']); ?>">
                        <?php echo htmlspecialchars($utilisateur['prénom'] . ' ' . $utilisateur['nom']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="projet">Projet:</label>
            <select id="projet" name="id_projet" required>
                <option value="">Sélectionner un projet</option>
                <?php foreach ($projets as $projet): ?>
                    <option value="<?php echo htmlspecialchars($projet['id']); ?>">
                        <?php echo htmlspecialchars($projet['titre']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <button type="submit">Affecter l'utilisateur au projet</button>
        </div>
    </form>
    <a href="index.php?action=listProjets">Retour à la liste des projets</a>
</body>

</html>