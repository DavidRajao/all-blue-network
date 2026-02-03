# All Blue Network
Site One Piece pour projet scolaire avec actualités, descriptions, quiz et liste des plateformes pour visionner l'œuvre. 
## Prérequis
Un serveur web local avec PHP  (UwAmp, XAMPP ou toute autre alternative équivalente)
## Installation
- Cloner le dépôt dans le dossier du serveur web
- Démarrer le serveur
- Accéder au projet via `index.php`
### Configuration PHP (XAMPP uniquement)
Si vous utilisez **XAMPP**, il est nécessaire d’activer l’extension int. Pour ce faire :
- Ouvrir le fichier `php.ini`
- Supprimer le point-virgule devant la ligne : `extension=intl`
- Redémarrer Apache
Sans cette configuration, le fichier `actu.php` ne fonctionnera pas correctement.
## API utilisée
Les données du site ont été basées sur l'API disponible à l'adresse suivante : https://api-onepiece.com/fr
