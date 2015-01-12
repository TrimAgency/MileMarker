#!/usr/local/env bash
WPCLI="wp-cli"

echo 'Setting up WP test site'
$WPCLI core install \
  --url="http://localhost:8080" \
  --title="Development Install Site" \
  --admin_user=adm \
  --admin_password=foobar \
  --admin_email=adm@example.com

echo 'Activating plugins and theme'
$WPCLI plugin activate advanced-custom-fields
$WPCLI plugin activate mm-products
$WPCLI theme activate milemarker

