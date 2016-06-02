# Intercept
Some random pieces of middleware

#Installation

This package requires PHP 5.6+, and includes a Laravel 5 Service Provider.

To install through composer include the package in your `composer.json`.

    "midnite81/intercept": "0.1.*"

Run `composer install` or `composer update` to download the dependencies or you can run `composer require midnite81/intercept`.

##Laravel 5 Integration

To use the package with Laravel 5 firstly add the Messaging service provider to the list of service providers 
in `app/config/app.php`.

    'providers' => [

      Midnite81\Intercept\MessengingServiceProvider::class
              
    ];

    
Publish the config and migration files using 
`php artisan vendor:publish --provider="Midnite81\Intercept\InterceptServiceProvider"`

Add the following to `app\Http\Kernel.php`

            protected $routeMiddleware = [
            ...
            'isLocal' => \Midnite81\Intercept\Middleware\IsLocal::class,
            'noCache' => \Midnite81\Intercept\Middleware\NoCache::class,
            'noFacebook' => \Midnite81\Intercept\Middleware\NoFacebook::class,
            'homeIps' => \Midnite81\Intercept\Middleware\RestrictHomeIp::class,
            ...
            ];
    
#Configuration File

Once you have published the config files, you will find an `Intercept.php` file in the `config` folder. You should
look through these settings and update these where necessary. 

