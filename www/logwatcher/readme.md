## LogWatcher

A simple web tool for viewing log files and clearing cache in your applications.
If you don't have direct access to the server (like in PaaS phpfog.com)
you probably can't view log files in your [Nette Framework](http://nette.org) applications.
This tool will solve this. It can also be used to remove temporary files (see *app/bootstrap.php*)

### Installation

* Download LogWatcher from Github
* Place it in the *www/logwatcher/* directory (where *www* is your document root)
* Configure *app/config.neon*
* Deploy and open http://yourapp.com/logwatcher - debug like a boss

### License

This application is published under the **New BSD license**. It uses Nette Framework (New BSD) and jQuery (MIT License).