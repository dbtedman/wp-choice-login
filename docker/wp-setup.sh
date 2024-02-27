#!/usr/bin/env bash

wp core install \
  --url="${WP_SITEURL}" \
  --title="WP Choice Login" \
  --admin_user="choice" \
  --admin_email="choice@example.com" \
  --admin_password="choice" \
  --skip-email

wp option update blogdescription "WP Choice Login"
wp option update timezone_string "Australia/Brisbane"

wp plugin activate "wp-choice-login"
