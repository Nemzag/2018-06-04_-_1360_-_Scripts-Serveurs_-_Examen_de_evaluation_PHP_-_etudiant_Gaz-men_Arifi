## Evaluation Scripts Serveur
### Consignes
1. Réalisez une page publique (index.php) et une page administration sécurisée (admin.php) dans le cadre d'un établissement scolaire (IEPSCF)
2. La base de données (2018_06_07_evaluation) est fournie ainsi que l'arborescence du projet (dossiers et fichiers).  Tous les fichiers que vous devez utiliser existent déjà avec un commentaire pour l'écriture du script.  Vous ne devez rien déplacer ou renommer.  Interdiction d’utiliser des sources externes ou des anciens exercices pour l’écriture des scripts.
3. Pour la mise en forme, les fichiers CSS et JS sont fournis ainsi que le nom des classes utilisées.  Les contenus HTML non dynamique sont également disponibles sur les fichiers.
### Etapes
1. Création de la connexion dans le fichier db.php
2. Partie publique:

    2.1. Affichez les catégories  (nos formations) sous la forme de vignettes. Lors d'un clic sur une de ces images, les sections correspondantes sont affichées dans un tableau.
    
    2.1. Le texte de la description est coupé à l'aide de la fonction cutString() fournie dans le fichier tools.php.
    
3. Partie administration:

    3.1. Le formulaire de log (login.html) est déjà écrit dans le fichier.
    
    3.2. Ecrivez le script de verification de login et de password dans le fichier veriflogin.php.
    
    3.3. Ajoutez les deux boutons (Website (retour à l'index) et Logout (déconnexion)).
        
    3.4. Créez le script de déconnexion (out.php)
        
    3.5. Affichez le listing d'administration (tableau) avec les trois fonctionnalités (del, maj et view).
        
    3.6. Créez les formulaires (dossier forms)et les scripts de traitement (dossier actions) nécessaires.