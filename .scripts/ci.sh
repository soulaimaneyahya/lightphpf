#!/bin/bash

# sudo chmod u+x ./.scripts/ci.sh
set -e

if [ ! -f .env ]; then
cp .env.example .env
fi

composer validate --strict

COMPOSER_TIMEOUT=600 COMPOSER_MEMORY_LIMIT=-1 composer install -q --no-ansi --no-scripts --no-progress --prefer-dist

sudo chown -R $USER:www-data app/Bootstrap/Cache
sudo chmod -R 777 app/Bootstrap/Cache

composer run-script php-fixer
composer run-script php-cs-fixer
composer run-script composer-dump

exit 0;
