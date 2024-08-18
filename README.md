<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About This Project

This project is a simple solution to a technical test. The goal was to create a straightforward and functional application without overthinking the implementation. The project is built using Laravel and Docker to ensure a smooth development and deployment process.

# Table of Contents

1. [Introduction](#about-this-project)
2. [Getting Started](#getting-started)
3. [Endpoints](#endpoints)
    - [GET /api/users](#get-apiusers)
    - [POST /api/users](#post-apiusers)
    - [GET /api/users/{id}](#get-apiusersid)
    - [PUT /api/users/{id}](#put-apiusersid)
    - [DELETE /api/users/{id}](#delete-apiusersid)
4. [Running Tests](#running-tests)

## Getting Started

Follow these steps to clone and start the project:

### Prerequisites

#### with Docker

-   Docker
-   Docker Compose

#### Or locally

-   PHP-8.3^
-   Composer
-   Mysql 8.0.33 (or equivalent mariaDB)
-   Redis, Mailservice and Nginx, you can install locally or work around with it running the server in other ways

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

If you are running the project locally ignore the `docker-compose exec`prefix

Once the containers are up, you can run the migration manually, however, the `entrypoint` already do it for us.

```bash
docker-compose exec app composer install
```

### Run Migrations

Run the database migrations to set up the database schema, the `entrypoint` already do it for us. so you can run it manually or just run the seeders

```bash
docker-compose exec app php artisan migrate
```

```bash
docker-compose exec app php artisan db:seed
```

## Access the Application

The application should now be running and accessible at http://localhost:8000 on this page we can find a docs replica, falow this to test the api or just use postman

## Postman collection

Here you have a shorcut to test this api, just download the postman collection

## API Documentation

### Base URL

```bash
http://localhost/api
```

### Endpoints

#### GET /api/users

Retrieve a list of users.

**Response:**

```json
[
    {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com"
    },
    ...
]
```

#### POST /api/users

Create a new user.

Request:

```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "secret"
}
```

Response:

```json
{
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com"
}
```

#### GET /api/users/{id}

Retrieve a specific user by ID.

Response:

```json
{
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com"
}
```

#### PUT /api/users/{id}

Update a specific user by ID.

Request:

```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "newsecret"
}
```

```json
Response:
{
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com"
}
```

#### DELETE /api/users/{id}

Delete a specific user by ID.

Response:

```json
{
    "message": "User deleted successfully"
}
```

## Running Tests

To run the tests, use the following command:

```json
docker-compose exec app php artisan test
```
