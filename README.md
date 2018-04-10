LexikJWTAuthenticationBundle Sandbox
=====================================

This is a sample application for experimenting/demonstrating features of the powerful LexikJWTAuthenticationBundle bundle which provides authentication through JWT.

What's inside
--------------

- [Symfony](https://github.com/symfony/symfony) 4.0 (Flex)
- [LexikJWTAuthenticationBundle](https://github.com/lexik/LexikJWTAuthenticationBundle) ~2.4

Get started
------------

Clone the project:
```sh
$ git clone https://github.com/chalasr/lexik-jwt-authentication-sandbox
$ cd lexik-jwt-authentication-sandbox
$ git checkout flex
```

Install dependencies and libraries:

```
$ sudo apt-get install php-sqlite3 
$ composer install
```

Create the database schema:
```sh
$ bin/console doctrine:database:create
$ bin/console doctrine:schema:update --force
```

Usage
------

Run the web server:
```sh
$ bin/console server:run
```

Register a new user:
```
$ curl -X POST http://localhost:8000/register -d _username=johndoe -d _password=test
-> User johndoe successfully created
```

Get a JWT token:
```
$ curl -X POST -H "Content-Type: application/json" http://localhost:8000/login_check -d '{"username":"johndoe","password":"test"}'
-> { "token": "[TOKEN]" }  
```

Access a secured route:
```
$ curl -H "Authorization: Bearer [TOKEN]" http://localhost:8000/api
-> Logged in as johndoe
```
