#TP SYMFONY

*A rendre pour le 19 Décembre 2021 au soir*

##Démarrage

Une fois le projet cloné, il faut importer le fichier db.sql dans votre phpmyadmin.

##Fixtures

Les adresses mail contenue dans la base de donnée sont des adresses générés par **Faker** dans *src/DataFixtures/AppFixtures.php*.
Si vous le souhaitez vous pouvez les changer :
* Il faut dropper le contenu des tables depuis la console *php bin/console doctrine:schema:drop --force*.
* Il faut maintenant rétablir les des tables depuis la console *php bin/console doctrine:schema:update --force*.
* Pour finir, il faut exécuter le fichier contenant les fixtures*php bin/console doctrine:fixtures:load*

Sinon vous pouvez utiliser les comptes déjà présents dans la base de donnée dans la table *User*
Le mots de passe par défaut pour tous les comptes générés sont : **password**