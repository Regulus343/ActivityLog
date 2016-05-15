ActivityLog
===========

**A simple and clean Laravel 5 activity logger for monitoring user activity on a website or web application.**

- [Installation](#installation)
- [Basic Usage](#basic-usage)
- [Advanced Usage](#advanced-usage)
- [Getting Linked Content](#linked-content)
- [Displaying Action Icons](#action-icons)

<a name="installation"></a>
## Installation

**Basic installation, service provider registration, and aliasing:**

To install ActivityLog, make sure "regulus/activity-log" has been added to Laravel 5's `composer.json` file.

	"require": {
		"regulus/activity-log": "0.6.*"
	},

Then run `php composer.phar update` from the command line. Composer will install the ActivityLog package. Now, all you have to do is register the service provider and set up ActivityLog's alias. In `app/config/app.php`, add this to the `providers` array:

	Regulus\ActivityLog\ActivityLogServiceProvider::class,

And add this to the `aliases` array:

	'Activity' => Regulus\ActivityLog\Models\Activity::class,

**Publishing migrations and configuration:**

To publish this package's configuration and migrations, run this from the command line:

	php artisan vendor:publish

You will now be able to edit the config file in `config/log.php` if you wish to customize the configuration of ActivityLog.

> **Note:** Migrations are only published; remember to run them when ready.

To run migration to create ActivityLog's table, run this from the command line:

	php artisan migrate

<a name="basic-usage"></a>
## Basic Usage

**Logging user activity:**

```php
	Activity::log([
		'contentId'   => $user->id,
		'contentType' => 'User',
		'action'      => 'Create',
		'description' => 'Created a User',
		'details'     => 'Username: '.$user->username,
		'updated'     => (bool) $id,
	]);
```

The above code will log an activity for the currently logged in user. The IP address will automatically be saved as well and the `developer` flag will be set if the user has a `developer` session variable set to `true`. This can be used to differentiate activities between the developer and the website administrator. The `updated` boolean, if set to `true`, will replace all instances of "Create" or "Add" with "Update" in the `description` and `details` fields.

<a name="advanced-usage"></a>
## Advanced Usage

As of version `0.6.0`, ActivityLog has built in the ability to dynamically create descriptions based on language keys in Laravel's language files. If you would like to enable this feature without having to set `language_key` to `true` when you use the `log()` function, change `defaults.language_key` to `true` in the config file (it is not present by default so you will have to add it).

**Logging user activity with language keys:**

```php
	Activity::log([
		'contentType' => 'Record',
		'description' => [
			'created_items', [ // "activity-log::descriptions.created_items" is ":user created :number :items."
				'number' => 2,
				'items'  => 'SPL|labels.record', // "labels.record" in this example has a string of "Record|Records"
			],
		],
		'details' => [
			'record',
			'This is Some Kind of Record',
		],
		'data' => [
			'category' => 'Content',
		],
	]);

	echo $activity->getDescription(); // may output "Unknown User created 2 records."

	echo $activity->getDetails(); // may output "Record: This is Some Kind of Record"

	echo $activity->getData('category'); // will output "Content"
```

In the example above, the `items` replacement variable in the description has a number of specified properties before the `|` character which separates them from the actual language variable. The available properties are as follows:

	S - Return the "singular" string (in the case of "labels.record", "Record")
	P - Return the "plural" string (in the case of "labels.record", "Records")
	A - Prepend the string with "a" or "an" (example: "a record" instead of just "record")
	L - Convert the string to lowercase

In our example above, you will see both singular ("S") and plural ("P") are being used. When both are used, the description builder looks for a `number` replacement variable to decide whether the singular or plural form should be used.

> **Note:** The `user` replacement variable is automatically set based on the record's user ID.

<a name="linked-content"></a>
## Getting Linked Content

**Set up the `content_types` config array like the following example:**

```php
	'item' => [
		'uri'       => 'view/:id',
		'subdomain' => 'items',
		'model'     => 'App\Models\Item',
	],
```

You can use `getContentItem()` to get the item based on the specified model (assuming, in the case of the above specified example, that your content type is set to "Item"). You can also use `getUrl()` to get the URL of the content item or `getLinkedDescription()` to get a linked description for the item.

<a name="action-icons"></a>
## Displaying Action Icons

**Display an action icon based on config setup:**

```php
	echo $activity->getIconMarkup();
```

You can also use `getIcon()` to get just the icon class from which to build your own icon markup.