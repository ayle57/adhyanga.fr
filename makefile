run:
	@echo "🚀 Lancement des services Docker..."
	docker-compose up -d --build

	@echo "📦 Installation des dépendances PHP..."
	composer install

	@echo "🗄 Création de la base de données si nécessaire..."
	php bin/console doctrine:database:create --if-not-exists

	@echo "🛠 Exécution des migrations..."
	php bin/console doctrine:migrations:migrate --no-interaction

	@echo "🌐 Lancement du serveur Symfony..."
	symfony serve -d

	@echo "🎨 Compilation Sass en watch..."
	php bin/console sass:build --watch

stop:
	@echo "🛑 Arrêt des services Docker..."
	docker-compose down
	@echo "🛑 Arrêt du serveur Symfony..."
	symfony server:stop

restart: stop run

stan:
	@echo "🔍 Analyse statique PHPStan..."
	vendor/bin/phpstan analyse
