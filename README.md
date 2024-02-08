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

See [examples folder](https://github.com/knork-fork/php-deploy-server/tree/master/examples) for workflow and script file
