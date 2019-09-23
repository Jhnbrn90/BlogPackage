# BlogPackage
Package accompanying the "Creating a Laravel specific package" blog series.

In my experience, learning to develop a package for Laravel can be quite challenging. 
In [this series of posts](https://johnbraun.blog/posts/creating-a-laravel-package-1) I try to provide a comprehensive guide to develop a Laravel specific package from scratch.

# Cloning this package
Along the way, we'll build this package by introducing functionalities one-by-one. 
If you want to have a reference, clone this repository and run `composer install`. 

# Using this package in a Laravel project
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
