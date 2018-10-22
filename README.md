# Trademen Jobs

## Installation
In order to run the project you need `Docker` and `docker-compose`.
Once you got them installed, and the project cloned, is enough to execute: `docker-compose up -d` inside the project folder, the entrypoint of the application will be http://localhost:8081/api which contains the documentation of the API.

If you want to modify some parameter, feel free to do so, by modifying the `.env.docker` file contained in the folder, the reason to keep `.env` separated from `.env.docker` is because gives more freedom to have the docker configuration separated from the dev environment (in case you are not using docker).

## Technology
The framework used for this project is Symfony 4 with PHP 7.2, the package used for the REST API and documentation design is [`api-platform`](https://api-platform.com/).

## Testing
A file is included in the project for testing the application, if you need to test it, then you have to install the composer dependencies (including the dev environment) and run the script `test.sh` included in the project, this will create a sqlite database only for testing purposes and drop it once is finished.

## Default data
The default data (as categories) are included as migration, you don't need to import any sql file in order to get this data, once you start the project for the first time, they will be imported in the database by using [`doctrine-migrations-bundle`](https://symfony.com/doc/master/bundles/DoctrineMigrationsBundle/index.html)

## Manual installation

If you want to install the project manually, you have to go through the following steps:

1. Clone the project.
2. Install the dependencies: `composer install`
3. Make a copy of `.env.dist` and adjust the parameters inside (e.g. `DATABASE_URL`)
4. Create the database: `bin/console doctrine:database:create`
5. Run the migrations: `bin/console doctrine:migrations:migrate --no-interaction`
6. Run the tests: `./test.sh` (Optional)
7. Run the dev server: `bin/console server:run`
8. Done.
