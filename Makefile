DOCKER_COMPOSE = docker-compose
PHP_CONTAINER = app
NGINX_CONTAINER = laravel_nginx
ARTISAN = $(DOCKER_COMPOSE) exec $(PHP_CONTAINER) php artisan
COMPOSER = $(DOCKER_COMPOSE) exec $(PHP_CONTAINER) composer
NPM = $(DOCKER_COMPOSE) exec $(PHP_CONTAINER) npm

# Commandes par défaut
all: help

# Commandes pour Docker
up:
	@echo "🚀 Démarrage des conteneurs..."
	$(DOCKER_COMPOSE) up -d --build

down:
	@echo "🛑 Arrêt des conteneurs..."
	$(DOCKER_COMPOSE) down

restart:
	@echo "🔄 Redémarrage des conteneurs..."
	$(DOCKER_COMPOSE) down && $(DOCKER_COMPOSE) up -d

logs:
	@echo "📜 Affichage des logs Nginx..."
	$(DOCKER_COMPOSE) logs -f $(NGINX_CONTAINER)

# Commandes pour Laravel
init:
	@echo "🎯 Initialisation du projet Laravel..."
	make keygen
	make migrate

keygen:
	@echo "🔑 Génération de la clé d'application Laravel..."
	$(ARTISAN) key:generate

migrate:
	@echo "📂 Exécution des migrations..."
	$(ARTISAN) migrate --seed
link:
	@echo "🔗 Création d'un lien symbolique pour le local storage..."
	$(ARTISAN) storage:link
cache:
	@echo "🧹 Nettoyage et mise en cache des configurations..."
	$(ARTISAN) config:clear
	$(ARTISAN) cache:clear
	$(ARTISAN) config:cache

# Commandes pour le développement
perm:
	@echo "🔧 Configuration des permissions..."
	sudo chmod -R 777 src/storage src/bootstrap/cache

fresh:
	@echo "♻️ Réinitialisation complète de la base de données..."
	$(ARTISAN) migrate:fresh --seed

# Commandes d'aide
help:
	@echo "Commandes disponibles :"
	@echo "  make up         -> Démarre les conteneurs Docker"
	@echo "  make down       -> Arrête les conteneurs Docker"
	@echo "  make restart    -> Redémarre les conteneurs Docker"
	@echo "  make logs       -> Affiche les logs du conteneur Nginx"
	@echo "  make init       -> Configure Laravel (install, keygen, migrate)"
#	@echo "  make install    -> Installe les dépendances Composer"
	@echo "  make keygen     -> Génère la clé d'application Laravel"
	@echo "  make migrate    -> Exécute les migrations Laravel"
	@echo "  make link    	 -> Créé un lien symbolique pour le local storage"
	@echo "  make cache      -> Nettoie et met en cache les configurations"
	@echo "  make fresh      -> Réinitialise la base de données"
	@echo "  make perm       -> Configure les permissions des dossiers"
