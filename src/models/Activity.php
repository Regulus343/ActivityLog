<?php namespace Regulus\ActivityLog\Models;

/*----------------------------------------------------------------------------------------------------------
	Activity Log
		A simple and clean Laravel 4 activity logger for monitoring
		user activity on a website or web application.

		created by Cody Jassman
		version 0.5.0
		last updated on March 3, 2014
----------------------------------------------------------------------------------------------------------*/

use Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class Activity extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'activity_log';

	/**
	 * Get the user that the activity belongs to.
	 *
	 * @return object
	 */
	public function user()
	{
		return $this->belongsTo(config('auth.model'), 'user_id');
	}

	/**
	 * Create an activity log entry.
	 *
	 * @param  mixed
	 * @return boolean
	 */
	public static function log($data = array())
	{
		if (is_object($data)) $data = (array) $data;
		if (is_string($data)) $data = array('action' => $data);

		$activity = new static;

		if (config('log.auto_set_user_id'))
		{
			$user = \Auth::user();
			$activity->user_id = isset($user->id) ? $user->id : null;
		}

		if (isset($data['userId']))
			$activity->user_id = $data['userId'];

		$activity->content_id   = isset($data['contentId'])   ? $data['contentId']   : null;
		$activity->content_type = isset($data['contentType']) ? $data['contentType'] : null;
		$activity->action       = isset($data['action'])      ? $data['action']      : null;
		$activity->description  = isset($data['description']) ? $data['description'] : null;
		$activity->details      = isset($data['details'])     ? $data['details']     : null;

		//set action and allow "updated" boolean to replace activity text "Added" or "Created" with "Updated"
		if (isset($data['updated']))
		{
			if ($data['updated']) {
				$activity->description = str_replace('Added', 'Updated', str_replace('Created', 'Updated', $activity->description));
				$activity->action = "Updated";
			} else {
				$activity->action = "Created";
			}
		}

		if (isset($data['deleted']) && $data['deleted'])
			$activity->action = "Deleted";

		//set developer flag
		$activity->developer  = !is_null(Session::get('developer')) ? true : false;

		$activity->ip_address = Request::getClientIp();
		$activity->user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'No UserAgent';
		$activity->save();

		return true;
	}

	/**
	 * Get the name of the user.
	 *
	 * @return string
	 */
	public function getName()
	{
		if ((bool) $this->developer)
			return config('log.developer_name');

		$user = $this->user;
		if (empty($user))
			return "Unknown User";

		if (!config('log.full_name_as_name'))
			return !is_null($user->username) ? $user->username : $user->name;

		if (config('log.full_name_last_name_first'))
			return $user->last_name.', '.$user->first_name;
		else
			return $user->first_name.' '.$user->last_name;
	}

	/**
	 * Get a shortened version of the user agent with title text of the full user agent.
	 *
	 * @return string
	 */
	public function getUserAgentPreview()
	{
		return substr($this->user_agent, 0, 42) . (strlen($this->user_agent) > 42 ? '<strong title="'.$this->user_agent.'">...</strong>' : '');
	}

	/**
	 * Get the icon class name for the log entry's action.
	 *
	 * @return string
	 */
	public function getIcon()
	{
		$actionIcons = config('log.action_icons');
		if (!is_null($this->action) && $this->action == "" || !isset($actionIcons[strtolower($this->action)]))
			return $actionIcons['x'];

		return $actionIcons[strtolower($this->action)];
	}

	/**
	 * Get the markup for the log entry's icon.
	 *
	 * @return string
	 */
	public function getIconMarkup()
	{
		return '<'.config('log.action_icon_element').' class="'.$config('log.action_icon_class_prefix').$this->getIcon().'" title="'.$this->action.'"></'.config('log.action_icon_element').'>';
	}

}