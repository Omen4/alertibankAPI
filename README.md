README

TODO<br />
- Ajout des fonctionnalités métier de transfert (transferFund, withdraw, deposit)  
- Ajout de l'adapter prenant les informations obtenues du DAO et retournant l'objet
- Abstraction en interface des méthodes CRUD et des adapters
- Déploiement d'un systeme de routing guidé (limité via un index et une circulation sur routes)



TEST (INTENTION)<br />
Comme je ne pouvais pas tester correctement sans phpunit j'ai disséminé plusieurs echo pour vérifier 
la qualité de mon code.
<br />
L'intention initial était de procéder au fur et a mesure de la structuration: <br />
- Model : test de la bonne création des objets, test de typicité ( passage de variable erronée via un provider)
- Dao : vérification de la connexion, vérification de l'array retourné et des différents champs concernés
- Adapter :  vérification de la bonne création de l'objet, similaire (en préférant la méthode assertEquals)
- Routes(Api) : test des réponses des routes dans l'esprit de postman.


INSTALL<br />
run composer install<br />
if you're not running a webserver like wamp you can use php inner webserver with
<br />   php -S localhost:8000