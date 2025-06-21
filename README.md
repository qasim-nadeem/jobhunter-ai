
# JobHunber-AI

  

A project to modify CV based on the job description using AI, so that candidates can pass the ATS checks to land for interviews.

  

**Following is this project tech stack:**

Laravel 12

PHP 8.2

Nginx Server

Mysql DB version 8

  

# installation?

  

1. install Docker on your machine, if already installed just make sure docker daemon is running.

2. install docker compose in your machine

3. clone the repository on your local machine

4. run command: docker-compose up -d --build

5. run following commands on the root of the project

 `docker-compose exec app composer install --optimize-autoloader --no-dev `
 `docker-compose exec app php artisan key:generate`
 `docker-compose exec app php artisan migrate`

  

**Thats it!** > Visit `localhost` on your browser and you will see the laravel page

  

---

  

**Connecting with your db from host machine:**

it is essential for the development to be able to access the database using your Database GUI tools like Mysql workbench or DBeaver, you can use following to make the connection:

Hostname: 127.0.0.1

Port: 3307

Username: root

Password: root

  

once the connection is made you can easily navigate the database using your GUI tools.

---

**Note:** > make sure to include following Database configurations for Mysql in your .env file:

`DB_CONNECTION=mysql`
`DB_HOST=mysql-db`
`DB_PORT=3306`
`DB_DATABASE=laravel-docker-db`
`DB_USERNAME=root`
`DB_PASSWORD=root`

------

Follow developer on: [LinkedIn](https://www.linkedin.com/in/theqasimnadeem) | [Github](https://github.com/qasim-nadeem)