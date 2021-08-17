# Cornerhouse Dental Practice
This is a project to rebuild the previous website in Drupal 9 now that Drupal 7 is end-of-life. Local development is achieved using DDev and docker.

## Requirements
This guide assumes that
- [DDev](https://ddev.readthedocs.io/en/stable/)
- [Docker Engine](https://docs.docker.com/engine/install/) and
- [Docker Compose](https://docs.docker.com/compose/install/)

are already installed, and the user can run `docker` commands without using `sudo`.

## Setup
```
git clone git@github.com:surreymagpie/d9-cornerhouse.git
cd d9-cornerhouse
ddev start
ddev composer install
ddev drush site:install --existing-config -y
```
