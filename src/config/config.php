<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Developer Name
	|--------------------------------------------------------------------------
	|
	| The name of users for logged activities that have the "developer"
	| flag set.
	|
	*/
	'developerName' => 'Developer',

	/*
	|--------------------------------------------------------------------------
	| Full Name as Name
	|--------------------------------------------------------------------------
	|
	| If "fullNameAsName" is true, the "first_name" and "last_name" attributes
	| are concantenated together, separated by a space. If false, the
	| "username" attribute of the user is used as the name instead. If
	| "fullNameLastNameFirst" is set, the name will be displayed like
	| "Smith, John" instead of "John Smith".
	|
	*/
	'fullNameAsName'        => true,
	'fullNameLastNameFirst' => false,
	
	/*
	|--------------------------------------------------------------------------
	| Auth Method
	|--------------------------------------------------------------------------
	|
	| If you are using any alternative packages for Authentication and User
	| management then you can put in the appropriate function to get
	| the currently logged in user.
	|
	| For example, if you are using Sentry, you would put Sentry::getUser()
	| instead of Laravel's default which is Auth::user().
	|
	*/
	'authMethod' => Auth::user(),

	/*
	|--------------------------------------------------------------------------
	| Auto Set User ID
	|--------------------------------------------------------------------------
	|
	| If false, user ID will not be automatically set.
	|
	*/
	'autoSetUserId' => true,

	/*
	|--------------------------------------------------------------------------
	| Action Icons
	|--------------------------------------------------------------------------
	|
	| The icons for specific actions. The defaults point to various Glyphicons.
	|
	*/
	'actionIcons' => array(
		'X'         => 'info-sign',
		'Create'    => 'plus-sign',
		'Update'    => 'ok-sign',
		'Delete'    => 'remove-sign',
		'Ban'       => 'ban-circle',
		'Unban'     => 'ok-circle',
		'Approve'   => 'ok-circle',
		'unapprove' => 'ban-circle',
		'Log In'    => 'log-in',
		'Log Out'   => 'log-out',
		'View'      => 'eye-open',
		'Comment'   => 'comment',
	),

);