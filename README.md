LexikJWTAuthenticationBundle Sandbox
=====================================

This is a sample application for experimenting/demonstrating features of the powerful LexikJWTAuthenticationBundle bundle which provides authentication through JWT.

What's inside
--------------

- [Symfony](https://github.com/symfony/symfony) ~3.1
- [LexikJWTAuthenticationBundle](https://github.com/lexik/LexikJWTAuthenticationBundle) ~2.0

Get started
------------

Clone the project:
```
$ git clone https://github.com/chalasr/lexik-jwt-authentication-sandbox
```

Install the dependencies:
```
$ cd lexik-jwt-authentication-sandbox
$ composer install
```

Create the database schema:
```
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:update --force
```

Usage
------

Run the web server:
```
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

Access a secured resource:
```
$ curl -H "Authorization: JWT [TOKEN]" http://localhost:8000/api
-> Logged in as johndoe
```
