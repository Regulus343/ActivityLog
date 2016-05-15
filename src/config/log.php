<?php

return [

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
	| Default Values
	|--------------------------------------------------------------------------
	|
	| The default values of certain fields. If you would like to use the
	| language key system by default, add another default value for
	| "language_key" and set it to true. You may also add one for "public" if
	| you intend for logged activities to be made public by default.
	|
	*/
	'defaults' => [
		'action' => 'Create',
	],

	/*
	|--------------------------------------------------------------------------
	| Language Key Settings
	|--------------------------------------------------------------------------
	|
	| "prefixes.replacements" is the language key prefix for replacements within
	| a language string. For example, setting it to "labels" will allow you to
	| use "article" to get "labels.article". The other two prefix config
	| variables are related to the "description" and "details" fields.
	|
	*/
	'language_key' => [
		'prefixes' => [
			'descriptions' => 'activity-log::descriptions',
			'details'      => 'activity-log::details',
			'replacements' => null,
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Name
	|--------------------------------------------------------------------------
	|
	| The "developer" is the name of users for logged activities that have the
	| "developer" flag set. "unknown" is for logged activities that do not have
	| an associated user.
	|
	*/
	'names' => [
		'developer' => 'Developer',
		'unknown'   => 'Unknown User',
	],

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
		'post'       => 'plus-circle',
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
		'open'       => 'eye',
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