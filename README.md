#FLAME:CMS

Simple and smart CMS based on framework [Flame](https://github.com/flame-org/Framework)

WARNING: This package is under active development, and shouldn't be used at production!

**If you want to try Flame:CMS please visit [Demo page](http://flame.jsifalda.name/)**

##Screen from FrontModule

![FrontModule](http://projects.jsifalda.name/flame/screens/front_module.png "FrontModule")

##Screen from AdminModule

![AdminModule](http://projects.jsifalda.name/flame/screens/admin_module.png "AdminModule")

### Features
* Access control list
* Creating / editing posts (categories, tags)
* Comments
* TimyCME editor
* Managing of images
* Paginator for posts
* Users management
* Links management
* Newsreel
* Pages management
* Wordpress posts import
* Management of templates for Front part (Twitter Bootstrap for Administration)

###Installing
#####Download sandbox

	git clone https://github.com/flame-cms/sandbox myApp
	cd myApp

#####Make directories './log', './temp' and './www/media' writable (chmod 777)
#####Install dependencies

	curl -s http://getcomposer.org/installer | php #download composer
	php composer.phar install

#####Create database structure with command:

	php app/doctrine-cli.php orm:schema-tool:create

#####Import defaults data

	php app/doctrine-cli.php dbal:import data/db.sql

#####Install submodules

	git submodule update --init

###Flame:CMS is ready now!

If you want to sign in to backend part (Administration) of Flame, use email **user@demo.com** and password **PASSWORD12** (all in lower case)
