# Introduction
This package is meant to provide a reference when you're following along with the documentation on [LaravelPackage.com](https://laravelpackage.com). Along the way, we'll build a demo package (called "BlogPackage") by introducing the functionalities (as listed below) one-by-one. When something doesn't work as expected in your own package, you might use this repository to quickly find out if the bug is in your package or in the documentation (by running this package's test suite). 

## Package contents
The demo package features the following components: 
 - [Package Service Provider](https://laravelpackage.com/03-service-providers.html)
 - [Database migrations](https://laravelpackage.com/08-models-and-migrations.html#migrations)
 - [Commands](https://laravelpackage.com/06-artisan-commands.html)
 - [Configuration (config file)](https://laravelpackage.com/07-configuration-files.html)
 - [Models](https://laravelpackage.com/08-models-and-migrations.html#models)
 - [Routes](https://laravelpackage.com/09-routing.html#routes)
 - [Views](https://laravelpackage.com/09-routing.html#views)
 - [Assets](https://laravelpackage.com/09-routing.html#assets)
 - [Controllers](https://laravelpackage.com/09-routing.html#controllers)
 - [Events & Listeners](https://laravelpackage.com/10-events-and-listeners.html)
 - [Facades](https://laravelpackage.com/05-facades.html#how-a-facade-works)
 - [Middleware](https://laravelpackage.com/11-middleware.html)
 - [Mailables](https://laravelpackage.com/12-mail.html)
 - [Traits](https://laravelpackage.com/08-models-and-migrations.html#providing-a-trait)
 - [Database Factories](https://laravelpackage.com/08-models-and-migrations.html#creating-a-model-factory) (for testing purposes)

## Installation and Usage
- Clone this repository: `git clone git@github.com:Jhnbrn90/BlogPackage.git`
- Install the dependencies: `composer install`
- Confirm by running all tests: `composer test`

Now you're free to use this demo package to your advantage. You can also include the demo package in a Laravel project if you wish, check the section below.

### Using this package in a Laravel project
You can easily use this packge in a local Laravel project, after cloning:

1. Specify a new repository in your composer.json file of the Laravel project (not this package!):
```
// composer.json

{
  "repositories": [
    {
      "type": "path",
      "url": "../../blogpackage" // the relative path to your package
    }
  ]
}
```

2. Require the package in the local Laravel project:
``` 
composer require johndoe/blogpackage
```

3. Optionally publish the package assets:

```
php artisan vendor:publish --provider="JohnDoe\BlogPackage\BlogPackageServiceProvider" --tag="config"

php artisan vendor:publish --provider="JohnDoe\BlogPackage\BlogPackageServiceProvider" --tag="migrations"

php artisan vendor:publish --provider="JohnDoe\BlogPackage\BlogPackageServiceProvider" --tag="views"

php artisan vendor:publish --provider="JohnDoe\BlogPackage\BlogPackageServiceProvider" --tag="assets"
```

## Testing
This package includes a Unit and Feature [test suite](https://laravelpackage.com/04-testing.html) covering all mentioned components. You can easily run all tests for this package using `composer test`, or a specific test using `composer test-f test-name-here`.
