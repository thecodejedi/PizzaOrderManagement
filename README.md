PizzaOrderManagement
====================

A Website to accumulate Pizza Orders in a closed environment.

# Requirements
- php >= 5.5.9
- mysql >= 5.6
- Active Internet connection

# Installation

**Download the repostiory**
Go to a folder which is used by your webserver or where you want your application to be stored locally.
Then execute following lines in oder to get the latest version:

´´´
$ git clone https://github.com/thecodejedi/PizzaOrderManagement.git
$ cd PizzaOrderManagement
´´´

**Initial deployment**
POM is using Symfony and Composer to manage and load it's dependecies.
There are multiple ways to deploy a symfony application. This is a description for a local webserver, if you are interested in cloud based soltions please take a lookt at the [Symfony Documentation](http://symfony.com/doc/current/cookbook/deployment/index.html)

More details on how to setup [Symfony](http://symfony.com) cen be found here [Symfony Documentation](http://symfony.com/doc/current/cookbook/deployment/tools.html).

´´´
$ php bin/symfony_requirements
´´´
There should only be one error left at this point. 
´Vendor libraries must be installed´
This will be done in the next steps


´´´
$ export SYMFONY_ENV=prod
$ composer install --no-dev --optimize-autoloader
´´´
At this point you will be asked to setup your DB credentials.
As POM is not using any mailing service you can just push through the SMTP Stuff

´´´
$ php bin/console cache:clear --env=prod --no-debug
$ php bin/console assetic:dump --env=prod --no-debug
´´´

**Setup the DB**
´´´
$ php bin/console doctrine:schema:create
$ php bin/console doctrine:fixtures:load
´´´

