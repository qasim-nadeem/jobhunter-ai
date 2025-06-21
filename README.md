# Laravel + Docker

laravel-docker allows you to setup and configure fresh laravel projects with Docker. It will be up and running on your development machine with any OS (Windows, Mac, Linux), that has docker installed on it with few easy to write commands.

**This Docker installation setups following:** 

Laravel 12
PHP 8.2
Nginx Server
Mysql DB version 8

# How it works?

 1. install Docker on your machine, if already installed just make sure docker daemon is running.
 2. make sure docker-compose is installed
 3. clone the repository on your local machine
 4. run command: docker-compose up -d --build
 
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

**Note:** >  make sure to include following Database configurations for Mysql in your .env file:

    DB_CONNECTION=mysql
    DB_HOST=mysql-db
    DB_PORT=3306
    DB_DATABASE=laravel-docker-db
    DB_USERNAME=root
    DB_PASSWORD=root



------

This Docker based Laravel installation is only for development purpose, to setup Laravel projects on your development machine fast, with minimum dependencies, so you can see laravel up and running on your browser as soon as possible and start the development of your next big thing.

you can update the docker configs further, to include things that your project might need. This installation only provide the necessary things that a fresh laravel project needs.

> Please hit star for this repo if it saves you a time for your next laravel project

Follow developer on: [LinkedIn](https://www.linkedin.com/in/theqasimnadeem) | [Github](https://github.com/qasim-nadeem)