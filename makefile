run:
	@echo "🚀 Lancement des services Docker..."
	docker-compose up -d --build

	@echo "📧 Lancement de Mailpit..."
	@docker rm -f mailpit 2>/dev/null || true
	@docker run -d --name mailpit -p 1025:1025 -p 8025:8025 axllent/mailpit
	@echo "✅ Mailpit disponible sur http://localhost:8025"

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

	@echo "🛑 Arrêt de Mailpit..."
	@docker stop mailpit 2>/dev/null || true
	@docker rm mailpit 2>/dev/null || true

	@echo "🛑 Arrêt du serveur Symfony..."
	symfony server:stop

restart: stop run

stan:
	@echo "🔍 Analyse statique PHPStan..."
	vendor/bin/phpstan analyse

test-mail:
	@echo "✉️ Envoi d'un email de test..."
	php bin/console mailer:test admin@adhyanga.fr
