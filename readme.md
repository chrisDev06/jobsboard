## JobsBoard App

    1/ Clonez le dépôt :
    git clone https://github.com/chrisDev06/jobsboard.git
    cd jobsboard

    2/ Configuration de la base de données :
        Créez une base de données MySQL nommée jobboard.
        Dans le fichier config/config.php, modifiez les paramètres de connexion à la base de données (DB_HOST, DB_NAME, DB_USER, DB_PASSWORD) selon votre configuration.

    3/ Initialisation de la base de données :
        Exécutez le script SQL fourni dans database/schema.sql pour créer la structure de la base de données et la table des utilisateurs.

    4/ Démarrage de l'application :
        Assurez-vous que vous avez un serveur Apache et PHP installés.
        Placez le contenu du répertoire dans votre répertoire racine du serveur ou configurez un hôte virtuel.
        Accédez à l'application dans votre navigateur (par exemple, http://localhost/jobboard).

## Guide Novice

Structure du Projet

L'application suit une architecture (MVC)

    config/ : Contient les fichiers de configuration pour la base de données et autres paramètres.
    controllers/ : Les contrôleurs gèrent les actions utilisateur et les requêtes.
    models/ : Les modèles représentent les données et gèrent les interactions avec la base de données.
    views/ : Les vues sont les interfaces utilisateur et affichent les données.

Fonctionnement

    L'utilisateur accède à l'application via un navigateur.
    Le contrôleur reçoit les requêtes de l'utilisateur, traite les données et appelle le modèle approprié.
    Le modèle effectue des opérations sur la base de données (lire, écrire, supprimer).
    Les données récupérées sont transmises au contrôleur.
    Le contrôleur choisit la vue appropriée et transmet les données à afficher.
    La vue affiche les données à l'utilisateur.
