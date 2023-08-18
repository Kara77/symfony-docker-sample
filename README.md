# Mini Jobijoba App

## Getting Started

Installer docker si ce n'est pas déjà fait : [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)

Commande à exécuter : 

1. Run `DUID=$(id -u) DGID=$(id -g) docker compose build --pull --no-cache` pour générer l'image (l'erreur sur Mercure peut être ignorée)
2. Run `DUID=$(id -u) DGID=$(id -g) HTTP_PORT=8000 HTTPS_PORT=4443 HTTP3_PORT=4443 docker compose up` pour lancer les conteneurs
3. Open `https://localhost:4443/job` Pour lancer la mini application en local, il est possible de devoir accepter les certificats [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
4. Run `docker compose down --remove-orphans` Pour arrêter les conteneurs docker
