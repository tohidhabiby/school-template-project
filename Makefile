build:
	docker compose build

up:
	docker compose up -d

shell:
	docker compose exec php bash

down:
	docker compose down
