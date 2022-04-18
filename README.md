## Activity

* Copy `.env.example` to `.env`
* Copy `.docker/.env.example` to `.docker/.env`
* Run `./start.sh`
* Run `cd .docker; docker-compose exec --user=laradock workspace composer install`
* Run `cd .docker; docker-compose exec --user=laradock workspace php artisan migrate`
