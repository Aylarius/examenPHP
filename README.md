examenPHP
=========
Application Symfony2 (version 2.8) créée dans le cadre de l'examen final à la Wild Code School.   

## Pré-requis

Composer => https://getcomposer.org/  
Symfony 2.8 => https://symfony.com/download

## Bundles

FOSUserBundle ==> http://symfony.com/doc/current/bundles/FOSUserBundle/index.html  
MarchandBundle  

## Fonctionnement  
Le marchand doit avoir un compte superadmin. Il aura ainsi accès à la liste des commandes, l'inventaire des fruits et la liste des clients. Il pourra ajouter, modifier et supprimer des commandes et des fruits, et pourra ajouter ou supprimer des clients.   
Les clients doivent avoir un compte user (créé par le marchand). Ils auront accès à la liste de leurs commandes et pourront créer de nouvelles commandes.

## Procédure d'installation  
  
1. Pour cloner le projet, saisir dans le terminal :  
`git clone https://github.com/Aylarius/examenPHP`  
  
2. Entrer dans le dossier :  
`cd examenPHP` 

3. Installer composer en saisissant dans le terminal :  
`composer install`  
  
4. A la fin du composer install, configurer la base de donnée  
`database_name (symfony):`  
`database_user (root):`   
`database_password (null):`
  
5. Créer votre base de données via le terminal :  
`php app/console doctrine:database:create`  
  
6. Mettre à jour votre base de données via le terminal :  
`php app/console doctrine:schema:update --force`  
  
7. Enfin mettre les droits sur le projet en saisissant dans le terminal :  
`sudo chmod -R 777 web/images/ app/cache/ app/logs/`  

8. Ajouter et lier les assets (le dossier Resources/public)    
`php app/console assets:install --symlink`  

9. Créer un compte administrateur pour le marchand en indiquant un nom d'utilisateur, un mot de passe et un email :  
`php app/console fos:user:create --super-admin`   

10. Vous pouvez désormais vous connecter au site via votre localhost de cette façon :  
`localhost/examenPHP/web/login` 
