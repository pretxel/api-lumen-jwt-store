# API store with Lumen
It's an api made with [Lumen](https://lumen.laravel.com/) and [JWT Authentication](https://jwt.io/)

## Installation

Run the commands below:
```bash
composer install
php artisan jwt:generate
cp .env.example .env
php artisan migrate --seed
```

## Laradock
If you want run on docker containers, you must install:
- Docker

### Configuration

```bash
git submodule init
git submodule update
```

### Run Containers

Run docker containers
```bash
cd laradock
docker-compose build nginx mysql phpmyadmin
docker-compose up -d nginx mysql phpmyadmin
```


## Routes
```bash
php artisan route:list
+----------+---------------------+-------------------------+------------------------------------------+------------------+--------------------------+
| Verb     | Path                | NamedRoute              | Controller                               | Action           | Middleware               |
+----------+---------------------+-------------------------+------------------------------------------+------------------+--------------------------+
| POST     | api/auth/login      | api.auth.login          | App\Http\Controllers\Auth\AuthController | postLogin        | api.controllers          |
| POST     | api/product         | api.auth.product        | App\Http\Controllers\APIController       | createProduct    | api.controllers|api.auth |
| GET|HEAD | api                 | api.index               | App\Http\Controllers\APIController       | getIndex         | api.controllers|api.auth |
| GET|HEAD | api/auth/user       | api.auth.user           | App\Http\Controllers\Auth\AuthController | getUser          | api.controllers|api.auth |
| GET|HEAD | api/products        | api.auth.get_product    | App\Http\Controllers\APIController       | getProducts      | api.controllers|api.auth |
| PATCH    | api/auth/refresh    | api.auth.refresh        | App\Http\Controllers\Auth\AuthController | patchRefresh     | api.controllers|api.auth |
| DELETE   | api/auth/invalidate | api.auth.invalidate     | App\Http\Controllers\Auth\AuthController | deleteInvalidate | api.controllers|api.auth |
| PUT      | api/product/{id}    | api.auth.update_product | App\Http\Controllers\APIController       | updateProduct    | api.controllers|api.auth |
| DELETE   | api/product/{id}    | api.auth.delete_product | App\Http\Controllers\APIController       | deleteProduct    | api.controllers|api.auth |
+----------+---------------------+-------------------------+------------------------------------------+------------------+--------------------------+
```

To authenticate a user, you need to make a request:
```bash
curl -X POST -F "email=edsel@example.com" -F "password=edsel" "http://localhost/api/auth/login"
```

To get any resource:
```bash
curl -X GET -H "Authorization: Bearer a_long_token_appears_here" "http://localhost/api/products"
```

