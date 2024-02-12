# PHP Deploy Server

Deploy server written in PHP and Symfony.

Start container:

```
docker-compose up --build -d
```

Run composer install:

```
docker/composer install --no-interaction
```

Run setup script to setup local env variables and add host ssh keys to container (deploy scripts need access outside of containerized environment):

```
scripts/setup.sh
```

By default app should be available @ `localhost:60001`

Or if already built:

```
docker-compose up -d
```

Stop container:

```
docker-compose down
```

## Extras

Enter the shell:

```
docker/shell
```

## How to use

See [examples folder](https://github.com/knork-fork/php-deploy-server/tree/master/examples) for workflow and script file.

Add secrets to settings/secrets/actions on github and to .env/.env.local before setting up workflow.

Make sure proper HOST_USER and HOST_FOLDER variables are set.
