build:
	docker compose build

up:
	docker compose up -d

shell:
	docker compose exec php sh

down:
	docker compose down

check:
	docker compose exec php vendor/bin/php-cs-fixer fix --dry-run --diff
	docker compose exec php vendor/bin/phpstan analyse
	docker compose exec -e XDEBUG_MODE=coverage php vendor/bin/phpunit
