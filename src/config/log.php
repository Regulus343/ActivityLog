<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Developer Name
	|--------------------------------------------------------------------------
	|
	| The name of users for logged activities that have the "developer"
	| flag set.
	|
	*/
	'developer_name' => 'Developer',

	/*
	|--------------------------------------------------------------------------
	| Full Name as Name
	|--------------------------------------------------------------------------
	|
	| If "full_name_as_name" is true, the "first_name" and "last_name" attributes
	| are concantenated together, separated by a space. If false, the
	| "username" attribute of the user is used as the name instead. If
	| "full_name_last_name_first" is set, the name will be displayed like
	| "Smith, John" instead of "John Smith".
	|
	*/
	'full_name_as_name'         => true,
	'full_name_last_name_first' => false,

	/*
	|--------------------------------------------------------------------------
	| Auto Set User ID
	|--------------------------------------------------------------------------
	|
	| If false, user ID will not be automatically set.
	|
	*/
	'auto_set_user_id' => true,

	/*
	|--------------------------------------------------------------------------
	| Action Icons
	|--------------------------------------------------------------------------
	|
	| The icons for specific actions. The defaults point to various Glyphicons.
	|
	*/
	'action_icon_element'      => 'span',
	'action_icon_class_prefix' => 'glyphicon glyphicon-',

	'action_icons' => [
		'x'         => 'info-sign',
		'create'    => 'plus-sign',
		'update'    => 'ok-sign',
		'delete'    => 'remove-sign',
		'ban'       => 'ban-circle',
		'unban'     => 'ok-circle',
		'approve'   => 'ok-circle',
		'unapprove' => 'ban-circle',
		'log in'    => 'log-in',
		'log out'   => 'log-out',
		'view'      => 'eye-open',
		'comment'   => 'comment',
	],

];
