#FLAME:CMS (sandbox)

The basic structure for your application based on [Flame CMS](https://github.com/jsifalda/flame)

###Installing
- Download sandbox

	git clone git://github.com/jsifalda/flame-sandbox.git myApp
	cd myApp

- Make directories './log', './temp' and './www/media' writable (chmod 777)
- Install dependencies (composer.phar included in sandbox)

	php composer.phar install

- Create database structure with command:

	php app/doctrine-cli.php  orm:schema-tool:update --force

Flame is ready now!