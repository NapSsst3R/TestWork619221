# TestWork619221

## Start backend environment
```cd backend```
```docker-compose up --build```

## Connect to application container
```docker exec -it php-fpm bash```

## Execute migrations
```php artisan migrate```

## Send request api
### List employees
```
GET /product HTTP/1.1
Host: localhost:3800
Content-Type: application/json
```

### Create employee
```
// create employee
POST /product/{id} HTTP/1.1
Host: localhost:3800
Content-Type: application/json
Content-Length: 129

{
    "name": "name",
    "description": "product description",
    "price": 233.23 
} 
```

### Get employee
```
GET /product/{id} HTTP/1.1
Host: localhost:3800
Content-Type: application/json
```

### Update employee
```
POST /product/{id} HTTP/1.1
Host: localhost:3800
Content-Type: application/json

{
    "name": "name",
    "description": "product description",
    "price": 233.23 
} 
```

### Delete employee
```
DELETE /product/{id} HTTP/1.1
Host: localhost:3800
Content-Type: application/json
```

## Start frontend environment
```cd frontend```
```yarn install```

## Run app for development
```yarn run serve```

## Compiles and minifies for production
```yarn run build```

## Lint 
```yarn run lint```