.DEFAULT_GOAL := all

.PHONY: all
all: install lint test

.PHONY: install
install:
	@composer install

.PHONY: lint
lint:
	@composer run lint

.PHONY: format
format:
	@composer run format

.PHONY: test
test:
	@composer run test

.PHONY: help_ide
help_ide:
	@curl "https://wordpress.org/wordpress-6.4.3.zip" \
		 -o wordpress-6.4.3.zip \
         && unzip -q wordpress-6.4.3.zip \
         && rm wordpress-6.4.3.zip

.PHONY: local
local:
	@docker compose down --volumes --rmi local \
		&& docker compose up --detach \
		&& docker exec -it --user www-data "wp_choice_login_web" /app/docker/wp-setup.sh \
		&& echo "visit http://localhost:8000/"
