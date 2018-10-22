#!/usr/bin/env bash
set -e
bin/console --env=test doctrine:database:drop  --force
bin/console --env=test doctrine:database:create
bin/console --env=test doctrine:schema:update --force --no-interaction
bin/console --env=test doctrine:fixtures:load --no-interaction
./vendor/bin/behat --no-interaction
bin/console --env=test doctrine:database:drop  --force