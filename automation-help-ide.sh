#!/usr/bin/env bash

# Terminate after the first line that fails.
set -e

# Automatically export all variables.
set -a
source .env
set +a

rm -rf ./wordpress/
curl "https://wordpress.org/wordpress-${WORDPRESS_VERSION}.zip" -o "wordpress-${WORDPRESS_VERSION}.zip"
unzip -q "wordpress-${WORDPRESS_VERSION}.zip"
rm "wordpress-${WORDPRESS_VERSION}.zip"
