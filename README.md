#FLAME:CMS

Simple and smart CMS based on framework [Flame](https://github.com/jsifalda/flame)

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

	git clone git://github.com/flame-cms/CMS.git myApp
	cd myApp

#####Make directories './log', './temp' and './www/media' writable (chmod 777)
#####Install dependencies (composer.phar included in sandbox)

	php composer.phar install

#####Create database structure with command:

	php app/doctrine-cli.php orm:schema-tool:create

#####Import defaults data

	php app/doctrine-cli.php dbal:import app/default-data.sql

###Flame is ready now!

If you want to sign in to backend part (Administration) of Flame, use email **user@demo.com** and password **PASSWORD12** (all in lower case)
