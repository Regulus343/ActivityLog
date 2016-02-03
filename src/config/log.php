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
	'auth_method' => '\Auth::user',

	/*
	|--------------------------------------------------------------------------
	| Action Icons
	|--------------------------------------------------------------------------
	|
	| The icons for specific actions. The defaults point to various icons in
	| the Font Awesome set.
	|
	*/
	'action_icon' => [
		'element'      => 'i',
		'class_prefix' => 'fa fa-',
	],

	'action_icons' => [
		'x'          => 'info-circle',
		'create'     => 'plus-circle',
		'add'        => 'plus-circle',
		'update'     => 'edit',
		'delete'     => 'minus-circle',
		'remove'     => 'minus-circle',
		'upload'     => 'cloud-upload',
		'download'   => 'cloud-download',
		'ban'        => 'ban',
		'unban'      => 'circle-o',
		'approve'    => 'ok-circle',
		'unapprove'  => 'ban',
		'activate'   => 'ok-circle',
		'deactivate' => 'ban',
		'log_in'     => 'sign-in',
		'log_out'    => 'sign-out',
		'view'       => 'eye',
		'comment'    => 'comment',
		'mail'       => 'envelope',
		'email'      => 'envelope',
		'send'       => 'envelope',
	],

	/*
	|--------------------------------------------------------------------------
	| Content Types
	|--------------------------------------------------------------------------
	|
	| The content types array can be used to link models and URLs to content
	| types. The index of a content type array will be a snakecased version of
	| the content type, so if your content type is "Content Page", your index
	| will be "content_page". Within a content type array, you may specify a
	| URI, a subdomain, and a model.
	|
	*/
	'content_types' => [

		/* 'item' => [
			'uri'       => 'view/:id',
			'subdomain' => 'items',
			'model'     => 'App\Models\Item',
		], */

	],

];