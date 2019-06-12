# Description
Simple free-to-use Laravel 5.8 CRUD example using Laravel 5.8, Docker, Nginx, PostgreSQL and VueJS

# Pre-requisites
- Install `docker-ce` on your host machine

# Environment Setup and Configuration
Here are a few prelims you may need to do to get this up to speed.
## Docker up!
- Run `$ docker-compose up -d` while in the parent directory to bring the containers up
- Note: This may take a while as docker will be pulling in the respective images.
- Run `$ docker exec -it php sh` to enter the PHP container and do the following:
    - `sh` terminal doesn't have `make` so you will need to install that first:
    ```
    $ apk --no-cache add make
    ```
    - Run `$ make initialize` -- This will install Composer and spin up the Laravel app
    - Now use run the following definitions from the `Makefile`:
        - Install Database drivers: `$ make install_db_deps`
        - Install `npm`: `$ make install_npm` then run `$ npm install`
        - Reset ``storage/` folder perms: `$ make reset_perms`
    - Run the database migrations:
    ```
    $ php artisan migrate
    ```
    Note: Because PostgreSQL is quite qirky with docker, you might get 'connection refused' issues with PHP trying to call the database volume. In this case, do the following:
        - Stop all docker images: `$ docker stop php postgres nginx`
        - Clear the postgres volume data cache: `$ docker-compose rm -fv postgres`
        - Restart the containers: `$ docker-compose up -d`
        - Re-try `$ php artisan migrate` -- It should work fine now.
        
# Notes:
- This application is fully dockerized and the docker container's should spin up without any issues.
- The CRUD functionality was built in a rush under some definitely challenging circumstance, so there might be a thing or two that won't work.
- The code structure is fairly decoupled and quite clean on the back-end.
- Some outstanding functionality include:
    - Page menus, pagination
    - Separate views instead of using a modal (although this is a design choice so its up to you).
- Theres lots more to improve on so please feel free to clone, update and share the fun!

Enjoy!
    
    
