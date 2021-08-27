# Cornerhouse Dental Practice
This is a project to rebuild the previous website in Drupal 9 now that Drupal 7 is end-of-life. Local development is achieved using DDev and docker.

## Requirements
This guide assumes that
- [DDev](https://ddev.readthedocs.io/en/stable/)
- [Docker Engine](https://docs.docker.com/engine/install/) and
- [Docker Compose](https://docs.docker.com/compose/install/)

are already installed, and the user can run `docker` commands without using `sudo`.

## Development Setup
```bash
git clone git@github.com:surreymagpie/d9-cornerhouse.git
cd d9-cornerhouse
ddev start
ddev composer install
ddev drush site:install --existing-config -y
```

The existing production database can be synced locally with
```bash
ddev drush sql:sync @prod @self
```
## Production
In production, there is no need to install development modules, e.g. `devel`. So the installation line should change to:
```bash
composer install --no-dev
```

Then create a `settings.local.php` file alongside the existing `settings.php` which should contain at least the following:
```php
<?php

$config['config_split.config_split.prod']['status'] = TRUE;
$config['config_split.config_split.dev']['status'] = FALSE;
```
so that Drupal is aware of which configuration to load.