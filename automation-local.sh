#!/usr/bin/env bash

# Terminate after the first line that fails.
set -e

# Automatically export all variables.
set -a
source .env
set +a

docker compose down --volumes --rmi local
docker compose up --detach
docker exec -it --user www-data "wp_choice_login_web" /app/docker/wp-setup.sh
echo "visit http://localhost:${WEB_PORT}/"
