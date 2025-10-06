build:
	docker compose build

up:
	docker compose up -d

shell:
	docker compose exec php sh

down:
	docker compose down
