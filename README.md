# TP SYMFONY

*A rendre pour le 19 Décembre 2021 au soir*

## Démarrage

Une fois le projet cloné, il faut importer le fichier db.sql dans votre phpmyadmin.

## .Env.local

Dans le projet, a la racine, il faut créer un fichier .env.local qui contient :
* APP_SECRET=1b4601c19444ffa5bf5d1911323999d0
* DATABASE_URL="mysql://root:@localhost:3306/tp_symfony?serverVersion=5.7"

## Fixtures

Les adresses mail contenues dans la base de donnée sont des adresses générées par **Faker** dans *src/DataFixtures/AppFixtures.php*.
Si vous le souhaitez vous pouvez les changer :
* Il faut dropper le contenu des tables depuis la console *php bin/console doctrine:schema:drop --force*.
* Il faut maintenant rétablir les tables depuis la console *php bin/console doctrine:schema:update --force*.
* Pour finir, il faut exécuter le fichier contenant les fixtures*php bin/console doctrine:fixtures:load*

Sinon vous pouvez utiliser les comptes déjà présents dans la base de donnée dans la table *User*
Le mot de passe par défaut pour tous les comptes générés est : **password**

## Points d'amélioration

* Recevoir un mail lorsque l'on est invité à une soirée
* Pouvoir valider le remboursement de la dette afin de ne plus apparaitre comme étant à crédit pour la soirée
* Oubli de la page de création de compte
* Changer la manière d'ajouter des gens dans sa soirée afin de les ajouter en mettant leur mail (clée unique d'un utilisateur) parce que actuellement en cherchant sur les inscrits du site au dessus de 15 utilisateurs, cela devient plus difficile de chercher dans la liste l'utilisateur que l'on cherche.
