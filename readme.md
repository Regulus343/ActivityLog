ActivityLog
===========

**A clean and simple Laravel 4 activity logger for monitoring user activity on a website or web application.**

- [Installation](#installation)
- [Basic Usage](#basic-usage)

<a name="installation"></a>
## Installation

**Basic installation, service provider registration, and aliasing:**

To install ActivityLog, make sure "regulus/activity-log" has been added to Laravel 4's `composer.json` file.

	"require": {
		"regulus/activity-log": "dev-master"
	},

Then run `php composer.phar update` from the command line. Composer will install the ActivityLog package. Now, all you have to do is register the service provider, set up ActivityLog's alias in `app/config/app.php`, Add this to the `providers` array:

	'Regulus\ActivityLog\ActivityLogServiceProvider',

And add this to the `aliases` array:

	'Activity' => 'Regulus\ActivityLog\Activity',

**Run the migrations and seed the database:**

To run the database migrations (a single DB table), run the following from the command line:

	php artisan migrate --package=regulus/activity-log

**Publishing config file:**

If you wish to customize the configuration of ActivityLog, you will need to publish the config file. Run this from the command line:

	php artisan config:publish regulus/activity-log

You will now be able to edit the config file in `app/config/packages/regulus/activity-log`.

<a name="basic-usage"></a>
## Basic Usage

**Logging user activity:**

	Activity::log(array(
		'contentID'   => $user->id,
		'contentType' => 'User',
		'description' => 'Created a User',
		'details'     => 'Username: '.$user->username,
		'updated'     => $id ? true : false,
	));

The above code will log an activity for the currently logged in user. The IP address will automatically be saved as well and the "developer" flag will be set if the user has a "developer" session variable set to true. This can be used to differentiate activities between the developer and the website administrator.