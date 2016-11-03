LexikJWTAuthenticationBundle Sandbox
=====================================

This is a sample application for experimenting/demonstrating features of the powerful LexikJWTAuthenticationBundle bundle which provides authentication through JWT.

What's inside
--------------

- [Symfony](https://github.com/symfony/symfony) ~3.1
- [LexikJWTAuthenticationBundle](https://github.com/lexik/LexikJWTAuthenticationBundle) ~2.0

Get started
------------

Create the project using composer:
```sh
$ composer create-project rch/lexik-jwt-authentication-sandbox
``` 

Or clone it using git:
```sh
$ git clone https://github.com/chalasr/lexik-jwt-authentication-sandbox
```

Create the database schema:
```sh
$ cd lexik-jwt-authentication-sandbox
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:update --force
```

Usage
------

Run the web server:
```sh
$ php bin/console server:run
```

Register a new user:
```
$ curl -X POST http://localhost:8000/register -d _username=johndoe -d _password=test
-> User johndoe successfully created
```

Get a JWT token:
```
$ curl -X POST http://localhost:8000/login_check -d _username=johndoe -d _password=test
-> { "token": "[TOKEN]" }  
```

Access a secured route:
```
$ curl -H "Authorization: Bearer [TOKEN]" http://localhost:8000/api
-> Logged in as johndoe
```
