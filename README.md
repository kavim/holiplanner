<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About This Project

This project is a simple solution to a technical test. The goal was to create a straightforward and functional application without overthinking the implementation. The project is built using Laravel and Docker to ensure a smooth development and deployment process.

# Table of Contents

1. [Introduction](#about-this-project)
2. [Getting Started](#getting-started)
3. [Endpoints](#endpoints)
4. [Running Tests](#running-tests)

## Getting Started

Follow these steps to clone and start the project:

### Prerequisites

#### with Docker

-   Docker
-   Docker Compose

#### Or locally

-   PHP 8.3^
-   Composer
-   MySQL 8.0.33 (or MariaDB equivalent)
-   Redis, Mailservice, and Nginx (can be installed locally or bypassed by running the server differently)

### Clone the Repository

```bash
git clone git@github.com:kavim/holiplanner.git
cd holiplanner
```

### Set Up Environment Variables

Copy the example environment file and update the necessary values:

```bash
cp .env.example .env
```

### Build and Start the Containers

Use Docker Compose to build and start the containers:

```bash
docker-compose up -d --build
```

### Install Dependencies

If you are running the project locally, omit the docker-compose exec prefix.

Once the containers are up, dependencies will be installed automatically. If not, you can install them manually:

```bash
docker-compose exec app composer install
```

### Run Migrations

Run the database migrations to set up the database schema. The entrypoint script handles this by default, but you can run them manually if needed:

```bash
docker-compose exec app php artisan migrate
```

You can also seed the database:

```bash
docker-compose exec app php artisan db:seed
```

## Access the Application

The application should now be running and accessible at http://localhost:8000. The home page includes API documentation, which you can use for testing the endpoints directly or through Postman.

## Postman collection

Here you have a shorcut to test this api, just download the postman collection [postman collection](https://github.com/kavim/holiplanner/blob/main/Holiplanner.postman_collection.json)

## API Documentation

### Base URL

```bash
http://localhost/api
```

## Running Tests

To run the tests, use the following command:

```json
docker-compose exec app php artisan test
```
