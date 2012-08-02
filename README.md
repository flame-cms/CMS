#FLAME:CMS (sandbox)

The basic structure for your application based on [Flame CMS](https://github.com/jsifalda/flame)

###Installing
#####Download sandbox

	git clone git://github.com/jsifalda/flame-sandbox.git myApp
	cd myApp

#####Make directories './log', './temp' and './www/media' writable (chmod 777)
#####Install dependencies (composer.phar included in sandbox)

	php composer.phar install

#####Create database structure with command:

	php app/doctrine-cli.php  orm:schema-tool:update --force

#####Import defaults data

	php app/doctrine-cli.php dbal:import app/default-data.sql

#####Flame is ready now!

If you want to sign in to backend part (Administration) of Flame, use email **user@demo.com** and password **PASSWORD12** (all in lower case)
