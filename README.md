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
$ curl -X POST http://localhost:8000/register -d _username=johndoe -d _password=test -d _email=john@doe.fr
-> User johndoe successfully created
```

Get a JWT token:
```
$ curl -X POST http://localhost:8000/login_check -d _email=john@doe.fr -d _password=test
-> { "token": "[TOKEN]" }  
```

Try to access a secured route:
```
$ curl -H "Authorization: Bearer [TOKEN]" http://localhost:8000/api
-> 
{
  "code": 401,
  "message": "Unable to load an user with property \"username\" = \"papi\". If the user identity has changed, you must renew the token. Otherwise, verify that the \"lexik_jwt_authentication.user_identity_field\" config option is correctly set."
}
```

Uncomment [this line](https://github.com/chalasr/lexik-jwt-authentication-sandbox/blob/without_user_identity_field/app/config/config.yml#L69), retry to access the secured route, it works.
